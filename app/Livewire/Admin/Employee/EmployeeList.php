<?php

namespace App\Livewire\Admin\Employee;

use App\Models\admin\Employee\EmpInfo;
use App\Traits\HasPermission;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class EmployeeList extends Component
{
    use HasPermission, WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $per_page = 15;

    public $filter;

    public $search;

    public $status;

    public function updated($attr)
    {
        $this->gotoPage(1);
    }

    public function toggleStatus($empId)
    {
        // if (! $this->hasPermission('Employee Edit')) {
        //     return;
        // }
        $employee = EmpInfo::find($empId);
        if ($employee) {
            $employee->status = ! $employee->status;
            $employee->save();
        }
    }

    public function render(): \Illuminate\Contracts\View\View|Factory|Application|View
    {
        $search = $this->search;
        $status = $this->status;

        return view('livewire.admin.employee.employee-list', [
            'employees' => EmpInfo::query()
                ->when($this->search, function ($query) use ($search) {
                    $query->where('name', 'like', '%'.$search.'%');
                    $query->OrWhere('father', 'like', '%'.$search.'%');
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
