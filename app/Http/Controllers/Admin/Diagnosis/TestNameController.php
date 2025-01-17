<?php

namespace App\Http\Controllers\Admin\Diagnosis;

use App\Http\Controllers\Controller;
use App\Http\Requests\Diagnosis\TestNameCreateRequest;
use App\Http\Requests\Diagnosis\TestNameUpdateRequest;
use App\Models\Admin\Diagnosis\ReportType;
use App\Models\Admin\Diagnosis\TestGroup;
use App\Models\Admin\Diagnosis\TestName;
use App\Models\Admin\Library\Department;
use App\Models\Admin\Library\HospitalRoom;
use App\Models\Admin\Library\Uom;

class TestNameController extends Controller
{
    public function __construct()
    {
        $name = 'Test Name';
        $this->middleware("can:$name View")->only('index', 'show');
        $this->middleware("can:$name Add")->only('create', 'store');
        $this->middleware("can:$name Edit")->only('edit', 'update');
        $this->middleware("can:$name Delete")->only('destroy');
    }

    public function index()
    {
        return view('admin.diagnosis.test-name.index');
    }

    public function create()
    {
        $data = $this->select();
        $data['test_name'] = new TestName;

        return view('admin.diagnosis.test-name.create', $data);
    }

    public function store(TestNameCreateRequest $request)
    {
        $validated = $request->validated();
        $validated = $this->getValidated($request, $validated);
        TestName::create($validated);

        $alert = [
            'type' => 'Success',
            'message' => 'Room type created successfully',
        ];

        return redirect()->route('test-name.index')
            ->with($alert);
    }

    public function show(string $id)
    {
        $data['testName'] = TestName::findOrFail($id);

        return view('admin.diagnosis.test-name.show', $data);
    }

    public function edit(string $id)
    {
        $data = $this->select();
        $data['test_name'] = TestName::findOrFail($id);

        return view('admin.diagnosis.test-name.edit', $data);
    }

    public function update(TestNameUpdateRequest $request, $id)
    {
        $validated = $request->validated();
        $validated = $this->getValidated($request, $validated);

        $testName = TestName::findOrFail($id);
        $testName->update($validated);

        $alert = [
            'type' => 'Success',
            'message' => 'Test Name updated successfully',
        ];

        return redirect()->route('test-name.index')
            ->with($alert);
    }

    public function destroy(string $id) {}

    public function getValidated($request, mixed $validated): mixed
    {
        $validated['is_sample'] = $request->has('is_sample');
        $validated['is_level_print'] = $request->has('is_level_print');
        $validated['is_ticket_show'] = $request->has('is_ticket_show');
        $validated['is_discount'] = $request->has('is_discount');
        $validated['is_attribute_group'] = $request->has('is_attribute_group');
        $validated['is_title_show'] = $request->has('is_title_show');
        $validated['is_unit_show'] = $request->has('is_unit_show');
        $validated['is_normal_unit'] = $request->has('is_normal_unit');
        $validated['is_normal_no_unit'] = $request->has('is_normal_no_unit');
        $validated['is_dialysis'] = $request->has('is_dialysis');
        $validated['is_physiotherapy'] = $request->has('is_physiotherapy');
        $validated['is_test'] = $request->has('is_test');

        return $validated;
    }

    private function select(): array
    {
        $data['groups'] = TestGroup::selectMenu();
        $data['departments'] = Department::selectMenu();
        $data['lab_rooms'] = HospitalRoom::selectMenu();
        $data['sample_rooms'] = HospitalRoom::selectMenu();
        $data['report_types'] = ReportType::selectMenu();
        $data['uoms'] = Uom::selectMenu();

        return $data;
    }
}
