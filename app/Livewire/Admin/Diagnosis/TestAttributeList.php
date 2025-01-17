<?php

namespace App\Livewire\Admin\Diagnosis;

use App\Models\admin\Diagnosis\TestAttribute;
use App\Traits\HasPermission;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class TestAttributeList extends Component
{
    use HasPermission, WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $per_page = 15;

    public $filter;

    public $search;

    public $status;

    public function updated($attr): void
    {
        $this->gotoPage(1);
    }

    public function toggleStatus($testAttributeId): void
    {
        if (! $this->hasPermission('Test Attribute Edit')) {
            return;
        }
        $attribute = TestAttribute::findOrFail($testAttributeId);
        if ($attribute) {
            $attribute->status = ! $attribute->status;
            $attribute->save();
            session()->flash('type', 'Success');
            session()->flash('message', 'Status updated successfully.');
        }
    }

    public function delete($testAttributeId): void
    {
        if (! $this->hasPermission('Test Attribute Delete')) {
            return;
        }
        TestAttribute::findOrFail($testAttributeId)->delete();
        session()->flash('type', 'Success');
        session()->flash('message', 'Test Attribute deleted successfully.');
    }

    public function render(): \Illuminate\Contracts\View\View|Factory|Application|View
    {
        $search = $this->search;
        $status = $this->status;

        return view('livewire.admin.diagnosis.test-attribute-list', [
            'test_attributes' => TestAttribute::query()
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
