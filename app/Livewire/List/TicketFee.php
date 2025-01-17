<?php

namespace App\Livewire\List;

use App\Models\TicketFee as TicketFeeModel;
use App\Traits\HasPermission;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;
use Livewire\WithPagination;

class TicketFee extends Component
{
    use HasPermission, WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $filter = true;

    public $per_page = 15;

    public $search;

    public $status = '';

    public function updated($attr): void
    {
        $this->gotoPage(1);
    }

    public function toggleStatus($id): void
    {
        $ticketFee = TicketFeeModel::find($id);
        if ($ticketFee) {
            $ticketFee->status = ! $ticketFee->status;
            $ticketFee->save();
            session()->flash('type', 'success');
            session()->flash('message', 'Status updated successfully.');
        }
    }

    public function delete($id): void
    {
        if (! $this->hasPermission('Ticket Fee Delete')) {
            return;
        }
        TicketFeeModel::findOrFail($id)->delete();
        session()->flash('type', 'Success');
        session()->flash('message', 'Ticket Fee deleted successfully.');
    }

    public function render(): Factory|View|Application|\Illuminate\View\View
    {
        $search = $this->search;
        $status = $this->status;
        $per_page = ((int) $this->per_page) > 500 ? 500 : (int) $this->per_page;

        return view('livewire.list.ticket-fee', [
            'ticketFees' => TicketFeeModel::query()
                ->when($this->search, function ($query) use ($search) {
                    $query->where('name', 'like', '%'.$search.'%');
                })
                ->when($status !== '')
                ->where('status', $status)
                ->paginate($per_page),
        ]);
    }
}
