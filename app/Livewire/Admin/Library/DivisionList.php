<?php

namespace App\Livewire\Admin\Library;

use App\Models\Admin\Library\Division;
use App\Traits\HasPermission;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class DivisionList extends Component
{
    use HasPermission, WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $per_page = 15;

    public $filter;

    public $search;

    public $status;

    public function toggleStatus($divisionId): void
    {
        if (! $this->hasPermission('Division Edit')) {
            return;
        }
        $division = Division::find($divisionId);
        if ($division) {
            $division->status = ! $division->status;
            $division->save();
        }
    }

    public function delete($divisionId): void
    {
        if (! $this->hasPermission('Division Delete')) {
            return;
        }
        Division::findOrFail($divisionId)->delete();
        session()->flash('type', 'Success');
        session()->flash('message', 'Division deleted successfully.');
    }

    public function render(): \Illuminate\Contracts\View\View|Factory|Application|View
    {
        $search = $this->search;
        $status = $this->status;

        return view('livewire.admin.library.division-list', [
            'divisions' => Division::query()
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
