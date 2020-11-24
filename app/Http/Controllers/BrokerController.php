<?php

namespace App\Http\Controllers;

use App\Models\Sensor;
use Illuminate\Http\Request;

class BrokerController extends Controller {

    private $token;
    private $url;
    private $response;

    public function __construct() {
        
        $this->url = "https://blynk-cloud.com";
        $this->token = "E_a-LqOOCH6cLjL80cJqi7YJvPPzR_RX";
    }

    public function sendRequestBlynk()
    {
        $url = "{$this->url}/{$this->token}/get/V1";
        $stream_opts = [
            "ssl" => [
                "verify_peer" => false,
                "verify_peer_home" => false
            ] 
        ];
        $request = file_get_contents($url, false, stream_context_create($stream_opts));
        return $this->response = $request;
    }

    public function sendToAPI($date_sensor, $presence)
    {
        $data = array(
            "date_sensor" => $date_sensor, 
            "presence" => $presence
        );
        $this->url = "http://localhost/myapp/public/api/sensor";
        $curl = curl_init($this->url);
        $postString = http_build_query($data, '', '&');
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $postString);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        echo $response;
        curl_close($curl);
        
    }

    public function sendLed($value) {
        $url = "{$this->url}/{$this->token}/update/V2?value={$value}";
        $stream_opts = [
            "ssl" => [
                "verify_peer" => false,
                "verify_peer_home" => false
            ] 
        ];
        $request = file_get_contents($url, false, stream_context_create($stream_opts));
        return $this->response = $request;
    }

}
