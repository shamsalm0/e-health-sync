<?php

namespace App\Livewire\Authentication;

use App\Models\MessageLog;
use App\Traits\HasPermission;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;
use Livewire\WithPagination;

class MessageLogList extends Component
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
        return view('livewire.authentication.message-log-list', [
            'messageLogs' => MessageLog::latest()->paginate($this->per_page),
        ]);
    }
}
