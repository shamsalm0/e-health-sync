<?php

namespace App\Livewire\Admin\Library;

use App\Models\Admin\Library\Shift;
use App\Traits\HasPermission;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class ShiftList extends Component
{
    use HasPermission, WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $per_page = 15;

    public $filter;

    public $search;

    public $status;

    public function toggleStatus($shiftId): void
    {
        if (! $this->hasPermission('Shift Edit')) {
            return;
        }
        $shift = Shift::find($shiftId);
        if ($shift) {
            $shift->status = ! $shift->status;
            $shift->save();
        }
    }

    public function delete($shiftId): void
    {
        if (! $this->hasPermission('Shift Delete')) {
            return;
        }
        Shift::findOrFail($shiftId)->delete();
        session()->flash('type', 'Success');
        session()->flash('message', 'Shift deleted successfully.');

    }

    public function render(): \Illuminate\Contracts\View\View|Factory|Application|View
    {
        $search = $this->search;
        $status = $this->status;

        return view('livewire.admin.library.shift-list', [
            'shifts' => Shift::query()
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
