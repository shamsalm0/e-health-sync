<?php

namespace App\Http\Controllers\Admin\Library;

use App\Http\Controllers\Controller;
use App\Http\Requests\Library\DepartmentCreateRequest;
use App\Http\Requests\Library\DepartmentUpdateRequest;
use App\Models\Admin\Library\Department;

class DepartmentController extends Controller
{
    public function __construct()
    {
        $name = 'Department';
        $this->middleware("can:$name View")->only('index', 'show');
        $this->middleware("can:$name Add")->only('create', 'store');
        $this->middleware("can:$name Edit")->only('edit', 'update');
        $this->middleware("can:$name Delete")->only('destroy');
    }

    public function index()
    {
        return view('admin.library.department.index');
    }

    public function create()
    {
        $data['department'] = new Department;

        return view('admin.library.department.create', $data);
    }

    public function store(DepartmentCreateRequest $request)
    {
        $validated = $request->validated();

        $validated['is_general'] = $request->has('is_general');
        $validated['is_lab'] = $request->has('is_lab');
        $validated['is_store'] = $request->has('is_store');

        Department::create($validated);

        $alert = [
            'type' => 'Success',
            'message' => 'Department created successfully',
        ];

        return redirect()->route('department.index')
            ->with($alert);
    }

    public function show(string $id)
    {
        $data['department'] = Department::findOrFail($id);

        return view('admin.library.department.show', $data);
    }

    public function edit(string $id)
    {
        $data['department'] = Department::findOrFail($id);

        return view('admin.library.department.edit', $data);
    }

    public function update(DepartmentUpdateRequest $request, string $id)
    {
        $validated = $request->validated();

        $validated['is_general'] = $request->has('is_general');
        $validated['is_lab'] = $request->has('is_lab');
        $validated['is_store'] = $request->has('is_store');

        $department = Department::findOrFail($id);
        $department->update($validated);

        $alert = [
            'type' => 'Success',
            'message' => 'Department updated successfully',
        ];

        return redirect()->route('department.index')
            ->with($alert);
    }

    public function destroy(string $id) {}
}
