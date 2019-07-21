 <?php if (!defined('ROOT')) exit('No direct script access allowed');

    class c_pengguna extends C_Controller
    {
        function __construct()
        { 
            $this->load_model('m_pengguna');
            $this->load_model('m_dosen');
            $this->load_model('m_mahasiswa');            
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

                case 'add':
                    $this->add($params);
                    break;

                case 'save':
                    $this->save($params);
                    break;

                case 'delete':
                    $this->delete($params);
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
                'title' => 'Master Pengguna',
                'pengguna' => $this->m_pengguna->gets()
            );

            $this->template('pengguna/v_pengguna', $data);
        }

        function form($params = null){
            $action = $params[0];
            $id = $params[1];

            $pengguna = array();
            switch($action){
                case 'add':
                    $title = "Tambah Master Pengguna";
                    break;
                case 'view':
                    $title = "Detail Master Pengguna";
                    break;
                case 'edit':
                    $title = "Edit Master Pengguna";
                    $pengguna = $this->m_pengguna->get($params[1]);
                    break;
                case 'delete':
                    $title = "Hapus Master Pengguna";
                    break;
            }

            $data = array(
                'title' => "$title",
                'action' => $action,
                'pengguna' => $pengguna
            );

            $this->template('pengguna/v_form_pengguna', $data);
        }

        function add($params = null){
            $data = array(
                'title' => 'Tambah Pengguna',
                'action' => 'add',
                'mahasiswa' => json_encode($this->m_pengguna->getsMahasiswa()),
                'dosen' => json_encode($this->m_pengguna->getsDosen())
            );
        
            $this->template('pengguna/v_form_pengguna', $data);
        }

        function delete($params = null)
        {
            $id = $params[0];
            $res = $this->m_pengguna->delete($id);
            if ($res) {
                js_redirect(BASE_URL . "c_pengguna", "Master Pengguna berhasil dihapus");
            }else{
                js_redirect(BASE_URL . "c_pengguna", "Master Pengguna gagal dihapus!");
            }
        }

        function save($params = null){
            $action = $_POST['action'];
            $level = $_POST['pengguna_level'];
            $idPengguna = $_POST['id_pengguna'];

            $id = $_POST['id'];
            $data = array(
                'user' => $_POST['pengguna_user'],
                'password' => $_POST['pengguna_password'],
                'level' => $level,
            );

            switch($action){
                case 'add':
                    $res = $this->m_pengguna->add($data);
                    $id = $this->m_pengguna->getMaxID();
                    $update = array(
                        'id_pengguna' => $id
                    );

                    if($level == 2){ // DOSEN
                        $this->m_dosen->update($update, array('id_dosen' => $idPengguna));
                    }else if($level == 3){ // MAHASISWA
                        $this->m_mahasiswa->update($update, array('id_mahasiswa' => $idPengguna));
                    }

                    $msg = $res ? "Master Pengguna Berhasil Ditambahkan!" : "Master Pengguna Gagal Ditambahkan!";
                    break;
                case 'edit':
                    $res = $this->m_pengguna->update($data, array('id_pengguna' => $id));
                    $msg = $res ? "Master Pengguna Berhasil Dirubah!" : "Master Pengguna Gagal Dirubah!";
                    break;
            }

            if($res){
                js_redirect(BASE_URL . "c_pengguna", $msg);
            }else{
                js_redirect(BASE_URL . "c_pengguna", $msg);
            }


        }
    }
