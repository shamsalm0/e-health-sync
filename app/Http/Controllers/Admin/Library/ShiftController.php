<?php

namespace App\Http\Controllers\Admin\Library;

use App\Http\Controllers\Controller;
use App\Http\Requests\Library\ShiftCreateRequest;
use App\Http\Requests\Library\ShiftUpdateRequest;
use App\Models\Admin\Library\HospitalBranch;
use App\Models\Admin\Library\Shift;

class ShiftController extends Controller
{
    public function __construct()
    {
        $name = 'Shift';
        $this->middleware("can:$name View")->only('index', 'show');
        $this->middleware("can:$name Add")->only('create', 'store');
        $this->middleware("can:$name Edit")->only('edit', 'update');
        $this->middleware("can:$name Delete")->only('destroy');
    }

    public function index()
    {
        return view('admin.library.shift.index');
    }

    public function create()
    {
        $data['shift'] = new Shift;
        $data['branches'] = HospitalBranch::selectMenu();

        return view('admin.library.shift.create', $data);
    }

    public function store(ShiftCreateRequest $request)
    {
        $validated = $request->validated();

        Shift::create($validated);

        $alert = [
            'type' => 'Success',
            'message' => 'Shift created successfully',
        ];

        return redirect()->route('shift.index')
            ->with($alert);
    }

    public function show(string $id)
    {
        $data['shift'] = Shift::findOrFail($id);

        return view('admin.library.shift.show', $data);
    }

    public function edit(string $id)
    {
        $data['shift'] = Shift::findOrFail($id);
        $data['branches'] = HospitalBranch::selectMenu();

        return view('admin.library.shift.edit', $data);
    }

    public function update(ShiftUpdateRequest $request, Shift $shift)
    {
        $request->validated();

        $shift->update($request->validated());

        $alert = [
            'type' => 'Success',
            'message' => 'Shift updated successfully',
        ];

        return redirect()->route('shift.index')
            ->with($alert);
    }

    public function destroy(string $id) {}
}
