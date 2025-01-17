<?php

namespace App\Livewire\Admin\Library;

use App\Models\Admin\Library\Occupation;
use App\Traits\HasPermission;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class OccupationList extends Component
{
    use HasPermission, WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $per_page = 15;

    public $filter;

    public $search;

    public $status;

    public function toggleStatus($occupationId): void
    {
        if (! $this->hasPermission('Occupation Edit')) {
            return;
        }
        $occupation = Occupation::find($occupationId);
        if ($occupation) {
            $occupation->status = ! $occupation->status;
            $occupation->save();
        }
    }

    public function delete($occupationId): void
    {
        if (! $this->hasPermission('Occupation Delete')) {
            return;
        }
        Occupation::findOrFail($occupationId)->delete();
        session()->flash('type', 'Success');
        session()->flash('message', 'Occupation deleted successfully.');

    }

    public function render(): \Illuminate\Contracts\View\View|Factory|Application|View
    {
        $search = $this->search;
        $status = $this->status;

        return view('livewire.admin.library.occupation-list', [
            'occupations' => Occupation::query()
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
