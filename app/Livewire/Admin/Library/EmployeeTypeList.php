<?php

namespace App\Livewire\Admin\Library;

use App\Models\admin\Employee\EmployeeType;
use App\Traits\HasPermission;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class EmployeeTypeList extends Component
{
    use HasPermission, WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $per_page = 15;

    public $search;

    public $status;

    public function toggleStatus($employeeTypeId): void
    {
        if (! $this->hasPermission('Employee Type Edit')) {
            return;
        }
        $employeeType = EmployeeType::find($employeeTypeId);
        if ($employeeType) {
            $employeeType->status = ! $employeeType->status;
            $employeeType->save();
        }
    }

    public function delete($employeeTypeId): void
    {
        if (! $this->hasPermission('Employee Type Delete')) {
            return;
        }
        EmployeeType::findOrFail($employeeTypeId)->delete();
        session()->flash('type', 'Success');
        session()->flash('message', 'EmployeeType deleted successfully.');

    }

    public function render(): \Illuminate\Contracts\View\View|Factory|Application|View
    {
        $search = $this->search;
        $status = $this->status;

        return view('livewire.admin.library.employee-type-list', [
            'employeeTypes' => EmployeeType::query()
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
