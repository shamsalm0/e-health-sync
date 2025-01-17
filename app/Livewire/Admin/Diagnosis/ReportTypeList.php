<?php

namespace App\Livewire\Admin\Diagnosis;

use App\Models\admin\Diagnosis\ReportType;
use App\Traits\HasPermission;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class ReportTypeList extends Component
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

    public function toggleStatus($id): void
    {
        if (! $this->hasPermission('Report Type Edit')) {
            return;
        }
        $reportType = ReportType::findOrFail($id);
        if ($reportType) {
            $reportType->status = ! $reportType->status;
            $reportType->save();
            session()->flash('type', 'Success');
            session()->flash('message', 'Status updated successfully.');
        }
    }

    public function delete($id): void
    {
        if (! $this->hasPermission('Report Type Delete')) {
            return;
        }
        ReportType::findOrFail($id)->delete();
        session()->flash('type', 'Success');
        session()->flash('message', 'Report Type deleted successfully.');

    }

    public function render(): \Illuminate\Contracts\View\View|Factory|Application|View
    {
        $search = $this->search;
        $status = $this->status;

        return view('livewire.admin.diagnosis.report-type-list', [
            'report_types' => ReportType::query()
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
