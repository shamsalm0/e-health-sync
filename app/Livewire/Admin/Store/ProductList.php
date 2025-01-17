<?php

namespace App\Livewire\Admin\Store;

use App\Models\admin\Store\StoreProduct;
use App\Traits\HasPermission;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class ProductList extends Component
{
    use HasPermission, WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $per_page = 15;

    public $search;

    public $status;

    public function updated($attr): void
    {
        $this->gotoPage(1);
        if ($attr == 'search') {
            $this->search = trim($this->search);
        }
    }

    public function toggleStatus($productId): void
    {
        if (! $this->hasPermission('Store Product Category Edit')) {
            return;
        }
        $product = StoreProduct::find($productId);
        if ($product) {
            $product->status = ! $product->status;
            $product->save();
            session()->flash('type', 'Success');
            session()->flash('message', 'Status updated successfully.');
        }
    }

    public function delete($productId): void
    {
        if (! $this->hasPermission('Store Product Delete')) {
            return;
        }
        StoreProduct::findOrFail($productId)->delete();
        session()->flash('type', 'Success');
        session()->flash('message', 'Store Product deleted successfully.');

    }

    public function render(): Factory|\Illuminate\Contracts\View\View|Application|View
    {
        $search = $this->search;
        $status = $this->status;

        return view('livewire.admin.store.product-list', [
            'products' => StoreProduct::query()
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
