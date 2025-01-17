<?php

namespace App\Livewire\Admin\Library;

use App\Models\Admin\Library\OtherService as OtherServiceModel;
use App\Traits\HasPermission;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class OtherService extends Component
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
        $otherService = OtherServiceModel::find($id);
        if ($otherService) {
            $otherService->status = ! $otherService->status;
            $otherService->save();
            session()->flash('type', 'success');
            session()->flash('message', 'Status updated successfully.');
        }
    }

    public function delete($id): void
    {
        if (! $this->hasPermission('Other Service Delete')) {
            return;
        }
        OtherServiceModel::findOrFail($id)->delete();
        session()->flash('type', 'Success');
        session()->flash('message', 'Other Service deleted successfully.');
    }

    public function render(): \Illuminate\Contracts\View\View|Factory|Application|View
    {
        $search = $this->search;
        $status = $this->status;

        return view('livewire.admin.library.other-service', [
            'otherServices' => OtherServiceModel::query()
                ->when($this->search, function ($query) use ($search) {
                    $query->where('name', 'like', '%'.$search.'%');
                })
                ->when($status !== '')
                ->where('status', $status)
                ->paginate($this->per_page),
        ]);
    }
}
