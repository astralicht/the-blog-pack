<?php

namespace cdf;

require_once("Config.php");
require_once("Routes.php");

define("PATH_INDEX", 0);
define("REQ_METHODS_INDEX", 1);
define("CLASS_INDEX", 2);
define("API_FLAG_INDEX", 3);

$HOST = $_SERVER["HTTP_HOST"];
$URI = $_SERVER["REQUEST_URI"];
$REQUEST_METHOD = $_SERVER["REQUEST_METHOD"];
$REQUEST_TYPE = !isset($_SERVER["HTTP_REQUEST_TYPE"]) ?: $_SERVER["HTTP_REQUEST_TYPE"];

$URI = ltrim($URI, "/");

$route = \cdf\Routes::search($URI, $REQUEST_METHOD);

if ($route == null || $route[PATH_INDEX] == "" || $route[PATH_INDEX] == null) {
    if ($REQUEST_TYPE === "API" || (isset($route[API_FLAG_INDEX]) && $route[API_FLAG_INDEX] === true)) {
        echo json_encode(["status" => 404, "message" => "Route does not exist."]);
        return;
    }

    $route = \cdf\Routes::search("404");
    renderPage($route[PATH_INDEX]);
}

if ($REQUEST_TYPE === "API" || (isset($route[API_FLAG_INDEX]) && $route[API_FLAG_INDEX] === true)) {
    include_once($route[PATH_INDEX]);

    $class = new $route[CLASS_INDEX]();
    $function = $route[REQ_METHODS_INDEX][$REQUEST_METHOD];
    echo $class->$function();
    
    return;
}

if (isset($_GET["type"])) {
    $imginfo = getimagesize($route[PATH_INDEX]);
    header("Content-type: {$imginfo['mime']}");
}


renderPage($route[PATH_INDEX]);


function renderPage($path) {
    $PAGE_TITLE = "";
    $APP_NAME = "";
    $PAGE_BODY = "";

    ob_start();
    include_once($path);
    $PAGE_BODY = ob_get_clean();

    include_once("App.php");
}