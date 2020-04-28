<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Setting::create([
        	"site_name" => "Laravel Blog",
        	"address"   => "Mymensingh",
        	"contact_number" => "+88 01521306527",
        	"contact_email"  => "Snigdho2011@gmail.com"
        ]);
    }
}
