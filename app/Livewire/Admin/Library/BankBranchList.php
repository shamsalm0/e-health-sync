<?php

namespace App\Livewire\Admin\Library;

use App\Models\Admin\Library\BankBranch;
use App\Traits\HasPermission;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class BankBranchList extends Component
{
    use HasPermission, WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $filter;

    public $per_page = 15;

    public $search;

    public $status;

    public function toggleStatus($bankBranchId): void
    {
        if (! $this->hasPermission('Bank Branch Edit')) {
            return;
        }
        $branch = BankBranch::find($bankBranchId);
        if ($branch) {
            $branch->status = ! $branch->status;
            $branch->save();
        }
    }

    public function delete($bankBranchId): void
    {
        if (! $this->hasPermission('Bank Branch Delete')) {
            return;
        }
        BankBranch::findOrFail($bankBranchId)->delete();
        session()->flash('type', 'Success');
        session()->flash('message', 'Bank Branch deleted successfully.');

    }

    public function render(): \Illuminate\Contracts\View\View|Factory|Application|View
    {
        $search = $this->search;
        $status = $this->status;

        return view('livewire.admin.library.bank-branch-list', [
            'bankBranches' => BankBranch::query()
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
