<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RadarsSeeder extends Seeder
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
                'date' => Carbon::create(2017, 1, 1, 10, 10, 00),
                'number' => 'AAA111',
                'distance' => '1000',
                'time' => '500',
                'driver_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'date' => Carbon::create(2017, 2, 2, 20, 20, 00),
                'number' => 'BBB222',
                'distance' => '2000',
                'time' => '1000',
                'driver_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'date' => Carbon::create(2018, 1, 1, 10, 10, 00),
                'number' => 'CCC333',
                'distance' => '3000',
                'time' => '1500',
                'driver_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];

        foreach ($data as $value) {
            for ($i=0; $i < 10; $i++) { 
            DB::table('radars')->insert($value);
            }
        }
    }
}
