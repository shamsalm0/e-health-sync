<?php

namespace App\Livewire\Admin\Store;

use App\Models\admin\Store\StoreProductCategory;
use App\Traits\HasPermission;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class ProductCategoryList extends Component
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

    public function toggleStatus($categoryId): void
    {
        if (! $this->hasPermission('Store Product Category Edit')) {
            return;
        }
        $category = StoreProductCategory::find($categoryId);
        if ($category) {
            $category->status = ! $category->status;
            $category->save();
            session()->flash('type', 'Success');
            session()->flash('message', 'Status updated successfully.');
        }
    }

    public function delete($categoryId): void
    {
        if (! $this->hasPermission('Store Product Category Delete')) {
            return;
        }
        StoreProductCategory::findOrFail($categoryId)->delete();
        session()->flash('type', 'Success');
        session()->flash('message', 'Product Category deleted successfully.');

    }

    public function render(): Factory|Application|\Illuminate\Contracts\View\View|View
    {
        $search = $this->search;
        $status = $this->status;

        return view('livewire.admin.store.product-category-list', [
            'productCategories' => StoreProductCategory::query()
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
