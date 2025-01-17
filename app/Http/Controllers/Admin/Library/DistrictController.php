<?php

namespace App\Http\Controllers\Admin\Library;

use App\Http\Controllers\Controller;
use App\Http\Requests\Library\DistrictCreateRequest;
use App\Http\Requests\Library\DistrictUpdateRequest;
use App\Models\Admin\Library\District;
use App\Models\Admin\Library\Division;

class DistrictController extends Controller
{
    public function __construct()
    {
        $name = 'District';
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
        return view('admin.library.district.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['district'] = new District;
        $data['divisions'] = Division::selectMenu();

        return view('admin.library.district.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DistrictCreateRequest $request)
    {
        $validated = $request->validated();

        District::create($validated);

        $alert = [
            'type' => 'Success',
            'message' => 'District created successfully',
        ];

        return redirect()->route('district.index')
            ->with($alert);
    }

    /**
     * Display the specified resource.
     */
    public function show(District $district)
    {
        return view('admin.library.district.show', compact('district'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['district'] = District::findOrFail($id);
        $data['divisions'] = Division::selectMenu();

        return view('admin.library.district.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DistrictUpdateRequest $request, string $id)
    {
        $validated = $request->validated();

        $district = District::find($id);
        $district->update($validated);

        $alert = [
            'type' => 'Success',
            'message' => 'District updated successfully',
        ];

        return redirect()->route('district.index')
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
