<?php

namespace App\Livewire\Admin\Diagnosis;

use App\Models\Admin\Diagnosis\DiagnosisMoneyReceive;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;
use Livewire\WithPagination;

class DiagnosisBarcodeList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $filter = true;

    public $per_page = 15;

    public $search;

    public $status = '';

    public $from;

    public $to;

    public function updated($attr): void
    {
        $this->gotoPage(1);
    }

    public function delete($id): void
    {
        DiagnosisMoneyReceive::findOrFail($id)->delete();
        session()->flash('type', 'Success');
        session()->flash('message', 'Diagnosis Money Receive deleted successfully.');
    }

    public function render(): Factory|View|Application|\Illuminate\View\View
    {
        $query = DiagnosisMoneyReceive::query();

        // Apply search filter if needed
        if ($this->search) {
            $query->where('name', 'like', '%'.$this->search.'%');
        }

        // Apply date filter if both $from and $to are provided
        if ($this->from && $this->to) {
            $query->whereBetween('created_at', [$this->from, $this->to]);
        }

        // Apply status filter if not empty
        if ($this->status !== '') {
            $query->where('status', $this->status);
        }

        return view('livewire.admin.diagnosis.diagnosis-barcode-list', [
            'moneyReceives' => $query->paginate($this->per_page),
        ]);
    }
}
