<?php if (!defined('ROOT')) exit('No direct script access allowed');

class c_ampu extends C_Controller
{ 
    function __construct()
    {
        $this->load_model('m_matkul'); 
        $this->load_model('m_ampu'); 
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

            case 'add':
                $this->add($params);
                break;

            case 'edit':
                $this->edit($params);
                break;

            case 'save':
                $this->save($params);
                break;

            case 'list':
                $this->list($params);
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
            'title' => 'Ampu Mata Kuliah',
            'matkul' => $this->m_ampu->gets($_SESSION['id_person'])
        );

        $this->template('ampu_matkul/v_ampu', $data);
    }

    function list($params = null)
    {
        $data = array(
            'title' => 'Ampu Mata Kuliah',
            'ampu' => $this->m_ampu->getMyAmpu($_SESSION['id_person'])
        );

        $this->template('ampu_matkul/v_list_ampu', $data);
    }

    function add($params = null){
        $data = array(
            'title' => "Ampu Matakuliah",
            'action' => "add",
            'matkul' => $this->m_matkul->get($params[0])
        );

        $this->template('ampu_matkul/v_form_ampu', $data);
    }

    function edit($params = null){
        $data = array(
            'title' => "Ubah Matakuliah Diampu",
            'action' => "edit",
            'matkul' => $this->m_ampu->get($params[0])
        );

        $this->template('ampu_matkul/v_form_ampu', $data);
    }

    function save($params = null){
        $id = 5; // Change with session

        $action = $_POST['action'];
        $file = $_FILES['file']['name'];
        $file = empty($file) ? $_POST['file_name'] : $file;

        $tmpFile = $_FILES['file']['tmp_name'];
        $fileDir = UPLOAD_DIR . "ampu/";

        $data = array(
            'id_dosen' => $id,
            'id_matkul' => $_POST['id_matkul'],
            'keterangan_file' => $_POST['desc_file'],
            'file_name' => $file
        );

        if($action == 'add'){
            $res = $this->m_ampu->add($data);
            $msg = $res ? "Matakuliah Telah Diampu" : "Gagal mengampu matakuliah";
            $idTeach = $this->m_ampu->getMaxID();
            $fileDir .= $idTeach;
            
            $this->m_ampu->update(array('file' => "ampu/$idTeach/$file"), array('id_dosen_teachs' => $idTeach) );
            if(init_dir($fileDir)){
                move_uploaded_file($tmpFile, $fileDir . "/$file");
            }
        }else{
            $idTeach = $_POST['id_teach'];
            $fileDir .= $idTeach;
            $res = $this->m_ampu->update($data, array('id_dosen_teachs' => $idTeach) );
            $msg = $res ? "Matakuliah yang diampu berhasil diupdate!" : "Gagal menyimpan data!";
            if(!empty($tmpFile)){
                move_uploaded_file($tmpFile, $fileDir . "/$file");
                $this->m_ampu->update(array('file' => "ampu/$idTeach/$file"), array('id_dosen_teachs' => $idTeach) );
            }
        }

        js_redirect(BASE_URL . "c_ampu", $msg);
    }
}
