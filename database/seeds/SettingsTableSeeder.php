<?php

use Illuminate\Database\Seeder;
use Merodiro\Settings\Facades\Settings;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Settings::set('name', 'Social network');
    }
}
