 <?php if (!defined('ROOT')) exit('No direct script access allowed');

    class c_matkul extends C_Controller
    {
        function __construct()
        { 
            $this->load_model('m_matkul');
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
                'title' => 'Master Mata Kuliah',
                'matkul' => $this->m_matkul->gets()
            );

            $this->template('matkul/v_matkul', $data);
        }

        function form($params = null){
            $action = $params[0];
            $id = $params[1];

            $matkul = array();
            switch($action){
                case 'add':
                    $title = "Tambah Master Matakuliah";
                    break;
                case 'view':
                    $title = "Detail Master Matakuliah";
                    break;
                case 'edit':
                    $title = "Edit Master Matakuliah";
                    $matkul = $this->m_matkul->get($params[1]);
                    break;
                case 'delete':
                    $title = "Hapus Master Matakuliah";
                    break;
            }

            $data = array(
                'title' => "$title",
                'action' => $action,
                'matkul' => $matkul
            );

            $this->template('matkul/v_form_matkul', $data);
        }

        function save($params = null){
            $action = $_POST['action'];
            $id = $_POST['id'];
            $data = array(
                'nm_matkul' => $_POST['matkul_name'],
                'judul' => $_POST['matkul_title'],
                'deskripsi' => $_POST['matkul_desc']
            );

            switch($action){
                case 'add':
                    $res = $this->m_matkul->add($data);
                    $msg = $res ? "Master Mata Kuliah Berhasil Ditambahkan!" : "Master Mata Kuliah Gagal Ditambahkan!";
                    break;
                case 'edit':
                    $res = $this->m_matkul->update($data, array('id_matkul' => $id));
                    $msg = $res ? "Master Mata Kuliah Berhasil Dirubah!" : "Master Mata Kuliah Gagal Dirubah!";
                    break;
            }

            if($res){
                js_redirect(BASE_URL . "c_matkul", $msg);
            }else{
                js_redirect(BASE_URL . "c_matkul", $msg);
            }


        }
    }
