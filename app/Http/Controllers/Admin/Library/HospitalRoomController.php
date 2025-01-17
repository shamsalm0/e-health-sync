<?php

namespace App\Http\Controllers\Admin\Library;

use App\Http\Controllers\Controller;
use App\Http\Requests\Library\HospitalRoomCreateRequest;
use App\Http\Requests\Library\HospitalRoomUpdateRequest;
use App\Models\Admin\Library\HospitalBranch;
use App\Models\Admin\Library\HospitalBuilding;
use App\Models\Admin\Library\HospitalRoom;
use App\Models\Admin\Library\RoomType;

class HospitalRoomController extends Controller
{
    public function __construct()
    {
        $name = 'Hospital Room';
        $this->middleware("can:$name View")->only('index', 'show');
        $this->middleware("can:$name Add")->only('create', 'store');
        $this->middleware("can:$name Edit")->only('edit', 'update');
        $this->middleware("can:$name Delete")->only('destroy');
    }

    public function index()
    {
        return view('admin.library.hospital-room.index');
    }

    public function create()
    {
        $data['hospital_room'] = new HospitalRoom;
        $data['branches'] = HospitalBranch::selectMenu();
        $data['buildings'] = HospitalBuilding::selectMenu();
        $data['room_types'] = RoomType::selectMenu();

        return view('admin.library.hospital-room.create', $data);
    }

    public function store(HospitalRoomCreateRequest $request)
    {
        $validated = $request->validated();

        HospitalRoom::create($validated);

        $alert = [
            'type' => 'Success',
            'message' => 'Hospital Room created successfully',
        ];

        return redirect()->route('hospital-room.index')
            ->with($alert);
    }

    public function show(string $id)
    {
        $data['hospital_room'] = HospitalRoom::findOrFail($id);

        return view('admin.library.hospital-room.show', $data);
    }

    public function edit(string $id)
    {
        $data['hospital_room'] = HospitalRoom::findOrFail($id);
        $data['branches'] = HospitalBranch::selectMenu();
        $data['buildings'] = HospitalBuilding::selectMenu();
        $data['room_types'] = RoomType::selectMenu();

        return view('admin.library.hospital-room.edit', $data);
    }

    public function update(HospitalRoomUpdateRequest $request, string $id)
    {
        $request->validated();

        $room = HospitalRoom::findOrFail($id);
        $room->update($request->validated());

        $alert = [
            'type' => 'Success',
            'message' => 'Hospital Room updated successfully',
        ];

        return redirect()->route('hospital-room.index')
            ->with($alert);
    }

    public function destroy(string $id) {}
}
