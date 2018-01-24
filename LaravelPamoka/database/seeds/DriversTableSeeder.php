<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DriversTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Jonas Jonaitis',
                'city' => 'Kaunas',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Petras Petraitis',
                'city' => 'Vilnius',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Ona Onute',
                'city' => 'Kaunas',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];

        foreach ($data as $value) {
            DB::table('drivers')->insert($value);
    }
}
}