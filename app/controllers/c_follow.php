<?php if (!defined('ROOT')) exit('No direct script access allowed');

class c_follow extends C_Controller
{
    function __construct()
    {
        $this->load_model('m_menu');
        session_start();
    }

    public function route($props)
    {
        $route = $props[0];
        $params = array_slice($props, 1);
        switch ($route) {
            case null:
            case 'index':
                $this->index($params);
                break;

            default:
                $this->page404();
                break;
        }
    }

    function template($view, $data = null)
    {
        $data['sidebar'] = $this->m_menu->gets($_SESSION['level']);
        $this->render('template/v_header', $data);
        $this->render('template/v_sidebar', $data);
        $this->render($view, $data);
        $this->render('template/v_footer');
    }

    function index($params = null)
    {
        $data = array(
            'title' => 'Beranda'
        );

        $this->template('follow/v_follow', $data);
    }
}