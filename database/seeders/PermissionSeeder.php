<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    private function getName($name)
    {
        return [
            "$name View",
            "$name Add",
            "$name Edit",
            "$name Delete",
        ];
    }

    public function run(): void
    {
        $permissions = [
            ...$this->getName('User'),
            'Change Password',
            ...$this->getName('Agent'),
            ...$this->getName('Agent Commission'),
            ...$this->getName('Bank'),
            ...$this->getName('Bank Branch'),
            ...$this->getName('Blood Group'),
            ...$this->getName('Department'),
            ...$this->getName('Designation'),
            ...$this->getName('Discount Service Setup'),
            ...$this->getName('Diag Money Receive'),
            'Diag Money Receive',
            ...$this->getName('District'),
            ...$this->getName('Division'),
            ...$this->getName('Employee'),
            ...$this->getName('Employee Exam'),
            ...$this->getName('Employee Board'),
            ...$this->getName('External Emp'),
            ...$this->getName('Gender'),
            ...$this->getName('Grade'),
            ...$this->getName('Hospital'),
            ...$this->getName('Hospital Branch'),
            ...$this->getName('Hospital Building'),
            ...$this->getName('Hospital Counter'),
            ...$this->getName('Hospital Floor'),
            ...$this->getName('Hospital Room'),
            'Login History',
            ...$this->getName('Marital Status'),
            ...$this->getName('Machine'),
            'Message Log',
            ...$this->getName('Occupation'),
            ...$this->getName('Other Service'),
            ...$this->getName('Permission'),
            ...$this->getName('Role'),
            ...$this->getName('Reference'),
            ...$this->getName('Religion'),
            ...$this->getName('Resource'),
            ...$this->getName('Room Type'),
            ...$this->getName('Report Type'),
            ...$this->getName('Report Doctor Commission'),
            ...$this->getName('Shift'),
            ...$this->getName('Sms'),
            ...$this->getName('Specialization'),
            ...$this->getName('Store Product'),
            ...$this->getName('Store Product Category'),
            ...$this->getName('Symptom'),
            ...$this->getName('Test Group'),
            ...$this->getName('Test Name'),
            ...$this->getName('Test Attribute'),
            ...$this->getName('Test Machine'),
            ...$this->getName('Test Package'),
            ...$this->getName('Test Package Details'),
            ...$this->getName('Test Product'),
            ...$this->getName('Ticket Fee'),
            ...$this->getName('Union'),
            ...$this->getName('Uom'),
            ...$this->getName('Upazila'),
        ];

        Role::all()->each->delete();
        Permission::all()->each->delete();

        // Create roles
        $superAdminRole = Role::create(['name' => 'Super Admin']);
        $adminRole = Role::create(['name' => 'Admin']);

        // Assign 'Super Admin' role to 'wtech' user
        $userWtech = User::where('username', 'wtech')->first();
        $userWtech->assignRole($superAdminRole);

        // Assign 'Admin' role to 'admin' user
        $userAdmin = User::where('username', 'admin')->first();
        $userAdmin->assignRole($adminRole);

        foreach ($permissions as $permission) {
            $permission = Permission::create(['name' => $permission]);
            DB::table('role_has_permissions')->insert([
                'permission_id' => $permission->id,
                'role_id' => $adminRole->id,
            ]);
        }
    }
}
