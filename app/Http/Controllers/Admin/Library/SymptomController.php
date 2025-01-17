<?php

namespace App\Http\Controllers\Admin\Library;

use App\Http\Controllers\Controller;
use App\Http\Requests\Library\SymptomCreateRequest;
use App\Http\Requests\Library\SymptomUpdateRequest;
use App\Models\Admin\Library\Symptom;

class SymptomController extends Controller
{
    public function __construct()
    {
        $name = 'Symptom';
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
        return view('admin.library.symptom.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['symptom'] = new Symptom;

        return view('admin.library.symptom.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SymptomCreateRequest $request)
    {
        $validated = $request->validated();

        Symptom::create($validated);

        $alert = [
            'type' => 'Success',
            'message' => 'Symptom created successfully',
        ];

        return redirect()->route('symptom.index')
            ->with($alert);
    }

    // /**
    //  * Display the specified resource.
    //  */
    public function show(string $id)
    {
        $data['symptom'] = Symptom::findOrFail($id);

        return view('admin.library.symptom.show', $data);
    }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    public function edit(string $id)
    {
        $data['symptom'] = Symptom::findOrFail($id);

        return view('admin.library.symptom.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SymptomUpdateRequest $request, string $id)
    {
        $validated = $request->validated();
        $symptom = Symptom::find($id);
        $symptom->update($validated);

        $alert = [
            'type' => 'Success',
            'message' => 'Symptom updated successfully',
        ];

        return redirect()->route('symptom.index')
            ->with($alert);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {}
}
