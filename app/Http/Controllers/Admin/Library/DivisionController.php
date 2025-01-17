<?php

namespace App\Http\Controllers\Admin\Library;

use App\Http\Controllers\Controller;
use App\Http\Requests\Library\DivisonCreateRequest;
use App\Http\Requests\Library\DivisonUpdateRequest;
use App\Models\Admin\Library\Division;

class DivisionController extends Controller
{
    public function __construct()
    {
        $name = 'Division';
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
        return view('admin.library.division.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['division'] = new Division;

        return view('admin.library.division.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DivisonCreateRequest $request)
    {
        $validated = $request->validated();

        Division::create($validated);

        $alert = [
            'type' => 'Success',
            'message' => 'Division created successfully',
        ];

        return redirect()->route('division.index')
            ->with($alert);
    }

    /**
     * Display the specified resource.
     */
    public function show(Division $division)
    {
        return view('admin.library.division.show', compact('division'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['division'] = Division::findOrFail($id);

        return view('admin.library.division.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DivisonUpdateRequest $request, string $id)
    {
        $validated = $request->validated();
        $division = Division::find($id);
        $division->update($validated);

        $alert = [
            'type' => 'Success',
            'message' => 'Division updated successfully',
        ];

        return redirect()->route('division.index')
            ->with($alert);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
