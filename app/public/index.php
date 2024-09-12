<?php
// session start should be before any headers are set
session_start();

//setting header here will prevent us from setting it later which is needed for redirecting.
// header("Access-Control-Allow-Origin: *");
// header("Access-Control-Allow-Headers: *");

require __DIR__ . '/../patternrouter.php';

$uri = trim($_SERVER['REQUEST_URI'], '/');


$router = new PatternRouter();

try {
    $router->route($uri);
} catch (Exception $e) {
    http_response_code(500);
    echo $e;
    die();
}