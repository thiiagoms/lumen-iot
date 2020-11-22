<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->group(["prefix" => "api"], function () use ($router) {
    
    $router->get("/", ["uses" => "SensorController@index"]);
    
    $router->get("/{presence}", ["uses" => "SensorController@getByPresence"]);
    
    $router->post("/sensor", ["uses" => "SensorController@create"]);
});
