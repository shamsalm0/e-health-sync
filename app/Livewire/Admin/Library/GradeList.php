<?php

namespace App\Livewire\Admin\Library;

use App\Models\Admin\Library\Grade;
use App\Traits\HasPermission;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class GradeList extends Component
{
    use HasPermission, WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $per_page = 15;

    public $filter;

    public $search;

    public $status;

    public function toggleStatus($gradeId): void
    {
        if (! $this->hasPermission('Grade Edit')) {
            return;
        }
        $grade = Grade::find($gradeId);
        if ($grade) {
            $grade->status = ! $grade->status;
            $grade->save();
            session()->flash('type', 'Success');
            session()->flash('message', 'Status updated successfully.');
        }
    }

    public function delete($gradeId): void
    {
        if (! $this->hasPermission('Grade Delete')) {
            return;
        }
        Grade::findOrFail($gradeId)->delete();
        session()->flash('type', 'Success');
        session()->flash('message', 'Grade deleted successfully.');
    }

    public function render(): \Illuminate\Contracts\View\View|Factory|Application|View
    {
        $search = $this->search;
        $status = $this->status;

        return view('livewire.admin.library.grade-list', [
            'grades' => Grade::query()
                ->when($this->search, function ($query) use ($search) {
                    $query->where('name', 'like', '%'.$search.'%');
                    $query->orWhere('description', 'like', '%'.$search.'%');
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
