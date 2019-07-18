<?php if ( ! defined('ROOT')) exit('No direct script access allowed');

class m_matkul extends C_Model{
    function gets(){
        $sql = "SELECT * FROM ms_matkul";
        $res = $this->db->query($sql);
        return $this->db_results($res);
    }

    function get($id = 0){
        $sql = "SELECT * FROM ms_matkul WHERE id_matkul = $id";
        return $this->db->query($sql)->fetch_object();
    }

    function add($data){
        return $this->db_insert('ms_matkul', $data);
    }

    function update($data, $where){
        return $this->db_update('ms_matkul', $data, $where);
    }
}