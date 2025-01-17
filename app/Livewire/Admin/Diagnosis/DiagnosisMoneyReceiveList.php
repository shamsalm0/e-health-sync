<?php

namespace App\Livewire\Admin\Diagnosis;

use App\Models\Admin\Diagnosis\DiagnosisMoneyReceive;
use App\Models\Admin\Diagnosis\DiagnosisTransaction;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class DiagnosisMoneyReceiveList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $filter = true;

    public $per_page = 15;

    public $search;

    public $status = '';

    public $paid_amount;

    public $current_due;

    public $pay_date;

    public $moneyReceiveData;

    public function updated($attr): void
    {
        $this->gotoPage(1);
    }

    public function setSelectedMoneyReceive($moneyReceiveId): void
    {
        $this->moneyReceiveData = DiagnosisMoneyReceive::find($moneyReceiveId);

    }

    public function saveAsPaid(): void
    {
        $moneyReceive = $this->moneyReceiveData;
        if ($moneyReceive) {
            DB::beginTransaction();
            try {
                $moneyReceive->update([
                    'paid_amount' => $moneyReceive->paid_amount + $this->paid_amount,
                    'due_amount' => $moneyReceive->due_amount - $this->paid_amount,
                ]);

                DiagnosisTransaction::create([
                    'money_receive_id' => $this->selectedMoneyReceiveId,
                    'amount' => $this->paid_amount,
                ]);

                DB::commit();
                session()->flash('type', 'Success');
                session()->flash('message', 'Payment marked as paid, amounts updated, and transaction recorded.');

                $this->dispatch('close-modal');

            }catch (\Exception $e) {
                DB::rollBack();
                session()->flash('type', 'Error');
                session()->flash('message', 'Something went wrong.');
            }


        }
    }

    public function toggleStatus($id): void
    {
        $moneyReceive = DiagnosisMoneyReceive::find($id);
        if ($moneyReceive) {
            $moneyReceive->status = ! $moneyReceive->status;
            $moneyReceive->save();
            session()->flash('type', 'Success');
            session()->flash('message', 'Status updated successfully.');
        }
    }

    public function delete($id): void
    {
        DiagnosisMoneyReceive::findOrFail($id)->delete();
        session()->flash('type', 'Success');
        session()->flash('message', 'Diagnosis Money Receive deleted successfully.');
    }

    public function render(): Factory|View|Application|\Illuminate\View\View
    {
        $search = $this->search;
        $status = $this->status;

        return view('livewire.admin.diagnosis.diagnosis-money-receive-list', [
            'moneyReceives' => DiagnosisMoneyReceive::with('gender', 'reference')
                ->when($this->search, function ($query) use ($search) {
                    $query->where('name', 'like', '%'.$search.'%');
                })
                ->when($status !== '')
                ->where('status', $status)
                ->paginate($this->per_page),
        ]);
    }
}
