<?php

namespace App\Livewire\Select;

use App\Models\Admin\Library\District;
use App\Models\Admin\Library\Division;
use App\Models\Admin\Library\Upazila as UpazilaModel;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
use Livewire\Component;

class PUpazila extends Component
{
    public $p_division_id;

    public $p_district_id;

    public $p_upazila_id;

    public function mount($p_division_id = null, $p_district_id = null, $p_upazila_id = null): void
    {
        $this->p_division_id = $p_division_id;
        $this->p_district_id = $p_district_id;
        $this->p_upazila_id = $p_upazila_id;
    }

    public function render(): \Illuminate\Contracts\View\View|Factory|Application|View
    {
        return view('livewire.select.p-upazila', [
            'divisions' => Division::selectMenu(),
            'districts' => District::selectMenu($this->p_division_id),
            'upazilas' => UpazilaModel::selectMenu($this->p_district_id),
        ]);
    }
}
