<?php

use App\Http\Controllers\BrokerController;


require './vendor/autoload.php';

date_default_timezone_set("America/Sao_Paulo");

while (true) {

    $broker = new BrokerController();
    $response = $broker->sendRequestBlynk();
    $date = date("d-m-y H:i:s", time());
    #$broker->sendToAPI($date, $response);
}