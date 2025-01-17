<?php

namespace App\Livewire\Admin\Diagnosis;

use App\Models\admin\Diagnosis\TestGroup;
use App\Traits\HasPermission;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class TestGroupList extends Component
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

    public function toggleStatus($testGroupId): void
    {
        if (! $this->hasPermission('Test Group Edit')) {
            return;
        }
        $testGroup = TestGroup::findOrFail($testGroupId);
        if ($testGroup) {
            $testGroup->status = ! $testGroup->status;
            $testGroup->save();
            session()->flash('type', 'Success');
            session()->flash('message', 'Status updated successfully.');
        }
    }

    public function delete($testGroupId): void
    {
        if (! $this->hasPermission('Test Group Delete')) {
            return;
        }
        TestGroup::findOrFail($testGroupId)->delete();
        session()->flash('type', 'Success');
        session()->flash('message', 'Test Group deleted successfully.');

    }

    public function render(): \Illuminate\Contracts\View\View|Factory|Application|View
    {
        $search = $this->search;
        $status = $this->status;

        return view('livewire.admin.diagnosis.test-group-list', [
            'test_groups' => TestGroup::query()
                ->when($this->search, function ($query) use ($search) {
                    $query->where('name', 'like', '%'.$search.'%');
                    $query->orWhere('description', 'like', '%'.$search.'%');
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
