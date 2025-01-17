<?php

namespace App\Http\Controllers\Admin\Diagnosis;

use App\Http\Controllers\Controller;
use App\Http\Requests\Diagnosis\TestAttributeCreateRequest;
use App\Http\Requests\Diagnosis\TestAttributeUpdateRequest;
use App\Models\Admin\Diagnosis\TestAttribute;

class TestAttributeController extends Controller
{
    public function __construct()
    {
        $name = 'Test Attribute';
        $this->middleware("can:$name View")->only('index', 'show');
        $this->middleware("can:$name Add")->only('create', 'store');
        $this->middleware("can:$name Edit")->only('edit', 'update');
        $this->middleware("can:$name Delete")->only('destroy');
    }

    public function index()
    {
        return view('admin.diagnosis.test-attribute.index');
    }

    public function create()
    {
        $data['test_attribute'] = new TestAttribute;

        return view('admin.diagnosis.test-attribute.create', $data);
    }

    public function store(TestAttributeCreateRequest $request)
    {
        $validated = $request->validated();

        Testattribute::create($validated);

        $alert = [
            'type' => 'Success',
            'message' => 'Test attribute created successfully',
        ];

        return redirect()->route('test-attribute.index')
            ->with($alert);
    }

    public function show(string $id)
    {
        $data['testAttribute'] = TestAttribute::findOrFail($id);

        return view('admin.diagnosis.test-attribute.show', $data);
    }

    public function edit(string $id)
    {
        $data['test_attribute'] = TestAttribute::findOrFail($id);

        return view('admin.diagnosis.test-attribute.edit', $data);
    }

    public function update(TestAttributeUpdateRequest $request, TestAttribute $test_attribute)
    {
        $validated = $request->validated();

        $test_attribute->update($validated);

        $alert = [
            'type' => 'Success',
            'message' => 'Test Attribute updated successfully',
        ];

        return redirect()->route('test-attribute.index')
            ->with($alert);
    }

    public function destroy(string $id) {}
}
