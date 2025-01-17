<?php

namespace App\Livewire\List;

use App\Models\Admin\Library\Agent as AgentModel;
use App\Traits\HasPermission;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;
use Livewire\WithPagination;

class Agent extends Component
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
        $agent = AgentModel::find($id);
        if ($agent) {
            $agent->status = ! $agent->status;
            $agent->save();
            session()->flash('type', 'success');
            session()->flash('message', 'Status updated successfully.');
        }
    }

    public function delete($id): void
    {
        if (! $this->hasPermission('Agent Delete')) {
            return;
        }
        AgentModel::findOrFail($id)->delete();
        session()->flash('type', 'Success');
        session()->flash('message', 'Agent deleted successfully.');
    }

    public function render(): Factory|Application|View|\Illuminate\View\View
    {
        $search = $this->search;
        $status = $this->status;

        return view('livewire.list.agent', [
            'agents' => AgentModel::query()
                ->when($this->search, function ($query) use ($search) {
                    $query->where('name', 'like', '%'.$search.'%');
                })
                ->when($status !== '')
                ->where('status', $status)
                ->paginate($this->per_page),
        ]);
    }
}
