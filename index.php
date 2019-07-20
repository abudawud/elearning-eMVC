<?php 
$root = "http://".$_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);

define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));
define('BASE_URL', $root);
define('VIEWS', ROOT . "app/views/");

require(ROOT . "core/C_Utils.php");
require(ROOT . "core/C_Controller.php");
require(ROOT . "core/C_Model.php");
require(ROOT . "config/config.php");
require(ROOT . "config/database.php");

$url = $_SERVER['REQUEST_URI'];
$url = explode('/', $url);
$controller = ROOT . 'app/controllers/'.$url[2].'.php';
if(file_exists($controller)){
    require $controller;
    if(class_exists($url[2])){
        $controller = new $url[2];
        $props = array_slice($url, 3);
        $controller->route($props);
    }else{
        header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
        echo "Cannot find class inside controller :(";
        echo "<br>Expected class: <i>".$url[2]."</i>";
        echo "<br>Controller file: <i>$controller</i>";                
    }
}else{
    header("HTTP/1.0 404 Not Found");
    echo "Cannot load controller :(";
    echo "<br>Expected controller: <i>$controller</i>";
}
