<?php

namespace App\Livewire\Admin\Library;

use App\Models\Admin\Library\Uom;
use App\Traits\HasPermission;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class UomList extends Component
{
    use HasPermission, WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $per_page = 15;

    public $filter;

    public $search;

    public $status;

    public function toggleStatus($uomId): void
    {
        if (! $this->hasPermission('Uom Edit')) {
            return;
        }
        $uom = Uom::find($uomId);
        if ($uom) {
            $uom->status = ! $uom->status;
            $uom->save();
        }
    }

    public function delete($uomId): void
    {
        if (! $this->hasPermission('Uom Delete')) {
            return;
        }
        Uom::findOrFail($uomId)->delete();
        session()->flash('type', 'Success');
        session()->flash('message', 'Uom deleted successfully.');

    }

    public function render(): \Illuminate\Contracts\View\View|Factory|Application|View
    {
        $search = $this->search;
        $status = $this->status;

        return view('livewire.admin.library.uom-list', [
            'uoms' => Uom::query()
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
