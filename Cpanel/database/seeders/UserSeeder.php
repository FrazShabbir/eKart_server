<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {



        $user = new User();
        $user->name = 'manager';
        $user->email = 'manager@gmail.com';
        $user->password = bcrypt('google@123');

        $user->save();
        $user->roles()->attach('1');

        $user = new User();
        $user->name = 'employee';
        $user->email = 'employee@gmail.com';
        $user->password = bcrypt('google@123');

        $user->save();
        $user->roles()->attach('2');


        $user = new User();
        $user->name = 'customer';
        $user->email = 'customer@gmail.com';
        $user->password = bcrypt('google@123');

        $user->save();
        $user->roles()->attach('3');
    }
}
