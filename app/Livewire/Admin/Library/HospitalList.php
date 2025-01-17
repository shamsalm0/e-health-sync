<?php

namespace App\Livewire\Admin\Library;

use App\Models\Admin\Library\Hospital;
use App\Traits\HasPermission;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class HospitalList extends Component
{
    use HasPermission, WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $per_page = 15;

    public $filter;

    public $search;

    public $status;

    public function toggleStatus($hospitalId): void
    {
        if (! $this->hasPermission('Hospital Edit')) {
            return;
        }
        $hospital = Hospital::find($hospitalId);
        if ($hospital) {
            $hospital->status = ! $hospital->status;
            $hospital->save();
        }
    }

    public function delete($hospitalId): void
    {
        if (! $this->hasPermission('Hospital Delete')) {
            return;
        }
        Hospital::findOrFail($hospitalId)->delete();
        session()->flash('type', 'Success');
        session()->flash('message', 'Hospital deleted successfully.');

    }

    public function render(): \Illuminate\Contracts\View\View|Factory|Application|View
    {
        $search = $this->search;
        $status = $this->status;

        return view('livewire.admin.library.hospital-list', [
            'hospitals' => Hospital::query()
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
