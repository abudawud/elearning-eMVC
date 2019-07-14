<?php
class dosen extends C_Controller{
    public function route($props){
        $route = $props[0];
        switch ($route) {
            case null:
                $this->index();
                break;
            
            default:
                $this->page404();
                break;
        }
    }

    function index($props=null){
        $data = array('index' => 'hai bro');
        $this->render('index', $data);
    }
}