<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DriversSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $drivers = [
            [
                'name' => 'Jonas Ponas',
                'city' => 'Kaunas',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Ona Pona',
                'city' => 'Vilnius',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Andzelika Varna',
                'city' => 'Rokiskis',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];

        foreach ($drivers as $value) {
            DB::table('drivers')->insert($value);
        }
    }
}
