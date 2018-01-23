<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class StationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fuel_stations = [
            [
                'miestas' => 'Kaunas',
                'adresas' => 'Pylimo g. 9',
                'gas' => '1000',
                'dysel' => '2000',
                'gasoline' => '5000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'miestas' => 'Vilnius',
                'adresas' => 'Petrausko g. 13',
                'gas' => '5000',
                'dysel' => '3000',
                'gasoline' => '4000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'miestas' => 'Jonava',
                'adresas' => 'baznycios g. 5',
                'gas' => '8000',
                'dysel' => '1000',
                'gasoline' => '6000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];
        foreach ($fuel_stations as $value) {
            DB::table('fuel_stations')->insert($value);
        }
    }
    }

