<?php

namespace App\Livewire\Admin\Library;

use App\Models\Admin\Library\Union;
use App\Traits\HasPermission;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class UnionList extends Component
{
    use HasPermission, WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $per_page = 15;

    public $filter;

    public $search;

    public $status;

    public function toggleStatus($unionId): void
    {
        if (! $this->hasPermission('Union Edit')) {
            return;
        }
        $union = Union::find($unionId);
        if ($union) {
            $union->status = ! $union->status;
            $union->save();
        }
    }

    public function delete($unionId): void
    {
        if (! $this->hasPermission('Union Delete')) {
            return;
        }
        Union::findOrFail($unionId)->delete();
        session()->flash('type', 'Success');
        session()->flash('message', 'Union deleted successfully.');
    }

    public function render(): \Illuminate\Contracts\View\View|Factory|Application|View
    {
        $search = $this->search;
        $status = $this->status;

        return view('livewire.admin.library.union-list', [
            'unions' => Union::query()
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
