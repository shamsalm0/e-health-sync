<?php

namespace App\Livewire\Admin\Doctor;

use App\Models\Admin\Diagnosis\TestName;
use App\Models\Admin\Doctor\Reference;
use App\Models\Admin\Doctor\ReportDoctorCommission as DoctorReportDoctorCommission;
use App\Models\Admin\Library\DiscountServiceSetup;
use App\Traits\HasPermission;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;
use Livewire\WithPagination;

class ReportDoctorCommission extends Component
{
    use HasPermission, WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $filter = true;

    public $per_page = 15;

    public $doctors;

    public $services;

    public $tests;

    public $comm_types;

    public $search;

    public $status = '';

    public $report_doctor_id;

    public $service_id;

    public $test_name_id;

    public $commission_on;

    public $commission_type;

    public $commission;

    public $editing = false;

    public $recordId = '';

    public function updated($attr): void
    {
        $this->gotoPage(1);
    }

    public function mount(): void
    {
        $this->doctors = Reference::selectMenu();
        $this->services = DiscountServiceSetup::selectCommissionService();
        $this->tests = TestName::selectMenu();
        $this->comm_types = ['' => 'Select', '1' => 'Percent', '2' => 'Amount'];
    }

    public function saveOrUpdate(): void
    {
        $validated = $this->validate([
            'report_doctor_id' => 'required',
            'service_id' => 'required',
            'test_name_id' => 'required_if:commission_on,1',
            'commission_on' => 'required',
            'commission_type' => 'required',
            'commission' => 'required|numeric|min:0',
        ], [
            'test_name_id.required_if' => 'The test name is required when commission on is set to Single Item.',
            'report_doctor_id.required' => 'Please select a doctor.',
            'service_id.required' => 'Please select a service.',
            'commission_on.required' => 'Please select the commission on value.',
            'commission_type.required' => 'Please select the commission type.',
            'commission.required' => 'Commission is required.',
            'commission.numeric' => 'Commission must be a valid number.',
            'commission.min' => 'Commission cannot be less than 0.',
        ]);

        // 2 - all item
        if ($this->commission_on == 2) {
            $testNames = TestName::select('id')->get();

            foreach ($testNames as $test) {
                DoctorReportDoctorCommission::updateOrCreate(
                    [
                        'report_doctor_id' => $validated['report_doctor_id'],
                        'test_name_id' => $test->id,
                    ],
                    [
                        'report_doctor_id' => $validated['report_doctor_id'],
                        'service_id' => $validated['service_id'],
                        'test_name_id' => $test->id,
                        'commission_on' => $validated['commission_on'],
                        'commission_type' => $validated['commission_type'],
                        'commission' => $validated['commission'],
                    ]
                );
            }
        } else {
            DoctorReportDoctorCommission::updateOrCreate(
                [
                    'report_doctor_id' => $validated['report_doctor_id'],
                    'test_name_id' => $validated['test_name_id'],
                ],
                $validated
            );
        }

        session()->flash('type', 'success');
        session()->flash('message', 'Package created successfully.');

        $this->resetForm();
    }

    public function edit($id): void
    {
        $commission = DoctorReportDoctorCommission::findOrFail($id);
        $this->recordId = $commission->id;
        $this->report_doctor_id = $commission->report_doctor_id;
        $this->service_id = $commission->service_id;
        $this->test_name_id = $commission->test_name_id;
        $this->commission_on = $commission->commission_on;
        $this->commission_type = $commission->commission_type;
        $this->commission = $commission->commission;
        $this->editing = true;
    }

    public function resetForm(): void
    {
        $this->report_doctor_id = '';
        $this->service_id = '';
        $this->test_name_id = '';
        $this->commission_on = '';
        $this->commission_type = '';
        $this->commission = '';
        $this->editing = false;
        $this->recordId = null;
    }

    public function render(): View|Factory|Application|\Illuminate\View\View
    {

        return view('livewire.admin.doctor.report-doctor-commission', [
            'reportDocCommissions' => DoctorReportDoctorCommission::query()
                ->when($this->report_doctor_id, function ($query) {
                    return $query->where('report_doctor_id', $this->report_doctor_id);
                })
                ->paginate($this->per_page),
        ]);
    }
}
