<?php

namespace App\Livewire\Admin\Diagnosis;

use App\Models\Admin\Diagnosis\DiagnosisMoneyReceive as DiagnosisMoneyReceiveModel;
use App\Models\Admin\Diagnosis\DiagnosisMoneyReceiveDetail;
use App\Models\Admin\Diagnosis\DiagnosisTransaction;
use App\Models\Admin\Diagnosis\TestName;
use App\Models\Admin\Diagnosis\TestPackage;
use App\Models\Admin\Doctor\Reference;
use App\Models\Admin\Library\Gender;
use App\Traits\AgeCalculator;
use DateTime;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Livewire\Component;

class DiagnosisMoneyReceive extends Component
{
    use AgeCalculator;

    public $gender_id;

    public $doctor_id;

    public $mobile;

    public $patient_name;

    public $dob;

    public $year;

    public $month;

    public $day;

    public $dob_error = '';

    public $selected_test_id = '';

    public $tests = [];

    public $selected_test = [];

    public $packages = [];

    public $selected_package_ids = [];

    public $selected_test_ids = [];

    public $total_amount = 0;

    public $net_amount = 0;

    public $due_amount = 0;

    public $paid_amount = 0;

    public $discount_is_percent = 1;

    public $total_discount = 0;

    public function mount(): void
    {
        $this->tests = TestName::all()->map(function ($test) {
            $test->quantity = 1;
            $test->total_discount = 0;
            $test->sub_total = $test->cost;
            $test->test_package_id = null;

            return $test;
        })->toArray();
            
        
    }

    public function calculateDOB($ageYears = 0, $ageMonths = 0, $ageDays = 0): string
    {
        $year = $this->year;
        $month = $this->month;
        $day = $this->day;
        $this->year = $year === '' || $year < 0 ? 0 : $year;
        $this->month = $month === '' || $month < 0 ? 0 : (min($month, 12));
        $this->day = $day === '' || $day < 0 ? 0 : (min($day, 31));

        $today = new DateTime;

        try {
            $today->modify("-$ageYears years");
            $today->modify("-$ageMonths months");
            $today->modify("-$ageDays days");
        } catch (Exception $e) {
            $this->dob_error = 'Invalid Date';
        }

        return $today->format('Y-m-d');
    }

    public function updated($propertyName): void
    {
        if ($propertyName === 'year' || $propertyName === 'month' || $propertyName === 'day') {
            $this->dob = $this->calculateDOB($this->year, $this->month, $this->day);
        }
    }

    public function updatedDob(): void
    {
        ['years' => $this->year, 'months' => $this->month, 'days' => $this->day] = $this->calculateYear($this->dob);
    }

    public function updatedSelectedTestId($testId): void
    {
        $alreadySelected = collect($this->selected_test)->contains('id', $testId);

        if ($alreadySelected) {
            $this->dispatch('trigger-sweetalert', [
                'title' => 'Test Selected',
                'text' => 'You have already selected this test',
                'icon' => 'error',
            ]);
        } else {
            $test = collect($this->tests)->firstWhere('id', $testId);

            if ($test) {
                $this->selected_test[] = $test;
                // Update the total cost
                $this->calculateTotalCost();
            }
            $this->getValue();
        }
    }

    public function toggleTestSelection($testId): void
    {
        $test = collect($this->tests)->firstWhere('id', $testId);

        if ($test) {
            // Check if the test is already in the selected tests with package_id == null
            $existingTestKey = collect($this->selected_test)
                ->search(function ($selectedTest) use ($testId) {
                    return $selectedTest['id'] === $testId && $selectedTest['test_package_id'] === null;
                });

            if ($existingTestKey !== false) {
                // Test already exists and has package_id == null, so we remove it
                unset($this->selected_test[$existingTestKey]);
            } else {
                // Test doesn't exist with package_id == null, so we add it
                $this->selected_test[] = $test;
            }

            // Re-index the selected_test array after unsetting
            $this->selected_test = array_values($this->selected_test);

            $this->calculateTotalCost();
        }
        
        $this->getValue();
    }


    public function togglePackageSelection($packageId): void
    {
        $package = collect($this->packages)->firstWhere('id', $packageId);
        if ($package) {
            $packageExists = collect($this->selected_test)->contains(function ($test) use ($packageId) {
                return $test['test_package_id'] === $packageId;
            });
            if (in_array($packageId, $this->selected_package_ids)) {
                if ($packageExists) {
                    $this->removePackageTests($packageId);
                } else {
                    $this->addPackageTests($package);
                }
            } else {
                $this->removePackageTests($packageId);
            }
            // Update the total cost
            $this->calculateTotalCost();
        }
    }

    private function addPackageTests($package): void
    {
        foreach ($package['testPackageDetails'] as $testDetail) {
            // Find the test in the tests array by id
            $test = collect($this->tests)->firstWhere('id', $testDetail['test_name_id']);

            // Check if the test exists and is not already added to the selected_test array
            if ($test && ! collect($this->selected_test)->contains('id', $test['id'])) {
                // Add the test to selected_test with modifications
                $this->selected_test[] = [
                    ...$test,
                    'id' => $test['id'],
                    'test_package_id' => $testDetail['package_id'],
                    'cost' => $testDetail['price'],
                    'sub_total' => $testDetail['cost'],
                ];
            }
        }
    }

    private function removePackageTests($packageId): void
    {
        $this->selected_test = array_filter($this->selected_test, function ($test) use ($packageId) {
            return $test['test_package_id'] !== $packageId;
        });
    }

    public function updatedTotalDiscount(): void
    {
        $this->getValue();
    }

    public function updatedDiscountIsPercent(): void
    {
        $this->getValue();
    }

    public function updatedPaidAmount(): void
    {
        $this->calculateTotalCost();
    }

    public function updateTestTotalCost($index): void
    {
        if (isset($this->selected_test[$index])) {
            $test = $this->selected_test[$index];
            $quantity = (int) ($test['quantity'] ?? 1);
            $cost = (float) ($test['cost'] ?? 0);
            $total_discount = (float) ($test['total_discount'] ?? 0);

            // Update sub_total for this test
            $this->selected_test[$index]['sub_total'] = ($cost * $quantity) - $total_discount;

            $this->getValue();
        }
    }
   
    public function delete($testId, $index): void
    {
        $test = $this->selected_test[$index];
        

        if ($test['test_package_id']) {
            $this->selected_test = array_filter($this->selected_test, function ($testItem) use ($test) {
                return $testItem['test_package_id'] !== $test['test_package_id'];
            });

            $this->selected_package_ids = array_filter($this->selected_package_ids, function ($packageId) use ($test) {
                return $packageId !== $test['test_package_id'];
            });
        } else {
            $this->selected_test = array_filter($this->selected_test, function ($testItem) use ($testId) {
                return $testItem['id'] !== $testId;
            });

            $this->selected_test_ids = array_filter($this->selected_test_ids, function ($selectedTestId) use ($testId) {
                return $selectedTestId !== $testId;
            });
        }

        // Re-index the selected_test array after filtering
        $this->selected_test = array_values($this->selected_test);

        $this->selected_test_ids = array_map(function ($test) {
            return $test['id'];
        }, $this->selected_test);

        $this->selected_package_ids = array_map(function ($test) {
            return $test['test_package_id'];
        }, $this->selected_test);

        dump($this->selected_package_ids);
       
        $this->calculateTotalCost();
        // dump($this->selected_test_ids);
    }


    // calculate the total cost for all tests
    public function calculateTotalCost(): void
    {
        $this->total_amount = collect($this->selected_test)->sum(function ($test) {
            return ($test['quantity'] ?? 1) * ($test['cost'] ?? 0);
        });
        $this->net_amount = collect($this->selected_test)->sum('sub_total');
        //        $this->paid_amount = $this->total_amount;
        $this->due_amount = $this->net_amount - $this->paid_amount;
    }

    public function getValue(): void
    {
        if ($this->discount_is_percent == 1) {
            foreach ($this->selected_test as &$test) {
                // Apply discount as a percentage of total cost * quantity
                $test['total_discount'] = ((int) $this->total_discount / 100) * ((int) $test['quantity'] * (float) $test['cost']);
            }
        } else {
            // total cost of all selected tests
            $totalCost = collect($this->selected_test)->sum(function ($test) {
                return ($test['quantity'] ?? 1) * ($test['cost'] ?? 0);
            });

            // Distribute the discount proportionally
            foreach ($this->selected_test as &$test) {
                $testCost = (int) $test['quantity'] * (float) $test['cost'];

                // calculate the discount for each test
                if ($totalCost > 0) {
                    $test['total_discount'] = ($testCost / $totalCost) * $this->total_discount;
                } else {
                    $test['total_discount'] = 0;
                }
            }
        }
        $this->calculateTotalCost();
    }

    public function save(): void
    {
        $this->validate([
            'gender_id' => 'required|integer|exists:genders,id',
            'mobile' => 'required',
            'patient_name' => 'nullable',
            'dob' => 'required|date_format:Y-m-d',
            'year' => 'nullable|integer',
            'month' => 'nullable|integer|between:0,12',
            'day' => 'nullable|integer|between:0,31',
            'selected_test' => 'required|array',
            //            'selected_test.*' => 'exists:test_names,id',
            'total_amount' => 'required|min:0',
            'net_amount' => 'required|min:0',
            'due_amount' => 'required|min:0',
            'paid_amount' => 'required|min:0',
            'discount_is_percent' => 'boolean',
            'total_discount' => 'required|numeric|min:0',
        ]);
        DB::beginTransaction();
        try {
            $selected_test = $this->selected_test;
            $money_receive = DiagnosisMoneyReceiveModel::create([
                'patient_name' => $this->patient_name,
                'gender_id' => $this->gender_id,
                'dob' => $this->dob,
                'mobile' => $this->mobile,
                'discount_is_percent' => $this->discount_is_percent,
                'discount_amount' => $this->total_discount,
                'total_amount' => $this->total_amount,
                'net_amount' => $this->net_amount,
                'due_amount' => $this->due_amount,
                'paid_amount' => $this->paid_amount,
            ]);
            foreach ($selected_test as $test) {
                DiagnosisMoneyReceiveDetail::create([
                    'money_receive_id' => $money_receive->id,
                    'test_id' => $test['id'],
                    'test_name' => $test['name'],
                    'price' => $test['cost'],
                    'test_package_id' => $test['test_package_id'],
                    'is_discount' => $this->discount_is_percent,
                    'total_discount' => $test['total_discount'],
                    'qty' => $test['quantity'],
                    'sub_total' => $test['sub_total'],
                ]);
            }
            // diagnostic transaction table
            if ($this->paid_amount > 0) {
                DiagnosisTransaction::create([
                    'money_receive_id' => $money_receive->id,
                    'amount' => $this->paid_amount,
                ]);
            }

            DB::commit();
            $this->reset([
                'patient_name',
                'gender_id',
                'dob',
                'year',
                'month',
                'day',
                'mobile',
                'discount_is_percent',
                'total_discount',
                'total_amount',
                'net_amount',
                'due_amount',
                'paid_amount',
                'selected_test',
            ]);

            session()->flash('type', 'Success');
            session()->flash('message', 'Insert Successfully.');
        } catch (\Exception $e) {
            DB::rollBack();

            session()->flash('type', 'Warning');
            session()->flash('message', 'Error: '.$e->getMessage());
        }
    }

    public function render(): \Illuminate\Contracts\View\View|Factory|Application|View
    {
        return view('livewire.admin.diagnosis.diagnosis-money-receive', [
            'genders' => Gender::selectMenu(),
            'doctors' => Reference::selectMenu(),
        ]);
    }
}
