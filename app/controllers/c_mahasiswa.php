 <?php if (!defined('ROOT')) exit('No direct script access allowed');

    class c_mahasiswa extends C_Controller
    {
        function __construct()
        { 
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
                'title' => 'Master Mahasiswa',
                'dosen' => $this->m_mahasiswa->gets()
            );

            $this->template('dosen/v_mahasiswa', $data);
        }

        function form($params = null){
            $action = $params[0];
            $id = $params[1];

            $dosen = array();
            switch($action){
                case 'add':
                    $title = "Tambah Master Mahasiswa";
                    break;
                case 'view':
                    $title = "Detail Master Mahasiswa";
                    break;
                case 'edit':
                    $title = "Edit Master Mahasiswa";
                    $matkul = $this->m_dosen->get($params[1]);
                    break;
                case 'delete':
                    $title = "Hapus Master Mahasiswa";
                    break;
            }

            $data = array(
                'title' => "$title",
                'action' => $action,
                'mahasiswa' => $mahasiswa
            );

            $this->template('mahasiswa/v_form_mahasiswa', $data);
        }

        function save($params = null){
            $action = $_POST['action'];
            $id = $_POST['id'];
            $data = array(
                'nim' => $_POST['mahasiswa_nim'],
                'nama' => $_POST['mahasiswa_nama'],
                'email' => $_POST['mahasiswa_email'],
                'tgl_lhr' => $_POST['mahasiswa_tgl_lhr'],
                'alamat' => $_POST['dosen_alamat'],
                'foto' => $_POST['dosen_foto'],
            );

            switch($action){
                case 'add':
                    $res = $this->m_dosen->add($data);
                    $msg = $res ? "Master Mahasiswa Berhasil Ditambahkan!" : "Master Mahasiswa Gagal Ditambahkan!";
                    break;
                case 'edit':
                    $res = $this->m_dosen->update($data, array('id_matkul' => $id));
                    $msg = $res ? "Master Mahasiswa Berhasil Dirubah!" : "Master Mahasiswa Gagal Dirubah!";
                    break;
            }

            if($res){
                js_redirect(BASE_URL . "c_dosen", $msg);
            }else{
                js_redirect(BASE_URL . "c_dosen", $msg);
            }


        }
    }
