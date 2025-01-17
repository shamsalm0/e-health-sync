<?php

namespace App\Livewire\Authentication;

use App\Models\LoginHistory;
use App\Traits\HasPermission;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;
use Livewire\WithPagination;

class LoginHistoryList extends Component
{
    use HasPermission, WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $per_page = 15;

    public function updated($attr): void
    {
        $this->gotoPage(1);
    }

    public function render(): View|Factory|Application|\Illuminate\View\View
    {
        return view('livewire.authentication.login-history-list', [
            'loginHistories' => LoginHistory::latest('request_at')->paginate($this->per_page),
        ]);
    }
}
