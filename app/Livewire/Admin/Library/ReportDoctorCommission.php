<?php

namespace App\Livewire\Admin\Library;

use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
use Livewire\Component;

class ReportDoctorCommission extends Component
{
    public function render(): \Illuminate\Contracts\View\View|Factory|Application|View
    {
        return view('livewire.admin.library.report-doctor-commission');
    }
}
