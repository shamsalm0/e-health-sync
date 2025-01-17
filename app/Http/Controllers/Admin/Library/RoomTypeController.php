<?php

namespace App\Http\Controllers\Admin\Library;

use App\Http\Controllers\Controller;
use App\Http\Requests\Library\RoomTypeCreateRequest;
use App\Http\Requests\Library\RoomTypeUpdateRequest;
use App\Models\Admin\Library\RoomType;

class RoomTypeController extends Controller
{
    public function __construct()
    {
        $name = 'Room Type';
        $this->middleware("can:$name View")->only('index', 'show');
        $this->middleware("can:$name Add")->only('create', 'store');
        $this->middleware("can:$name Edit")->only('edit', 'update');
        $this->middleware("can:$name Delete")->only('destroy');
    }

    public function index()
    {
        return view('admin.library.room-type.index');
    }

    public function create()
    {
        $data['room_type'] = new RoomType;

        return view('admin.library.room-type.create', $data);
    }

    public function store(RoomTypeCreateRequest $request)
    {
        $validated = $request->validated();

        RoomType::create($validated);

        $alert = [
            'type' => 'Success',
            'message' => 'Room type created successfully',
        ];

        return redirect()->route('room-type.index')
            ->with($alert);
    }

    public function show(string $id)
    {
        $data['room_type'] = RoomType::findOrFail($id);

        return view('admin.library.room-type.show', $data);
    }

    public function edit(string $id)
    {
        $data['room_type'] = RoomType::findOrFail($id);

        return view('admin.library.room-type.edit', $data);
    }

    public function update(RoomTypeUpdateRequest $request, $id)
    {
        $request->validated();

        $roomType = RoomType::findOrFail($id);
        $roomType->update($request->validated());

        $alert = [
            'type' => 'Success',
            'message' => 'Room type updated successfully',
        ];

        return redirect()->route('room-type.index')
            ->with($alert);
    }

    public function destroy(string $id) {}
}
