<?php

namespace App\Livewire\Admin\Diagnosis;

use App\Models\admin\Diagnosis\Machine;
use App\Traits\HasPermission;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;
use Livewire\WithPagination;

class MachineList extends Component
{
    use HasPermission, WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $per_page = 15;

    public $filter = true;

    public $search;

    public $status;

    public function updated($attr): void
    {
        $this->gotoPage(1);
    }

    public function toggleStatus($machineId): void
    {
        if (! $this->hasPermission('Machine Edit')) {
            return;
        }
        $machine = Machine::findOrFail($machineId);
        if ($machine) {
            $machine->status = ! $machine->status;
            $machine->save();
            session()->flash('type', 'Success');
            session()->flash('message', 'Status updated successfully.');
        }
    }

    public function delete($machineId): void
    {
        if (! $this->hasPermission('Machine Delete')) {
            return;
        }
        Machine::findOrFail($machineId)->delete();
        session()->flash('type', 'Success');
        session()->flash('message', 'Machine deleted successfully.');

    }

    public function render(): View|Factory|Application|\Illuminate\View\View
    {
        $search = $this->search;
        $status = $this->status;

        return view('livewire.admin.diagnosis.machine-list', [
            'machines' => Machine::query()
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
