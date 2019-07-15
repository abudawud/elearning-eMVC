<?php if ( ! defined('ROOT')) exit('No direct script access allowed');

class C_Controller {
    function render($filename, $data = null){
        $view = VIEWS . $filename . ".php";

        if(!file_exists($view)){
            $this->view404($view);
            return false;
        }

        extract($data);
        ob_start();        
        require(VIEWS . $filename . ".php");
        ob_end_flush();

        return true;
    }

    function load_model($model){
        $file = ROOT . "app/models/" . $model . ".php";
        if(file_exists($file)){
            require $file;
            $arr = explode('/', $model);
            $class = $arr[count($arr) - 1];

            if(class_exists($class)){
                $this->{$class} = new $class;
            }else{
                header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
                echo "Cannot find class inside model :(";
                echo "<br>Expected class: <i>$class</i>";
                echo "<br>Model file: <i>$file</i>";                
            }
        }else{
            header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
            echo "Cannot load model :(";
            echo "<br>Expected model: <i>$file</i>";
        }
    }

    function view404($file){
        header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
        echo "Cannot load view :(";
        echo "<br>Expected view: <i>$file</i>";
    }

    function page404(){
        header("HTTP/1.0 404 Not Found");
        echo "Page Not Found :(";
    }
}