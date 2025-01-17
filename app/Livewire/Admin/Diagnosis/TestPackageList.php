<?php

namespace App\Livewire\Admin\Diagnosis;

use App\Models\Admin\Diagnosis\TestPackage;
use App\Traits\HasPermission;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;
use Livewire\WithPagination;

class TestPackageList extends Component
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

    public function updated($attr): void
    {
        $this->gotoPage(1);
    }

    public function saveOrUpdate(): void
    {
        $validated = $this->validate([
            'name' => 'required|string|min:3|unique:test_packages,name,'.$this->recordId,
            'description' => 'nullable|string',
        ]);

        if ($this->editing) {
            if (! $this->hasPermission('Test Package Edit')) {
                return;
            }
            $package = TestPackage::findOrFail($this->recordId);
            $package->update($validated);
            session()->flash('type', 'success');
            session()->flash('message', 'Package updated successfully.');
        } else {
            if (! $this->hasPermission('Test Package Add')) {
                return;
            }
            TestPackage::create($validated);
            session()->flash('type', 'success');
            session()->flash('message', 'Package created successfully.');
        }
        $this->resetForm();
    }

    public function edit($id): void
    {
        $package = TestPackage::findOrFail($id);
        $this->recordId = $package->id;
        $this->name = $package->name;
        $this->description = $package->description;
        $this->status = $package->status;
        $this->editing = true;
    }

    public function resetForm(): void
    {
        $this->name = '';
        $this->description = '';
        $this->recordId = null;
        $this->editing = false;
    }

    public function toggleStatus($id): void
    {
        if (! $this->hasPermission('Test Package Edit')) {
            return;
        }
        $ticketFee = TestPackage::find($id);
        if ($ticketFee) {
            $ticketFee->status = ! $ticketFee->status;
            $ticketFee->save();
            session()->flash('type', 'success');
            session()->flash('message', 'Status updated successfully.');
        }
    }

    public function delete($testPackageId): void
    {
        if (! $this->hasPermission('Test Package Delete')) {
            return;
        }
        TestPackage::findOrFail($testPackageId)->delete();
        session()->flash('type', 'Success');
        session()->flash('message', 'Test Package deleted successfully.');

    }

    public function render(): View|Factory|Application|\Illuminate\View\View
    {
        $search = $this->search;
        $status = $this->status;

        return view('livewire.admin.diagnostic.test-package-list', [
            'testPackages' => TestPackage::query()
                ->when($this->search, function ($query) use ($search) {
                    $query->where('name', 'like', '%'.$search.'%');
                })
                ->where(function ($query) use ($status) {
                    if ($status != '') {
                        $query->where('status', $status);
                    }
                })
                ->paginate($this->per_page),
        ]);
    }
}
