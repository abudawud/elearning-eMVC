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
            switch($params[0]){
                case 'add':
                    $title = "Tambah Master Matakuliah";
                    break;
                case 'read':
                    $title = "Detail Master Matakuliah";
                    break;
                case 'edit':
                    $title = "Edit Master Matakuliah";
                    break;
                case 'delete':
                    $title = "Hapus Master Matakuliah";
                    break;
            }

            $data = array(
                'title' => "$title",
                'id_matkul' => $params[1]
            );

            $this->template('matkul/v_form_matkul', $data);
        }
    }
