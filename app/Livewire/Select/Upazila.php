<?php

namespace App\Livewire\Select;

use App\Models\Admin\Library\District;
use App\Models\Admin\Library\Division;
use App\Models\Admin\Library\Upazila as UpazilaModel;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
use Livewire\Component;

class Upazila extends Component
{
    public $division_id;

    public $district_id;

    public $upazila_id;

    public function mount($division_id = null, $district_id = null, $upazila_id = null): void
    {
        $this->division_id = $division_id;
        $this->district_id = $district_id;
        $this->upazila_id = $upazila_id;
    }

    public function render(): \Illuminate\Contracts\View\View|Factory|Application|View
    {
        return view('livewire.select.upazila', [
            'divisions' => Division::selectMenu(),
            'districts' => District::selectMenu($this->division_id),
            'upazilas' => UpazilaModel::selectMenu($this->district_id),
        ]);
    }
}
