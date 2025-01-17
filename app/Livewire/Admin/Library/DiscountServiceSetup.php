<?php

namespace App\Livewire\Admin\Library;

use App\Models\Admin\Library\DiscountServiceSetup as DiscountServiceSetupModel;
use App\Traits\HasPermission;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class DiscountServiceSetup extends Component
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
        $discountServiceSetup = DiscountServiceSetupModel::find($id);
        if ($discountServiceSetup) {
            $discountServiceSetup->status = ! $discountServiceSetup->status;
            $discountServiceSetup->save();
            session()->flash('type', 'success');
            session()->flash('message', 'Status updated successfully.');
        }
    }

    public function delete($id): void
    {
        if (! $this->hasPermission('Discount Service Setup Delete')) {
            return;
        }
        DiscountServiceSetupModel::findOrFail($id)->delete();
        session()->flash('type', 'Success');
        session()->flash('message', 'Discount Service Setup deleted successfully.');
    }

    public function render(): \Illuminate\Contracts\View\View|Factory|Application|View
    {
        $search = $this->search;
        $status = $this->status;

        return view('livewire.admin.library.discount-service-setup', [
            'discountServiceSetups' => DiscountServiceSetupModel::query()
                ->when($this->search, function ($query) use ($search) {
                    $query->where('service_name', 'like', '%'.$search.'%');
                })
                ->when($status !== '')
                ->where('status', $status)
                ->paginate($this->per_page),
        ]);
    }
}
