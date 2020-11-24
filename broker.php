<?php

use App\Http\Controllers\BrokerController;


require './vendor/autoload.php';

date_default_timezone_set("America/Sao_Paulo");

while (true) {

    $broker = new BrokerController();
    $response = $broker->sendRequestBlynk();
    $date = date("Y-m-d H:i:s", time());

    if ($response == '["1"]') {
        $broker->sendLed(255);
    } else {
        $broker->sendLed(0);
    }
    echo $date . " - " . $response . "\n";
    $broker->sendToAPI($date, $response);
}
