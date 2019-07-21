<?php if (!defined('ROOT')) exit('No direct script access allowed');

class c_follow extends C_Controller
{
    function __construct()
    {
        $this->load_model('m_menu');
        $this->load_model('m_dosen');
        $this->load_model('m_follow');
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

            case 'matkul':
                $this->matkul($params);
                break;

            case 'follow':
                $this->follow($params);
                break;

            case 'list_follow':
                $this->list_follow()($params);
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
            'title' => 'Ikuti Matakuliah',
            'dosen' => $this->m_dosen->gets()
        );

        $this->template('follow/v_follow', $data);
    }

    function matkul($params = null)
    {
        $data = array(
            'title' => 'Daftar Matakuliah',
            'id_dosen' => $params[0],
            'matkul' => $this->m_follow->gets($params[0])
        );

        $this->template('follow/v_follow_matkul', $data);
    }

    function follow($params = null)
    {

        $data = array(
            'id_mahasiswa' => $_SESSION['id_person'],
            'id_matkul_dosen' => $params[0]
        );

        $res = $this->m_follow->add($data);

        if ($res) {
            js_redirect(BASE_URL . 'c_follow/matkul/' . $params[1], "Matakuliah berhasil diikuti!");
        } else {
            js_redirect(BASE_URL . 'c_follow/matkul/' . $params[1], "Matakuliah gagal diikuti!");
        }
    }

    function list_follow($params = null)
    {
        $data = array(
            'title' => 'Matakuliah Diikuti',
            'follow' => $this->m_follow->get_followed($_SESSION['id_person'])
        );

        $this->template('follow/v_list_follow', $data);
    }

    function book($params = null){
        $id = $params[0];
    }
}
