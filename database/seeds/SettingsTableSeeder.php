<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert(
            [
                "id" => 1,
                "app_title" => "Dentist",
                "clinic_name" => "Demo Clinic",
                "doctor_name" => "Demo Doctor",
                "mobile_number" => "+91 9811995588",
                "email" => "dentist@dentist.com",
                "address" => "New Delhi",
            ]
        );
    }
}
