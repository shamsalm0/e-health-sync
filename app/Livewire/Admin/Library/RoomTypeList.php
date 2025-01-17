<?php

namespace App\Livewire\Admin\Library;

use App\Models\Admin\Library\RoomType;
use App\Traits\HasPermission;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class RoomTypeList extends Component
{
    use HasPermission, WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $per_page = 15;

    public $filter;

    public $search;

    public $status;

    public function toggleStatus($roomId): void
    {
        if (! $this->hasPermission('Room Type Edit')) {
            return;
        }
        $room = RoomType::find($roomId);
        if ($room) {
            $room->status = ! $room->status;
            $room->save();
            session()->flash('type', 'Success');
            session()->flash('message', 'Room type deleted successfully.');
        }
    }

    public function delete($roomId): void
    {
        if (! $this->hasPermission('Room Type Delete')) {
            return;
        }
        RoomType::findOrFail($roomId)->delete();
        session()->flash('type', 'Success');
        session()->flash('message', 'Room type deleted successfully.');
    }

    public function render(): \Illuminate\Contracts\View\View|Factory|Application|View
    {
        $search = $this->search;
        $status = $this->status;

        return view('livewire.admin.library.room-type-list', [
            'rooms' => RoomType::query()
                ->when($this->search, function ($query) use ($search) {
                    $query->where('name_no', 'like', '%'.$search.'%');
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
