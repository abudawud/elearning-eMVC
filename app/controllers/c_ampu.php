<?php if (!defined('ROOT')) exit('No direct script access allowed');

class c_ampu extends C_Controller
{ 
    function __construct()
    {
        $this->load_model('m_matkul'); 
        $this->load_model('m_ampu'); 
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

            case 'add':
                $this->add($params);
                break;

            case 'save':
                $this->save($params);
                break;

            default:
                $this->page404();
                break;
        }
    }

    function template($view, $data = null)
    {
        $this->render('template/v_header', $data);
        $this->render('template/v_sidebar', $data);
        $this->render($view, $data);
        $this->render('template/v_footer');
    }

    function index($params = null)
    {
        $data = array(
            'title' => 'Ampu Mata Kuliah',
            'matkul' => $this->m_matkul->gets()
        );

        $this->template('ampu_matkul/v_ampu', $data);
    }

    function add($params = null){
        $data = array(
            'title' => "Ampu Matakuliah",
            'action' => "add",
            'matkul' => $this->m_matkul->get($params[0])
        );

        $this->template('ampu_matkul/v_form_ampu', $data);
    }

    function save($params = null){
        $id = 1; // Change with session

        $file = $_FILES['file']['name'];
        $tmpFile = $_FILES['tmp'];

        $data = array(
            'id_dosen' => $id,
            'id_matkul' => $_POST['id_matkul'],
            'keterangan_file' => $_POST['desc_file'],
            'file_name' => $file
        );

        $this->m_ampu->add($data);
    }
}
