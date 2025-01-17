<?php

namespace App\Http\Controllers\Admin\Library;

use App\Http\Controllers\Controller;
use App\Http\Requests\Library\UnionCreateRequest;
use App\Http\Requests\Library\UnionUpdateRequest;
use App\Models\Admin\Library\Union;
use App\Models\Admin\Library\Upazila;

class UnionController extends Controller
{
    public function __construct()
    {
        $name = 'Union';
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
        return view('admin.library.union.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['union'] = new union;
        $data['upazilas'] = Upazila::selectUpazila();

        return view('admin.library.union.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UnionCreateRequest $request)
    {
        $validated = $request->validated();

        Union::create($validated);

        $alert = [
            'type' => 'Success',
            'message' => 'Union created successfully',
        ];

        return redirect()->route('union.index')
            ->with($alert);
    }

    public function show(Union $union)
    {
        return view('admin.library.union.show', compact('union'));
    }

    public function edit(string $id)
    {
        $data['union'] = union::findOrFail($id);
        $data['upazilas'] = Upazila::selectUpazila();

        return view('admin.library.union.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UnionUpdateRequest $request, string $id)
    {
        $validated = $request->validated();

        $union = Union::find($id);
        $union->update($validated);

        $alert = [
            'type' => 'Success',
            'message' => 'Union updated successfully',
        ];

        return redirect()->route('union.index')
            ->with($alert);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {}
}
