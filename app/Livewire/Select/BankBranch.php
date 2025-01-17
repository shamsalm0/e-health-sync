<?php

namespace App\Livewire\Select;

use App\Models\Admin\Library\Bank;
use App\Models\Admin\Library\BankBranch as BranchModel;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
use Livewire\Component;

class BankBranch extends Component
{
    public $bank_id;

    public $branch_id;

    public function render(): \Illuminate\Contracts\View\View|Factory|Application|View
    {
        return view('livewire.select.bank-branch', [
            'banks' => Bank::selectMenu(),
            'branches' => BranchModel::selectMenu($this->bank_id),
        ]);
    }
}
