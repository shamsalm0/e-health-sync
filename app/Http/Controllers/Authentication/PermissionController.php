<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function __construct()
    {
        $name = 'Permission';
        $this->middleware("permission:$name View|$name Add|$name Edit|$name Delete", ['only' => ['index', 'show']]);
        $this->middleware("permission:$name Add", ['only' => ['create', 'store']]);
        $this->middleware("permission:$name Edit", ['only' => ['edit', 'update']]);
        $this->middleware("permission:$name Delete", ['only' => ['destroy']]);
    }

    public function index()
    {
        return view('authentication.permission.index');
    }

    public function create()
    {
        $data['permission'] = new Permission;

        return view('authentication.permission.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name',
        ]);

        Permission::create(['name' => $request->name]);

        $alert = [
            'type' => 'Success',
            'message' => 'Permission created successfully',
        ];

        return redirect()->route('permission.index')->with($alert);
    }

    public function show(string $id)
    {
        return abort(404);
    }

    public function edit(string $id)
    {
        $data['permission'] = Permission::findOrFail($id);

        return view('authentication.permission.edit', $data);
    }

    public function update(Request $request, string $id)
    {

        $request->validate([
            'name' => 'required|unique:permissions,name,'.$id,
        ]);
        $permission = Permission::findOrFail($id);
        $permission->name = $request->name;
        $permission->save();

        $alert = [
            'type' => 'Success',
            'message' => 'Permission updated successfully',
        ];

        return redirect()->route('permission.index')->with($alert);
    }

    public function destroy(string $id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();

        $alert = [
            'type' => 'Success',
            'message' => 'Permission deleted successfully',
        ];

        return redirect()->route('permission.index')->with($alert);
    }
}
