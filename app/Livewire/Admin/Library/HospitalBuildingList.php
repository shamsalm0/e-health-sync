<?php

namespace App\Livewire\Admin\Library;

use App\Models\Admin\Library\HospitalBuilding;
use App\Traits\HasPermission;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class HospitalBuildingList extends Component
{
    use HasPermission, WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $per_page = 15;

    public $filter;

    public $search;

    public $status;

    public function toggleStatus($buildingId): void
    {
        if (! $this->hasPermission('Hospital Building Edit')) {
            return;
        }
        $branch = HospitalBuilding::find($buildingId);
        if ($branch) {
            $branch->status = ! $branch->status;
            $branch->save();
        }
    }

    public function delete($buildingId): void
    {
        if (! $this->hasPermission('Hospital Building Delete')) {
            return;
        }
        HospitalBuilding::findOrFail($buildingId)->delete();
        session()->flash('type', 'Success');
        session()->flash('message', 'Building deleted successfully.');

    }

    public function render(): \Illuminate\Contracts\View\View|Factory|Application|View
    {
        $search = $this->search;
        $status = $this->status;

        return view('livewire.admin.library.hospital-building-list', [
            'buildings' => HospitalBuilding::query()
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
