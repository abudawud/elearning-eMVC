<?php if ( ! defined('ROOT')) exit('No direct script access allowed');

class m_follow extends C_Model{
    function gets($idDosen){
        $sql = "SELECT * FROM v_matkul_dosen WHERE id_dosen = $idDosen";
        $res = $this->db->query($sql);
        return $this->db_results($res);
    }

    function get_followed($idMahasiswa){
        $sql = "SELECT * FROM v_mahasiswa_follow WHERE id_mahasiswa = $idMahasiswa";
        $res = $this->db->query($sql);
        return $this->db_results($res);
    }

    function add($data){
        return $this->db_insert('mahasiswa_follows', $data);
    }
}