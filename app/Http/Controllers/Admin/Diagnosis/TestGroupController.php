<?php

namespace App\Http\Controllers\Admin\Diagnosis;

use App\Http\Controllers\Controller;
use App\Http\Requests\Diagnosis\TestGroupCreateRequest;
use App\Http\Requests\Diagnosis\TestGroupUpdateRequest;
use App\Models\Admin\Diagnosis\TestGroup;

class TestGroupController extends Controller
{
    public function __construct()
    {
        $name = 'Test Group';
        $this->middleware("can:$name View")->only('index', 'show');
        $this->middleware("can:$name Add")->only('create', 'store');
        $this->middleware("can:$name Edit")->only('edit', 'update');
        $this->middleware("can:$name Delete")->only('destroy');
    }

    public function index()
    {
        return view('admin.diagnosis.test-group.index');
    }

    public function create()
    {
        $data['test_group'] = new TestGroup;

        return view('admin.diagnosis.test-group.create', $data);
    }

    public function store(TestGroupCreateRequest $request)
    {
        $validated = $request->validated();

        TestGroup::create($validated);

        $alert = [
            'type' => 'Success',
            'message' => 'Test Group created successfully',
        ];

        return redirect()->route('test-group.index')
            ->with($alert);
    }

    public function show(string $id)
    {
        $data['testGroup'] = TestGroup::findOrFail($id);

        return view('admin.diagnosis.test-group.show', $data);
    }

    public function edit(string $id)
    {
        $data['test_group'] = TestGroup::findOrFail($id);

        return view('admin.diagnosis.test-group.edit', $data);
    }

    public function update(TestGroupUpdateRequest $request, TestGroup $test_group)
    {
        $validated = $request->validated();

        $test_group->update($validated);

        $alert = [
            'type' => 'Success',
            'message' => 'Test Group updated successfully',
        ];

        return redirect()->route('test-group.index')
            ->with($alert);
    }

    public function destroy(string $id) {}
}
