<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
class Roleseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $admin = new Role();
        $admin->name = 'Manager';
        $admin->guard_name = 'web';
        $admin->save();


        $role = new Role();
        $role->name = 'Employee';
        $role->guard_name = 'web';
        $role->save();

        $role = new Role();
        $role->name = 'Customer';
        $role->guard_name = 'web';
        $role->save();
    }
}
