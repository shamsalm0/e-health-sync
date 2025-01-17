<?php

namespace App\Livewire\Admin\Library;

use App\Models\Admin\Library\HospitalFloor;
use App\Traits\HasPermission;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class HospitalFloorList extends Component
{
    use HasPermission, WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $per_page = 15;

    public $filter;

    public $search;

    public $status;

    public function toggleStatus($floorId): void
    {
        if (! $this->hasPermission('Hospital Floor Edit')) {
            return;
        }
        $floor = HospitalFloor::find($floorId);
        if ($floor) {
            $floor->status = ! $floor->status;
            $floor->save();
        }
    }

    public function delete($floorId): void
    {
        if (! $this->hasPermission('Hospital Floor Delete')) {
            return;
        }
        HospitalFloor::findOrFail($floorId)->delete();
        session()->flash('type', 'Success');
        session()->flash('message', 'Hospital floor deleted successfully.');
    }

    public function render(): \Illuminate\Contracts\View\View|Factory|Application|View
    {
        $search = $this->search;
        $status = $this->status;

        return view('livewire.admin.library.hospital-floor-list', [
            'floors' => HospitalFloor::query()
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
