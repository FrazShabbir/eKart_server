<?php

namespace Database\Seeders;

use App\Models\HomeText;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new HomeText();
        $admin->head1 = 'Dummy';
        $admin->logo = 'no-image.jpg';
        $admin->save();
    }
}
