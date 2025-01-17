<?php

namespace App\Http\Controllers\Admin\Library;

use App\Http\Controllers\Controller;
use App\Http\Requests\Library\HospitalFloorCreateRequest;
use App\Http\Requests\Library\HospitalFloorUpdateRequest;
use App\Models\Admin\Library\HospitalBranch;
use App\Models\Admin\Library\HospitalBuilding;
use App\Models\Admin\Library\HospitalFloor;

class HospitalFloorController extends Controller
{
    public function __construct()
    {
        $name = 'Hospital Floor';
        $this->middleware("can:$name View")->only('index', 'show');
        $this->middleware("can:$name Add")->only('create', 'store');
        $this->middleware("can:$name Edit")->only('edit', 'update');
        $this->middleware("can:$name Delete")->only('destroy');
    }

    public function index()
    {
        return view('admin.library.hospital-floor.index');
    }

    public function create()
    {
        $data['hospital_floor'] = new HospitalFloor;
        $data['branches'] = HospitalBranch::selectMenu();
        $data['buildings'] = HospitalBuilding::selectMenu();

        return view('admin.library.hospital-floor.create', $data);
    }

    public function store(HospitalFloorCreateRequest $request)
    {
        $validated = $request->validated();

        HospitalFloor::create($validated);

        $alert = [
            'type' => 'Success',
            'message' => 'Hospital floor created successfully',
        ];

        return redirect()->route('hospital-floor.index')
            ->with($alert);
    }

    public function show(string $id)
    {
        $data['hospital_floor'] = HospitalFloor::findOrFail($id);

        return view('admin.library.hospital-floor.show', $data);
    }

    public function edit(string $id)
    {
        $data['hospital_floor'] = HospitalFloor::findOrFail($id);
        $data['branches'] = HospitalBranch::selectMenu();
        $data['buildings'] = HospitalBuilding::selectMenu();

        return view('admin.library.hospital-floor.edit', $data);
    }

    public function update(HospitalFloorUpdateRequest $request, string $id)
    {
        $request->validated();

        $floor = HospitalFloor::findOrFail($id);
        $floor->update($request->validated());

        $alert = [
            'type' => 'Success',
            'message' => 'Hospital floor updated successfully',
        ];

        return redirect()->route('hospital-floor.index')
            ->with($alert);
    }

    public function destroy(string $id) {}
}
