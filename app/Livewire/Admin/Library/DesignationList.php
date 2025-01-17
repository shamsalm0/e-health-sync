<?php

namespace App\Livewire\Admin\Library;

use App\Models\Admin\Library\designation;
use App\Traits\HasPermission;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class DesignationList extends Component
{
    use HasPermission, WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $per_page = 15;

    public $filter;

    public $search;

    public $status;

    public function toggleStatus($designationId): void
    {
        if (! $this->hasPermission('Designation Edit')) {
            return;
        }
        $designation = Designation::find($designationId);
        if ($designation) {
            $designation->status = ! $designation->status;
            $designation->save();
        }
    }

    public function delete($designationId): void
    {
        if (! $this->hasPermission('Designation Delete')) {
            return;
        }
        Designation::findOrFail($designationId)->delete();
        session()->flash('type', 'Success');
        session()->flash('message', 'Designation deleted successfully.');
    }

    public function render(): \Illuminate\Contracts\View\View|Factory|Application|View
    {
        $search = $this->search;
        $status = $this->status;

        return view('livewire.admin.library.designation-list', [
            'designations' => Designation::query()
                ->when($this->search, function ($query) use ($search) {
                    $query->where('name', 'like', '%'.$search.'%');
                    $query->orWhere('description', 'like', '%'.$search.'%');
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
