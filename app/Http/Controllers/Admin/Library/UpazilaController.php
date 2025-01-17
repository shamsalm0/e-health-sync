<?php

namespace App\Http\Controllers\Admin\Library;

use App\Http\Controllers\Controller;
use App\Http\Requests\Library\UpazilaCreateRequest;
use App\Http\Requests\Library\UpazilaUpdateRequest;
use App\Models\Admin\Library\District;
use App\Models\Admin\Library\Upazila;

class UpazilaController extends Controller
{
    public function __construct()
    {
        $name = 'Upazila';
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
        return view('admin.library.upazila.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['upazila'] = new Upazila;
        $data['districts'] = District::selectDistrict();

        return view('admin.library.upazila.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UpazilaCreateRequest $request)
    {
        $validated = $request->validated();

        Upazila::create($validated);

        $alert = [
            'type' => 'Success',
            'message' => 'Upazila created successfully',
        ];

        return redirect()->route('upazila.index')
            ->with($alert);
    }

    // /**
    //  * Display the specified resource.
    //  */
    public function show(Upazila $upazila)
    {
        return view('admin.library.upazila.show', compact('upazila'));
    }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    public function edit(string $id)
    {
        $data['upazila'] = Upazila::findOrFail($id);
        $data['districts'] = District::selectDistrict();

        return view('admin.library.upazila.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpazilaUpdateRequest $request, string $id)
    {
        $validated = $request->validated();

        $upazila = Upazila::find($id);
        $upazila->update($validated);

        $alert = [
            'type' => 'Success',
            'message' => 'Upazila updated successfully',
        ];

        return redirect()->route('upazila.index')
            ->with($alert);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {}
}
