<?php

namespace App\Http\Controllers;

use App\Models\Sensor;
use Illuminate\Http\Request;

class SensorController extends Controller {

    public function index() 
    {
        $response = Sensor::all();

        return response()->json($response);
    }

    public function getByPresence($presence)
    {
        $presence = Sensor::where('presence', $presence)->get();
        return response()->json($presence);
    }

    public function create(Request $request)
    {
        $sensor = new Sensor();
        $sensor->date_sensor = $request->date_sensor;
        $sensor->presence = $request->presence;
        $sensor->save();
    }

    
}
