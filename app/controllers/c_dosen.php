<?php if ( ! defined('ROOT')) exit('No direct script access allowed');

class c_dosen extends C_Controller{
    function __construct()
    {
        $this->load_model('m_dosen');
    }

    public function route($props){
        $route = $props[0];
        switch ($route) {
            case null:
            case 'index':
                $this->index();
                break;
            
            default:
                $this->page404();
                break;
        }
    }

    function index($props=null){
        $user = $this->m_dosen->get(3);
        echo json_encode($user);
    }
}