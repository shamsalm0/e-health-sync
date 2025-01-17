<?php

namespace App\Http\Controllers\Admin\Library;

use App\Http\Controllers\Controller;
use App\Http\Requests\Library\GradeCreateRequest;
use App\Http\Requests\Library\GradeUpdateRequest;
use App\Models\Admin\Library\Grade;

class GradeController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Grade View')->only('index', 'show');
        $this->middleware('can:Grade Add')->only('create', 'store');
        $this->middleware('can:Grade Edit')->only('edit', 'update');
        $this->middleware('can:Grade Delete')->only('destroy');
    }

    // public function index()
    // {
    //     return view('admin.library.grades.index');
    // }

    // public function create()
    // {
    //     $data['grade'] = new Grade;

    //     return view('admin.library.grades.create', $data);
    // }

    // public function store(GradeCreateRequest $request)
    // {
    //     $validated = $request->validated();

    //     Grade::create($validated);

    //     $alert = [
    //         'type' => 'Success',
    //         'message' => 'Grade created successfully',
    //     ];

    //     return redirect()->route('grades.index')
    //         ->with($alert);
    // }

    // public function show(string $id)
    // {
    //     $data['grade'] = Grade::findOrFail($id);

    //     return view('admin.library.grades.show', $data);
    // }

    // public function edit(string $id)
    // {
    //     $data['grade'] = Grade::findOrFail($id);

    //     return view('admin.library.grades.edit', $data);
    // }

    // public function update(GradeUpdateRequest $request, Grade $grade)
    // {
    //     $request->validated();

    //     $grade->update($request->validated());

    //     $alert = [
    //         'type' => 'Success',
    //         'message' => 'Grade updated successfully',
    //     ];

    //     return redirect()->route('grades.index')
    //         ->with($alert);
    // }

    // public function destroy(string $id) {}

    public function index()
    {
        return view('admin.library.grades.index');
    }

    public function create()
    {
        $data['grade'] = new Grade;

        return view('admin.library.grades.create', $data);
    }

    public function store(GradeCreateRequest $request)
    {
        $validated = $request->validated();
        Grade::create($validated);

        $alert = ['type' => 'success', 'message' => 'Grade created successfully'];

        return redirect()->route('grades.index')->with($alert);
    }

    public function show(Grade $grade)
    {
        $data['grade'] = $grade;

        return view('admin.library.grades.show', $data);
    }

    public function edit(Grade $grade)
    {
        $data['grade'] = $grade;

        return view('admin.library.grades.edit', $data);
    }

    public function update(GradeUpdateRequest $request, Grade $grade)
    {
        $validated = $request->validated();
        $grade->update($validated);

        $alert = ['type' => 'success', 'message' => 'Grade updated successfully'];

        return redirect()->route('grades.index')->with($alert);
    }
}
