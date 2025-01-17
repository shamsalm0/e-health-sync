<?php

namespace App\Livewire\Admin\Diagnosis;

use App\Models\admin\Diagnosis\TestName;
use App\Traits\HasPermission;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;
use Livewire\WithPagination;

class TestNameList extends Component
{
    use HasPermission, WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $per_page = 15;

    public $filter;

    public $search;

    public $status;

    public function updated($attr): void
    {
        $this->gotoPage(1);
    }

    public function toggleStatus($testNameId): void
    {
        if (! $this->hasPermission('Test Name Edit')) {
            return;
        }
        $testName = TestName::findOrFail($testNameId);
        if ($testName) {
            $testName->status = ! $testName->status;
            $testName->save();
            session()->flash('type', 'Success');
            session()->flash('message', 'Status updated successfully.');
        }
    }

    public function delete($testNameId): void
    {
        if (! $this->hasPermission('Test Name Delete')) {
            return;
        }
        TestName::findOrFail($testNameId)->delete();
        session()->flash('type', 'Success');
        session()->flash('message', 'Test Name deleted successfully.');

    }

    public function render(): View|Factory|Application|\Illuminate\View\View
    {
        $search = $this->search;
        $status = $this->status;

        return view('livewire.admin.diagnosis.test-name-list', [
            'test_names' => TestName::query()
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
