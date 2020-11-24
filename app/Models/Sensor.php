<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model {

    protected $fillable = ["date_sensor", "presence"];
    protected $table = "sensor";
    protected $dateFormat = "d/m/Y";
    public $timestamps = false;
}