<?php

namespace App\Livewire\List;

use App\Models\Admin\Library\BloodGroup as BloodGroupModel;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class BloodGroup extends Component
{
    use WithPagination;

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
        $bloodGroup = BloodGroupModel::find($id);
        if ($bloodGroup) {
            $bloodGroup->status = ! $bloodGroup->status;
            $bloodGroup->save();
            session()->flash('type', 'Success');
            session()->flash('message', 'Status updated successfully.');
        }
    }

    public function delete($id): void
    {
        BloodGroupModel::findOrFail($id)->delete();
        session()->flash('type', 'Success');
        session()->flash('message', 'Blood Group deleted successfully.');
    }

    public function render(): Factory|\Illuminate\Contracts\View\View|Application|View
    {
        $search = $this->search;
        $status = $this->status;

        return view('livewire.list.blood-group', [
            'bloodGroups' => BloodGroupModel::query()
                ->when($this->search, function ($query) use ($search) {
                    $query->where('name', 'like', '%'.$search.'%');
                })
                ->when($status !== '')
                ->where('status', $status)
                ->paginate($this->per_page),
        ]);
    }
}
