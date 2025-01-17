<?php

namespace App\Livewire\List;

use App\Models\Admin\Library\AgentCommission as AgentCommissionModel;
use App\Traits\HasPermission;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class AgentCommission extends Component
{
    use HasPermission, WithPagination;

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
        $agentCommission = AgentCommissionModel::find($id);
        if ($agentCommission) {
            $agentCommission->status = ! $agentCommission->status;
            $agentCommission->save();
            session()->flash('type', 'success');
            session()->flash('message', 'Status updated successfully.');
        }
    }

    public function delete($id): void
    {
        if (! $this->hasPermission('Agent Commission Delete')) {
            return;
        }
        AgentCommissionModel::findOrFail($id)->delete();
        session()->flash('type', 'Success');
        session()->flash('message', 'Agent Commission deleted successfully.');
    }

    public function render(): Factory|\Illuminate\Contracts\View\View|Application|View
    {
        $search = $this->search;
        $status = $this->status;

        return view('livewire.list.agent-commission', [
            'agentCommissions' => AgentCommissionModel::with('test', 'agent')
                ->when($this->search, function ($query) use ($search) {
                    $query->where('name', 'like', '%'.$search.'%');
                })
                ->when($status !== '')
                ->where('status', $status)
                ->paginate($this->per_page),
        ]);
    }
}
