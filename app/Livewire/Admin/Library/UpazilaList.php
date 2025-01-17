<?php

namespace App\Livewire\Admin\Library;

use App\Models\Admin\Library\Upazila;
use App\Traits\HasPermission;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class UpazilaList extends Component
{
    use HasPermission, WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $per_page = 15;

    public $filter;

    public $search;

    public $status;

    public function toggleStatus($upazilaId): void
    {
        if (! $this->hasPermission('Upazila Edit')) {
            return;
        }
        $upazila = Upazila::find($upazilaId);
        if ($upazila) {
            $upazila->status = ! $upazila->status;
            $upazila->save();
        }
    }

    public function delete($upazilaId): void
    {
        if (! $this->hasPermission('Upazila Delete')) {
            return;
        }
        Upazila::findOrFail($upazilaId)->delete();
        session()->flash('type', 'Success');
        session()->flash('message', 'upazila deleted successfully.');
    }

    public function render(): \Illuminate\Contracts\View\View|Factory|Application|View
    {
        $search = $this->search;
        $status = $this->status;

        return view('livewire.admin.library.upazila-list', [
            'upazilas' => Upazila::query()
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
