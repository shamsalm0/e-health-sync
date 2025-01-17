<?php

namespace App\Http\Controllers\Admin\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\Employee\EmployeeTypeCreateRequest;
use App\Models\Admin\Employee\EmployeeType;

class EmployeeTypeController extends Controller
{
    public function __construct()
    {
        $name = 'Employee Type';
        $this->middleware("can:$name View")->only('index', 'show');
        $this->middleware("can:$name Add")->only('create', 'store');
        $this->middleware("can:$name Edit")->only('edit', 'update');
        $this->middleware("can:$name Delete")->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.library.employee-type.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['employeeType'] = new EmployeeType;

        return view('admin.library.employee-type.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeTypeCreateRequest $request)
    {
        $validated = $request->validated();

        EmployeeType::create($validated);

        $alert = [
            'type' => 'Success',
            'message' => 'Employee type created successfully',
        ];

        return redirect()->route('employee-type.index')
            ->with($alert);
    }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(string $id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    public function edit(string $id)
    {
        $data['employeeType'] = EmployeeType::findOrFail($id);

        return view('admin.library.employee-type.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeTypeCreateRequest $request, string $id)
    {
        $validated = $request->validated();
        $employeeType = EmployeeType::findOrfail($id);
        $employeeType->update($validated);

        $alert = [
            'type' => 'Success',
            'message' => 'Employee type updated successfully',
        ];

        return redirect()->route('employee-type.index')
            ->with($alert);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {}
}
