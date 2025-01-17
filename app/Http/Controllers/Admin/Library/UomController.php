<?php

namespace App\Http\Controllers\Admin\Library;

use App\Http\Controllers\Controller;
use App\Http\Requests\Library\UOMCreateRequest;
use App\Http\Requests\Library\UOMUpdateRequest;
use App\Models\Admin\Library\Uom;

class UomController extends Controller
{
    public function __construct()
    {
        $name = 'Uom';
        $this->middleware("can:$name View")->only('index', 'show');
        $this->middleware("can:$name Add")->only('create', 'store');
        $this->middleware("can:$name Edit")->only('edit', 'update');
        $this->middleware("can:$name Delete")->only('destroy');
    }

    private $data = [];

    public function index()
    {
        return view('admin.library.uom.index');
    }

    public function create()
    {
        $this->data['uom'] = new Uom;

        return view('admin.library.uom.create', $this->data);
    }

    public function store(UOMCreateRequest $request)
    {
        $validated = $request->validated();

        $uom = Uom::create($validated);

        $alert = [
            'type' => 'Success',
            'message' => 'Uom created successfully.',
        ];

        return redirect()->route('uom.index')
            ->with($alert);
    }

    public function show($id)
    {
        $this->data['uom'] = Uom::findOrFail($id);

        return view('admin.library.uom.show', $this->data);
    }

    public function edit($id)
    {
        $this->data['uom'] = Uom::findOrFail($id);

        return view('admin.library.uom.edit', $this->data);
    }

    public function update(UOMUpdateRequest $request, Uom $uom)
    {
        $validated = $request->validated();
        $uom->update($validated);

        $alert = [
            'type' => 'Success',
            'message' => 'Uom updated successfully',
        ];

        return redirect()->route('uom.index')
            ->with($alert);
    }

    public function destroy($id)
    {
        $uom = Uom::findOrFail($id);
        $uom->delete();

        $alert = [
            'type' => 'Success',
            'message' => 'Uom deleted successfully',
        ];

        return redirect()->route('uom.index')
            ->with($alert);
    }
}
