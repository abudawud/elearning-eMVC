<?php

class C_Controller {
    function render($filename, $data){
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

    function view404($file){
        header("HTTP/1.0 404 Not Found");
        echo "Cannot load view :(";
        echo "<br>Expected view: <i>$file</i>";
    }

    function page404(){
        header("HTTP/1.0 404 Not Found");
        echo "Page Not Found :(";
    }
}