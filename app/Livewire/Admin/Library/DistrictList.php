<?php

namespace App\Livewire\Admin\Library;

use App\Models\Admin\Library\District;
use App\Traits\HasPermission;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class DistrictList extends Component
{
    use HasPermission, WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $per_page = 15;

    public $filter;

    public $search;

    public $status;

    public function toggleStatus($districtId): void
    {
        if (! $this->hasPermission('District Edit')) {
            return;
        }
        $district = District::find($districtId);
        if ($district) {
            $district->status = ! $district->status;
            $district->save();
        }
    }

    public function delete($districtId): void
    {
        if (! $this->hasPermission('District Delete')) {
            return;
        }
        District::findOrFail($districtId)->delete();
        session()->flash('type', 'Success');
        session()->flash('message', 'District deleted successfully.');
    }

    public function render(): \Illuminate\Contracts\View\View|Factory|Application|View
    {
        $search = $this->search;
        $status = $this->status;

        return view('livewire.admin.library.district-list', [
            'districts' => District::query()
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
