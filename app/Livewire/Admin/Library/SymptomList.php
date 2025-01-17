<?php

namespace App\Livewire\Admin\Library;

use App\Models\Admin\Library\Symptom;
use App\Traits\HasPermission;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class SymptomList extends Component
{
    use HasPermission, WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $per_page = 15;

    public $filter;

    public $search;

    public $status;

    public function toggleStatus($symptomId): void
    {
        if (! $this->hasPermission('Symptom Edit')) {
            return;
        }
        $symptom = Symptom::find($symptomId);
        if ($symptom) {
            $symptom->status = ! $symptom->status;
            $symptom->save();
        }
    }

    public function delete($symptomId): void
    {
        if (! $this->hasPermission('Symptom Delete')) {
            return;
        }
        Symptom::findOrFail($symptomId)->delete();
        session()->flash('type', 'Success');
        session()->flash('message', 'Symptom deleted successfully.');

    }

    public function render(): \Illuminate\Contracts\View\View|Factory|Application|View
    {
        $search = $this->search;
        $status = $this->status;

        return view('livewire.admin.library.symptom-list', [
            'symptoms' => Symptom::query()
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
