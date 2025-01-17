<?php

namespace App\Http\Controllers\Admin\Library;

use App\Http\Controllers\Controller;
use App\Http\Requests\Library\SpecializationCreateRequest;
use App\Http\Requests\Library\SpecializationUpdateRequest;
use App\Models\Admin\Library\Specialization;

class SpecializationController extends Controller
{
    public function __construct()
    {
        $name = 'Specialization';
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
        return view('admin.library.specialization.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['specialization'] = new Specialization;

        return view('admin.library.specialization.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SpecializationCreateRequest $request)
    {
        $validated = $request->validated();

        Specialization::create($validated);

        $alert = [
            'type' => 'Success',
            'message' => 'Specialization created successfully',
        ];

        return redirect()->route('specialization.index')
            ->with($alert);
    }

    // /**
    //  * Display the specified resource.
    //  */
    public function show(string $id)
    {
        $data['specialization'] = Specialization::findOrFail($id);

        return view('admin.library.specialization.show', $data);
    }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    public function edit(string $id)
    {
        $data['specialization'] = Specialization::findOrFail($id);

        return view('admin.library.specialization.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SpecializationUpdateRequest $request, string $id)
    {
        $validated = $request->validated();
        $specialization = Specialization::find($id);
        $specialization->update($validated);

        $alert = [
            'type' => 'Success',
            'message' => 'Specialization updated successfully',
        ];

        return redirect()->route('specialization.index')
            ->with($alert);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {}
}
