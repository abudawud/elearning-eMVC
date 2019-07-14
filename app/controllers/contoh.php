<?php
class contoh extends C_Controller{
    public function route($props){
        $route = $props[0];

        // Param merupakan string yang terletak setelah method
        // contoh http://127.0.0.1/index.php/contoh/detail/12/19
        // contoh: nama controller
        // detail: nama method yang dipanggil
        // 12: param pertama (param[0])
        // 19: param kedua (param[1])
        // NOTE: jumlah param tidak dibatasi        
        $params = array_slice($props, 1);
        switch ($route) {
            case null:
            case 'index':
                $this->index($params);
                break;

            case 'detail':
                $this->detail($params);
                break;
            
            default:
                $this->page404();
                break;
        }
    }

    function index($params=null){
        $data = array(
            'param' => 'Param ' . $params[0],
            'data1' => 'Contoh data 1x',
            'data2' => 'Contoh data 2x',
            'data3' => 'Contoh data 3x',            
        );

        $this->render('contoh/contoh', $data);
    }

    function detail($params=null){
        $data = array(
            'tittle' => 'F16.10u',
            'desc' => 'F16.10u',
            'param' => 'Param ' . $params[0],
            'data1' => 'Contoh data 12x',
            'data2' => 'Contoh data 22x',
            'data3' => 'Contoh data 32x',            
        );

        $this->render('contoh/contoh_detail', $data);
    }
}