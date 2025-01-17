<?php

namespace App\Http\Controllers\Admin\Diagnosis;

use App\Http\Controllers\Controller;
use App\Http\Requests\Diagnosis\MachineCreateRequest;
use App\Http\Requests\Diagnosis\MachineUpdateRequest;
use App\Models\Admin\Diagnosis\Machine;

class MachineController extends Controller
{
    public function __construct()
    {
        $name = 'Machine';
        $this->middleware("can:$name View")->only('index', 'show');
        $this->middleware("can:$name Add")->only('create', 'store');
        $this->middleware("can:$name Edit")->only('edit', 'update');
        $this->middleware("can:$name Delete")->only('destroy');
    }

    public function index()
    {
        return view('admin.diagnosis.machine.index');
    }

    public function create()
    {
        $data['machine'] = new Machine;

        return view('admin.diagnosis.machine.create', $data);
    }

    public function store(MachineCreateRequest $request)
    {
        $validated = $request->validated();

        Machine::create($validated);

        $alert = [
            'type' => 'Success',
            'message' => 'Machine created successfully',
        ];

        return redirect()->route('machine.index')
            ->with($alert);
    }

    public function show(string $id)
    {
        $data['machine'] = Machine::findOrFail($id);

        return view('admin.diagnosis.machine.show', $data);
    }

    public function edit(string $id)
    {
        $data['machine'] = Machine::findOrFail($id);

        return view('admin.diagnosis.machine.edit', $data);
    }

    public function update(MachineUpdateRequest $request, Machine $machine)
    {
        $request->validated();

        $machine->update($request->validated());

        $alert = [
            'type' => 'Success',
            'message' => 'Machine updated successfully',
        ];

        return redirect()->route('machine.index')
            ->with($alert);
    }

    public function destroy(string $id) {}
}
