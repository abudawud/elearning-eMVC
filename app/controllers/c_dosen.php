 <?php if (!defined('ROOT')) exit('No direct script access allowed');

    class c_dosen extends C_Controller
    {
        function __construct()
        { 
            $this->load_model('m_dosen');
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

                case 'form':
                    $this->form($params);
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
                'title' => 'Master Dosen',
                'dosen' => $this->m_dosen->gets()
            );

            $this->template('dosen/v_dosen', $data);
        }

        function form($params = null){
            $action = $params[0];
            $id = $params[1];

            $dosen = array();
            switch($action){
                case 'add':
                    $title = "Tambah Master Dosen";
                    break;
                case 'view':
                    $title = "Detail Master Dosen";
                    break;
                case 'edit':
                    $title = "Edit Master Dosen";
                    $dosen = $this->m_dosen->get($params[1]);
                    break;
                case 'delete':
                    $title = "Hapus Master Dosen";
                    break;
            }

            $data = array(
                'title' => "$title",
                'action' => $action,
                'dosen' => $dosen
            );

            $this->template('dosen/v_form_dosen', $data);
        }

            function delete($params = null){
            $id = $params[0];
            $res = $this->m_dosen->delete($id);
            if($res){
                js_redirect(BASE_URL . "c_dosen", "Master Matakuliah berhasil dihapus");
            }else{
                js_redirect(BASE_URL . "c_dosen", "Master Matakuliah gagal dihapis!");
            }
        }

        function save($params = null){
            $action = $_POST['action'];
            $id = $_POST['id'];
            $data = array(
                'nama' => $_POST['dosen_name'],
                'nidn' => $_POST['dosen_nidn'],
                'email' => $_POST['dosen_email'],
                'tgl_lhr' => $_POST['dosen_tgl_lhr'],
                'alamat' => $_POST['dosen_alamat'],
                'foto' => $_POST['dosen_foto']
            );

            switch($action){
                case 'add':
                    $res = $this->m_dosen->add($data);
                    $msg = $res ? "Master Dosen Berhasil Ditambahkan!" : "Master Dosen Gagal Ditambahkan!";
                    break;
                case 'edit':
                    $res = $this->m_dosen->update($data, array('id_dosen' => $id));
                    $msg = $res ? "Master Dosen Berhasil Dirubah!" : "Master Dosen Gagal Dirubah!";
                    break;
            }

            if($res){
                js_redirect(BASE_URL . "c_dosen", $msg);
            }else{
                js_redirect(BASE_URL . "c_dosen", $msg);
            }


        }
    }
