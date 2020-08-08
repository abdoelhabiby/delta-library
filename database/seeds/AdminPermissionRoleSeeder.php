<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminPermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // -------------- create super admin im development ----------------

        $admin = \App\Models\Admin\Admin::create([
            "name" => "ahmed",
            "email" => "a@a.com",
            "password" => bcrypt(123456789)
        ]);

        //-----------------------create roles -------------------------------

        $rules = [
            ['name' => 'super_admin', 'guard_name' => 'admin'],
            ['name' => 'admin', 'guard_name' => 'admin'],
            ['name' => 'employees', 'guard_name' => 'admin']
        ];

        Role::insert($rules);


        //------------------------------premissions --------------------------

        $permissions = [

            //------------------admins---------------------
            // "create_admins",
            // "read_admins",
            // "edit_admins",
            // "delete_admins",
            //-------------------epmloyees-----------------
            "create_employees",
            "read_employees",
            "edit_employees",
            "delete_employees",
            //------------------categories-----------------
            "create_categories",
            "read_categories",
            "edit_categories",
            "delete_categories",
            //-------------------books --------------------
            "create_books",
            "read_books",
            "edit_books",
            "delete_books",
            //---------------------------------------------
            "create_students" ,
            "read_students" ,
            "edit_students" ,
            "delete_students",

        ];

        $insert_permission = [];

        foreach ($permissions as  $permission) {
            $insert_permission[] = ["name" => $permission, 'guard_name' => 'admin'];
        }

        Permission::insert($insert_permission);

        $admin->assignRole("super_admin");
        $admin->givePermissionTo($permissions);

    }
}
