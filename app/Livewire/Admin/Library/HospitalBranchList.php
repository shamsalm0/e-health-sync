<?php

namespace App\Livewire\Admin\Library;

use App\Models\Admin\Library\HospitalBranch;
use App\Traits\HasPermission;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class HospitalBranchList extends Component
{
    use HasPermission, WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $per_page = 15;

    public $filter;

    public $search;

    public $status;

    public function toggleStatus($branchId): void
    {
        if (! $this->hasPermission('Hospital Branch Edit')) {
            return;
        }
        $branch = HospitalBranch::find($branchId);
        if ($branch) {
            $branch->status = ! $branch->status;
            $branch->save();
        }
    }

    public function delete($branchId): void
    {
        if (! $this->hasPermission('Hospital Branch Delete')) {
            return;
        }
        HospitalBranch::findOrFail($branchId)->delete();
        session()->flash('type', 'Success');
        session()->flash('message', 'Branch deleted successfully.');

    }

    public function render(): \Illuminate\Contracts\View\View|Factory|Application|View
    {
        $search = $this->search;
        $status = $this->status;

        return view('livewire.admin.library.hospital-branch-list', [
            'branches' => HospitalBranch::query()
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
