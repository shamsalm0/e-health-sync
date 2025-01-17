<?php

namespace App\Livewire\Admin\Library;

use App\Models\Admin\Library\Specialization;
use App\Traits\HasPermission;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class SpecializationList extends Component
{
    use HasPermission, WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $per_page = 15;

    public $filter;

    public $search;

    public $status;

    public function toggleStatus($specializationId): void
    {
        if (! $this->hasPermission('Specialization Edit')) {
            return;
        }
        $specialization = Specialization::find($specializationId);
        if ($specialization) {
            $specialization->status = ! $specialization->status;
            $specialization->save();
        }
    }

    public function delete($specializationId): void
    {
        if (! $this->hasPermission('Specialization Delete')) {
            return;
        }
        Specialization::findOrFail($specializationId)->delete();
        session()->flash('type', 'Success');
        session()->flash('message', 'Specialization deleted successfully.');

    }

    public function render(): \Illuminate\Contracts\View\View|Factory|Application|View
    {
        $search = $this->search;
        $status = $this->status;

        return view('livewire.admin.library.specialization-list', [
            'specializations' => Specialization::query()
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
