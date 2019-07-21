<?php if ( ! defined('ROOT')) exit('No direct script access allowed');

class m_menu extends C_Model{
    function gets($level = null){
        switch($level){
            case '1': // ADMIN
                $data = array(
                    "<li><a href=\"" . BASE_URL ."c_home\">Beranda</a></li>",
                    "<li><a href=\"" . BASE_URL . "c_matkul\">Master Matakuliah</a></li>",
                    "<li><a href=\"" . BASE_URL . "c_dosen\">Master Dosen</a></li>",
                    "<li><a href=\"" . BASE_URL . "c_mahasiswa\">Master Mahasiswa</a></li>",
                    "<li><a href=\"" . BASE_URL . "c_pengguna\">Master Pengguna</a></li>"
                );
                break;
            case '2': // DOSEN
                $data = array(
                    "<li><a href=\"" . BASE_URL ."c_home\">Beranda</a></li>",
                    "<li><a href=\"". BASE_URL . "c_ampu\">Ampu Matakuliah</a></li>"
                );
                break;
            case '3': // MAHASISWA
                $data = array(
                    "<li><a href=\"" . BASE_URL ."c_home\">Beranda</a></li>",
                    "<li><a href=\"" . BASE_URL . "c_follow\">Ikuti Matakuliah</a></li>"
                );
                break;
            default:   // GUEST
                $data = array(
                    "<li><a href=\"" . BASE_URL ."c_home\">Beranda</a></li>",
                );
                break;            
        }

        return $data;
    }
}