<?php 
define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));
define('VIEWS', ROOT . "app/views/");

require(ROOT . "core/C_Controller.php");

$url = $_SERVER['PHP_SELF'];
$url = explode('/', $url);
$controller = 'app/controllers/'.$url[2].'.php';
if(file_exists($controller)){
    require $controller;
    $controller = new $url[2];
    $props = array_slice($url, 3);
    $controller->route($props);
}else{
    header("HTTP/1.0 404 Not Found");
    echo "Cannot load controller :(";
    echo "<br>Expected controller: <i>$controller</i>";
}
