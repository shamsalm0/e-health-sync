<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Models\LoginHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $name = 'Role';
        $this->middleware("permission:$name View|$name Add|$name Edit|$name Delete", ['only' => ['index', 'show']]);
        $this->middleware("permission:$name Add", ['only' => ['create', 'store']]);
        $this->middleware("permission:$name Edit", ['only' => ['edit', 'update']]);
        $this->middleware("permission:$name Delete", ['only' => ['destroy']]);
    }

    public function index()
    {
        return view('authentication.roles.index');
    }

    public function create()
    {
        $data['permissions'] = Permission::get();

        return view('authentication.roles.create', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $role = Role::create(['name' => $request->input('name')]);
            $permissionNames = Permission::whereIn('id', $request->input('permission'))->pluck('name');
            $role->syncPermissions($permissionNames);

            DB::commit();
            $alert = [
                'type' => 'Success',
                'message' => 'Successfully Stored',
            ];
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->withErrors(['name' => $e->getMessage()]);
        }

        return redirect()->route('roles.index')->with($alert);
    }

    public function show($id)
    {
        $data['role'] = Role::find($id);
        $data['permissions'] = Permission::get();
        $data['rolePermissions'] = Permission::join('role_has_permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')
            ->where('role_has_permissions.role_id', $id)
            ->get();

        return view('authentication.roles.show', $data);
    }

    public function edit($id)
    {
        $data['role'] = Role::find($id);
        $data['permissions'] = Permission::get();
        $data['rolePermissions'] = DB::table('role_has_permissions')->where('role_has_permissions.role_id', $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();

        return view('authentication.roles.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $role = Role::find($id);
            $role->name = $request->input('name');
            $role->save();

            $permissionNames = Permission::whereIn('id', $request->input('permission'))->pluck('name');
            $role->syncPermissions($permissionNames);
            $login_histories = [];
            foreach ($role->users->whereNotNull('session_id') as $user) {
                $login_histories[] = [
                    'user_id' => $user->id,
                    'username' => $user->username,
                    'request_ip' => $request->ip(),
                    'user_agent' => $request->userAgent(),
                    'request_for' => 'Logout',
                    'status' => 'Success',
                    'remark' => 'Role Updated',
                ];
            }
            LoginHistory::insert($login_histories);

            $role->users->whereNotNull('session_id')->each->update([
                'session_id' => null,
            ]);

            DB::commit();

            $alert = [
                'type' => 'Success',
                'message' => 'Successfully Updated',
            ];

        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->withErrors(['name' => $e->getMessage()]);
        }

        return redirect()->route('roles.index')->with($alert);
    }

    public function destroy($id)
    {
        DB::table('roles')->where('id', $id)->delete();

        $alert = [
            'type' => 'Success',
            'message' => 'Successfully Deleted',
        ];

        return redirect()->back()->with($alert);
    }
}
