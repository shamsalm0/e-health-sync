<?php

namespace App\Http\Controllers\Admin\Library;

use App\Http\Controllers\Controller;
use App\Http\Requests\Library\OccupationCreateRequest;
use App\Http\Requests\Library\OccupationUpdateRequest;
use App\Models\Admin\Library\Occupation;

class OccupationController extends Controller
{
    public function __construct()
    {
        $name = 'Occupation';
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
        return view('admin.library.occupation.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['occupation'] = new Occupation;

        return view('admin.library.occupation.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OccupationCreateRequest $request)
    {
        $validated = $request->validated();

        Occupation::create($validated);

        $alert = [
            'type' => 'Success',
            'message' => 'Occupation created successfully',
        ];

        return redirect()->route('occupation.index')
            ->with($alert);
    }

    // /**
    //  * Display the specified resource.
    //  */
    public function show(string $id)
    {
        $data['occupation'] = Occupation::findOrFail($id);

        return view('admin.library.occupation.show', $data);
    }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    public function edit(string $id)
    {
        $data['occupation'] = Occupation::findOrFail($id);

        return view('admin.library.occupation.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OccupationUpdateRequest $request, string $id)
    {
        $validated = $request->validated();
        $occupation = Occupation::find($id);
        $occupation->update($validated);

        $alert = [
            'type' => 'Success',
            'message' => 'Occupation updated successfully',
        ];

        return redirect()->route('occupation.index')
            ->with($alert);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {}
}
