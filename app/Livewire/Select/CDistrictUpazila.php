<?php

namespace App\Livewire\Select;

use App\Models\Admin\Library\District;
use App\Models\Admin\Library\Upazila as UpazilaModel;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
use Livewire\Component;

class CDistrictUpazila extends Component
{
    public $c_district_id;

    public $c_upazila_id;

    public function mount($c_district_id = null, $c_upazila_id = null): void
    {
        $this->c_district_id = $c_district_id;
        $this->c_upazila_id = $c_upazila_id;
    }

    public function render(): \Illuminate\Contracts\View\View|Factory|Application|View
    {
        return view('livewire.select.c-district-upazila', [
            'districts' => District::selectDistrict(),
            'upazilas' => UpazilaModel::selectMenu($this->c_district_id),
        ]);
    }
}
