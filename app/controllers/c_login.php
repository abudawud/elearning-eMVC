<?php if (!defined('ROOT')) exit('No direct script access allowed');

class c_login extends C_Controller
{
    function __construct()
    {
        $this->load_model('m_login');
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

            case 'logon':
                $this->logon($params);
                break;

            case 'logout':
                $this->logout($params);
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
            'title' => 'Login'
        );

        $this->template('login/v_login', $data);
    }

    function logon($params = null){
        $user = $_POST['username'];
        $pass = $_POST['password'];

        $res = $this->m_login->get($user, $pass);
        if(empty($res)){
            js_redirect(BASE_URL . 'c_login', "Username/Password Salah");
        }else{
            $_SESSION['is_login'] = true;
            $_SESSION['id_person'] = $res->id_person;
            $_SESSION['level'] = $res->level;
            $_SESSION['username'] = $res->user;
            $_SESSION['person_name'] = $res->person_name;
            redirect('c_home');
        }
    }

    function logout($params = null){
        session_destroy();
        redirect('c_home');
    }
}