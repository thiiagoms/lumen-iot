<?php

namespace Database\Seeders;

use App\Models\Sensor;
use Illuminate\Database\Seeder;

class SensorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sensor::truncate();

        $presence = '["1"]';
        $fault = '["0"]';
        $sensor_presence = [$fault, $presence];
        
        date_default_timezone_set("America/Sao_Paulo");

        for ($count = 0; $count <= 500; $count++):
            Sensor::create([
                "date_sensor" => date("Y-m-d H:i:s", time()),
                "presence" => array_rand($sensor_presence)
            ]);
        endfor;
    }
}
