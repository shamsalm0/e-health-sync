<?php

namespace App\Http\Controllers\Admin\Library;

use App\Http\Controllers\Controller;
use App\Http\Requests\Library\HospitalCreateRequest;
use App\Http\Requests\Library\HospitalUpdateRequest;
use App\Models\Admin\Library\Hospital;

class HospitalController extends Controller
{
    public function __construct()
    {
        $name = 'Hospital';
        $this->middleware("can:$name View")->only('index', 'show');
        $this->middleware("can:$name Add")->only('create', 'store');
        $this->middleware("can:$name Edit")->only('edit', 'update');
        $this->middleware("can:$name Delete")->only('destroy');
    }

    public function index()
    {
        return view('admin.library.hospital.index');
    }

    public function create()
    {
        $data['hospital'] = new Hospital;

        return view('admin.library.hospital.create', $data);
    }

    public function store(HospitalCreateRequest $request)
    {
        $validated = $request->validated();

        Hospital::create($validated);

        $alert = [
            'type' => 'Success',
            'message' => 'Hospital created successfully',
        ];

        return redirect()->route('hospital.index')
            ->with($alert);
    }

    public function show(string $id)
    {
        $data['hospital'] = Hospital::findOrFail($id);

        return view('admin.library.hospital.show', $data);
    }

    public function edit(string $id)
    {
        $data['hospital'] = Hospital::findOrFail($id);

        return view('admin.library.hospital.edit', $data);
    }

    public function update(HospitalUpdateRequest $request, Hospital $hospital)
    {
        $request->validated();

        $hospital->update($request->validated());

        $alert = [
            'type' => 'Success',
            'message' => 'Hospital updated successfully',
        ];

        return redirect()->route('hospital.index')
            ->with($alert);
    }

    public function destroy(string $id) {}
}
