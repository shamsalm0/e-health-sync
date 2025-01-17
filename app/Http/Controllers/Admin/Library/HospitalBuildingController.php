<?php

namespace App\Http\Controllers\Admin\Library;

use App\Http\Controllers\Controller;
use App\Http\Requests\Library\HospitalBuildingCreateRequest;
use App\Http\Requests\Library\HospitalBuildingUpdateRequest;
use App\Models\Admin\Library\HospitalBranch;
use App\Models\Admin\Library\HospitalBuilding;

class HospitalBuildingController extends Controller
{
    public function __construct()
    {
        $name = 'Hospital Building';
        $this->middleware("can:$name View")->only('index', 'show');
        $this->middleware("can:$name Add")->only('create', 'store');
        $this->middleware("can:$name Edit")->only('edit', 'update');
        $this->middleware("can:$name Delete")->only('destroy');
    }

    public function index()
    {
        return view('admin.library.hospital-building.index');
    }

    public function create()
    {
        $data['building'] = new HospitalBuilding;
        $data['branches'] = HospitalBranch::selectMenu();

        return view('admin.library.hospital-building.create', $data);
    }

    public function store(HospitalBuildingCreateRequest $request)
    {
        $validated = $request->validated();

        HospitalBuilding::create($validated);

        $alert = [
            'type' => 'Success',
            'message' => 'Building created successfully',
        ];

        return redirect()->route('hospital-building.index')
            ->with($alert);
    }

    public function show(string $id)
    {
        $data['building'] = HospitalBuilding::findOrFail($id);

        return view('admin.library.hospital-building.show', $data);
    }

    public function edit(string $id)
    {
        $data['building'] = HospitalBuilding::findOrFail($id);
        $data['branches'] = HospitalBranch::selectMenu();

        return view('admin.library.hospital-building.edit', $data);
    }

    public function update(HospitalBuildingUpdateRequest $request, string $id)
    {
        $request->validated();

        $building = HospitalBuilding::findOrFail($id);
        $building->update($request->validated());

        $alert = [
            'type' => 'Success',
            'message' => 'building updated successfully',
        ];

        return redirect()->route('hospital-building.index')
            ->with($alert);
    }

    public function destroy(string $id) {}
}
