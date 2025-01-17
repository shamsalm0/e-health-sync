<?php

namespace App\Livewire\Admin\Library;

use App\Models\Admin\Library\HospitalRoom;
use App\Traits\HasPermission;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;
use Livewire\WithPagination;

class HospitalRoomList extends Component
{
    use HasPermission, WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $per_page = 15;

    public $filter;

    public $search;

    public $status;

    public function toggleStatus($roomId): void
    {
        if (! $this->hasPermission('Hospital Room Edit')) {
            return;
        }
        $room = HospitalRoom::find($roomId);
        if ($room) {
            $room->status = ! $room->status;
            $room->save();
            session()->flash('type', 'Success');
            session()->flash('message', 'Hospital room deleted successfully.');
        }
    }

    public function delete($roomId): void
    {
        if (! $this->hasPermission('Hospital Room Delete')) {
            return;
        }
        HospitalRoom::findOrFail($roomId)->delete();
        session()->flash('type', 'Success');
        session()->flash('message', 'Hospital room deleted successfully.');
    }

    public function render(): View|Factory|Application|\Illuminate\View\View
    {
        $search = $this->search;
        $status = $this->status;

        return view('livewire.admin.library.hospital-room-list', [
            'rooms' => HospitalRoom::query()
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
