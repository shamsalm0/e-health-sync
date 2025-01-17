<?php

namespace App\Livewire\Admin\Library;

use App\Models\Admin\Library\Department;
use App\Traits\HasPermission;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class DepartmentList extends Component
{
    use HasPermission, WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $per_page = 15;

    public $filter;

    public $search;

    public $status;

    public function toggleStatus($departmentId): void
    {
        if (! $this->hasPermission('Department Edit')) {
            return;
        }
        $department = Department::find($departmentId);
        if ($department) {
            $department->status = ! $department->status;
            $department->save();
            session()->flash('type', 'Success');
            session()->flash('message', 'Status updated successfully.');
        }
    }

    public function delete($departmentId): void
    {
        if (! $this->hasPermission('Department Delete')) {
            return;
        }
        Department::findOrFail($departmentId)->delete();
        session()->flash('type', 'Success');
        session()->flash('message', 'Department deleted successfully.');

    }

    public function render(): \Illuminate\Contracts\View\View|Factory|Application|View
    {
        $search = $this->search;
        $status = $this->status;

        return view('livewire.admin.library.department-list', [
            'departments' => Department::query()
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
