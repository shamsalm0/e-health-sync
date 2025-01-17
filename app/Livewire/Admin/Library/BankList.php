<?php

namespace App\Livewire\Admin\Library;

use App\Models\Admin\Library\Bank;
use App\Traits\HasPermission;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class BankList extends Component
{
    use HasPermission, WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $filter;

    public $per_page = 15;

    public $search;

    public $status;

    public function toggleStatus($bankId): void
    {
        if (! $this->hasPermission('Bank Edit')) {
            return;
        }
        $bank = Bank::find($bankId);
        if ($bank) {
            $bank->status = ! $bank->status;
            $bank->save();
        }
    }

    public function delete($bankId): void
    {
        if (! $this->hasPermission('Bank Delete')) {
            return;
        }
        Bank::findOrFail($bankId)->delete();
        session()->flash('type', 'Success');
        session()->flash('message', 'Bank deleted successfully.');

    }

    public function render(): \Illuminate\Contracts\View\View|Factory|Application|View
    {
        $search = $this->search;
        $status = $this->status;

        return view('livewire.admin.library.bank-list', [
            'banks' => Bank::query()
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
