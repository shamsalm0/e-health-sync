<?php

namespace App\Livewire\List;

use App\Models\Admin\Diagnosis\TestMachine as TestMachineModel;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;
use Livewire\WithPagination;

class TestMachine extends Component
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
        $testMachine = TestMachineModel::find($id);
        if ($testMachine) {
            $testMachine->status = ! $testMachine->status;
            $testMachine->save();
            session()->flash('type', 'Success');
            session()->flash('message', 'Status updated successfully.');
        }
    }

    public function delete($id): void
    {
        TestMachineModel::findOrFail($id)->delete();
        session()->flash('type', 'Success');
        session()->flash('message', 'Test Machine deleted successfully.');
    }

    public function render(): Factory|View|Application|\Illuminate\View\View
    {
        $search = $this->search;
        $status = $this->status;

        return view('livewire.list.test-machine', [
            'testMachines' => TestMachineModel::query()
                ->when($this->search, function ($query) use ($search) {
                    $query->where('name', 'like', '%'.$search.'%');
                })
                ->when($status !== '')
                ->where('status', $status)
                ->paginate($this->per_page),
        ]);
    }
}
