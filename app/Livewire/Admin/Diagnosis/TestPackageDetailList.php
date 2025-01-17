<?php

namespace App\Livewire\Admin\Diagnosis;

use App\Models\Admin\Diagnosis\TestName;
use App\Models\Admin\Diagnosis\TestPackage;
use App\Models\Admin\Diagnosis\TestPackageDetail;
use App\Traits\HasPermission;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class TestPackageDetailList extends Component
{
    use HasPermission, WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $filter = true;

    public $per_page = 15;

    public $search;

    public $status = '';

    public $name = '';

    public $description;

    public $editing = false;

    public $recordId = '';

    public $test_name_id;

    public $price;

    public $package;

    public function updated($attr): void
    {
        $this->gotoPage(1);
    }

    public function mount(): void
    {
        $packageId = request()->route('package_id');
        $this->package = TestPackage::findOrFail($packageId);
    }

    public function saveOrUpdate(): void
    {
        $validated = $this->validate([
            'test_name_id' => [
                'required',
                'exists:test_names,id',
                Rule::unique('test_package_details')
                    ->where(function ($query) {
                        return $query->where('test_name_id', $this->test_name_id)
                            ->where('package_id', $this->package->id)
                            ->whereNull('deleted_at');
                    })
                    ->ignore($this->recordId),
            ],
            'price' => 'required|gte:0|numeric',
        ]);

        if ($this->editing) {
            if (! $this->hasPermission('Test Package Details Edit')) {
                return;
            }

            $packageDetail = TestPackageDetail::findOrFail($this->recordId);
            $packageDetail->update($validated);
            session()->flash('type', 'success');
            session()->flash('message', 'Test updated successfully.');
        } else {
            if (! $this->hasPermission('Test Package Details Add')) {
                return;
            }

            $validated['package_id'] = $this->package->id;
            TestPackageDetail::create($validated);
            session()->flash('type', 'success');
            session()->flash('message', 'Test added successfully.');
        }

        $this->resetForm();
    }

    public function resetForm(): void
    {
        $this->test_name_id = '';
        $this->price = '';
        $this->recordId = null;
        $this->editing = false;
    }

    public function delete($detailId): void
    {
        if (! $this->hasPermission('Test Package Details Delete')) {
            return;
        }
        TestPackageDetail::findOrFail($detailId)->delete();
        session()->flash('type', 'Success');
        session()->flash('message', 'Test deleted successfully.');

    }

    public function edit($id): void
    {
        $packageDetails = TestPackageDetail::findOrFail($id);
        $this->recordId = $packageDetails->id;
        $this->test_name_id = $packageDetails->test_name_id;
        $this->price = $packageDetails->price;
        $this->editing = true;
    }

    public function render(): View|Factory|Application|\Illuminate\View\View
    {
        return view('livewire.admin.diagnostic.test-package-detail-list', [
            'testNames' => TestName::selectMenu(),
            'test' => TestName::find($this->test_name_id),
            'packageDetails' => TestPackageDetail::where('package_id', $this->package?->id)->paginate($this->per_page),
        ]);
    }
}
