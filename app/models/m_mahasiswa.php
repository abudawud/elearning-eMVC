<?php if ( ! defined('ROOT')) exit('No direct script access allowed');

class m_mahasiswa extends C_Model{
    function gets(){
        $sql = "SELECT * FROM ms_mahasiswa";
        $res = $this->db->query($sql);
        return $this->db_results($res);
    }

    function get($id = 0){
        $sql = "SELECT * FROM ms_mahasiswa WHERE id_mahasiswa = $id";
        return $this->db->query($sql)->fetch_object();
    }

    function add($data){
        return $this->db_insert('ms_mahasiswa', $data);
    }

    function update($data, $where){
        return $this->db_update('ms_mahasiswa', $data, $where);
    }
}