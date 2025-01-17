<?php

namespace App\Http\Controllers\Admin\Diagnosis;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TestMachineCreateRequest;
use App\Models\Admin\Diagnosis\Machine;
use App\Models\Admin\Diagnosis\TestMachine;
use App\Models\Admin\Diagnosis\TestName;

class TestMachineController extends Controller
{
    public function __construct()
    {
        $name = 'Test Machine';
        $this->middleware("can:$name View")->only('index', 'show');
        $this->middleware("can:$name Add")->only('create', 'store');
        $this->middleware("can:$name Edit")->only('edit', 'update');
        $this->middleware("can:$name Delete")->only('destroy');
    }

    public function index()
    {
        return view('admin.diagnosis.test-machine.index');
    }

    public function create()
    {
        $data['testMachine'] = new TestMachine;
        $data['testNames'] = TestName::selectMenu();
        $data['machines'] = Machine::selectMenu();
        $data['statuses'] = $this->common_status;

        return view('admin.diagnosis.test-machine.create', $data);
    }

    public function store(TestMachineCreateRequest $request)
    {
        TestMachine::create($request->validated());

        $alert = [
            'type' => 'success',
            'message' => 'Test Machine created successfully.',
        ];

        return redirect()->route('test-machine.index')
            ->with($alert);
    }

    public function show(TestMachine $testMachine)
    {
        return view('admin.diagnosis.test-machine.show', compact('testMachine'));
    }

    public function edit(TestMachine $testMachine)
    {
        $data['testMachine'] = $testMachine;
        $data['testNames'] = TestName::selectMenu();
        $data['machines'] = Machine::selectMenu();
        $data['statuses'] = $this->common_status;

        return view('admin.diagnosis.test-machine.edit', $data);
    }

    public function update(TestMachineCreateRequest $request, TestMachine $testMachine)
    {
        $testMachine->update($request->validated());

        $alert = [
            'type' => 'success',
            'message' => 'Test Machine updated successfully.',
        ];

        return redirect()->route('test-machine.index')
            ->with($alert);
    }

    public function destroy($id)
    {
        try {
            $testMachine = TestMachine::findOrFail($id);
            $testMachine->delete();

            $alert = [
                'type' => 'success',
                'message' => 'Test Machine deleted successfully.',
            ];

            return redirect()->route('test-machine.index')
                ->with($alert);
        } catch (\Exception $e) {
            $alert = [
                'type' => 'warning',
                'message' => $$e->getMessage(),
            ];

            return redirect()->route('test-machine.index')
                ->with($alert);
        }
    }
}
