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
        $user->name = 'Admin';
        $user->email = 'admin@gmail.com';
        $user->password = bcrypt('google@123');
        $user->role = 'admin';
        $user->save();

        $user = new User();
        $user->name = 'John Customer';
        $user->email = 'customer@gmail.com';
        $user->password = bcrypt('google@123');
        $user->role = 'customer';
        $user->save();


        $user = new User();
        $user->name = 'Eswar Customer';
        $user->email = 'customer.eswar@gmail.com';
        $user->password = bcrypt('google@123');
        $user->role = 'customer';
        $user->save();
    }
}
