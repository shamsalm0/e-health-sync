<?php

namespace App\Livewire\Select;

use App\Models\Admin\Library\District;
use App\Models\Admin\Library\Upazila as UpazilaModel;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
use Livewire\Component;

class PDistrictUpazila extends Component
{
    public $p_district_id;

    public $p_upazila_id;

    public function mount($p_district_id = null, $p_upazila_id = null): void
    {
        $this->p_district_id = $p_district_id;
        $this->p_upazila_id = $p_upazila_id;
    }

    public function render(): \Illuminate\Contracts\View\View|Factory|Application|View
    {
        return view('livewire.select.p-district-upazila', [
            'districts' => District::selectDistrict(),
            'upazilas' => UpazilaModel::selectMenu($this->p_district_id),
        ]);
    }
}
