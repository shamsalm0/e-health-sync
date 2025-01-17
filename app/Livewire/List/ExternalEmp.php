<?php

namespace App\Livewire\List;

use App\Models\Admin\Employee\ExternalEmp as ExternalEmpModel;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class ExternalEmp extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $filter = true;

    public $per_page = 15;

    public $search;

    public $status = '';

    public function updated($attr): void
    {
        $this->gotoPage(1);
    }

    public function toggleStatus($id): void
    {
        $externalEmp = ExternalEmpModel::find($id);
        if ($externalEmp) {
            $externalEmp->status = ! $externalEmp->status;
            $externalEmp->save();
            session()->flash('type', 'Success');
            session()->flash('message', 'Status updated successfully.');
        }
    }

    public function delete($id): void
    {
        ExternalEmpModel::findOrFail($id)->delete();
        session()->flash('type', 'Success');
        session()->flash('message', 'Grade deleted successfully.');
    }

    public function render(): Factory|\Illuminate\Contracts\View\View|Application|View
    {
        $search = $this->search;
        $status = $this->status;

        return view('livewire.list.external-emp', [
            'externalEmps' => ExternalEmpModel::with('branch', 'department', 'designation', 'employeeType')
                ->when($this->search, function ($query) use ($search) {
                    $query->where('name', 'like', '%'.$search.'%');
                })
                ->when($status !== '')
                ->where('status', $status)
                ->paginate($this->per_page),
        ]);
    }
}
