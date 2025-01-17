<?php

namespace App\Http\Controllers\Admin\Library;

use App\Http\Controllers\Controller;
use App\Http\Requests\Library\DesignationCreateRequest;
use App\Http\Requests\Library\DesignationUpdateRequest;
use App\Models\Admin\Library\Designation;
use App\Models\Admin\Library\Grade;

class DesignationController extends Controller
{
    public function __construct()
    {
        $name = 'Designation';
        $this->middleware("can:$name View")->only('index', 'show');
        $this->middleware("can:$name Add")->only('create', 'store');
        $this->middleware("can:$name Edit")->only('edit', 'update');
        $this->middleware("can:$name Delete")->only('destroy');
    }

    public function index()
    {
        return view('admin.library.designation.index');
    }

    public function create()
    {
        $data['designation'] = new Designation;
        $data['grades'] = Grade::selectMenu();

        return view('admin.library.designation.create', $data);
    }

    public function store(DesignationCreateRequest $request)
    {
        $validated = $request->validated();

        Designation::create($validated);

        $alert = [
            'type' => 'Success',
            'message' => 'Designation created successfully',
        ];

        return redirect()->route('designation.index')
            ->with($alert);
    }

    public function show(string $id)
    {
        $data['designation'] = Designation::findOrFail($id);

        return view('admin.library.designation.show', $data);
    }

    public function edit(string $id)
    {
        $data['designation'] = Designation::findOrFail($id);
        $data['grades'] = Grade::selectMenu();

        return view('admin.library.designation.edit', $data);
    }

    public function update(DesignationUpdateRequest $request, Designation $designation)
    {
        $request->validated();

        $designation->update($request->validated());

        $alert = [
            'type' => 'Success',
            'message' => 'Designation updated successfully',
        ];

        return redirect()->route('designation.index')
            ->with($alert);
    }

    public function destroy(string $id) {}
}
