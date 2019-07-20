<?php if ( ! defined('ROOT')) exit('No direct script access allowed');

class m_dosen extends C_Model{
    function gets(){
        $sql = "SELECT * FROM ms_dosen";
        $res = $this->db->query($sql);
        return $this->db_results($res);
    }

    function get($id = 0){
        $sql = "SELECT * FROM ms_dosen WHERE id_dosen = $id";
        return $this->db->query($sql)->fetch_object();
    }

    function add($data){
        return $this->db_insert('ms_dosen', $data);
    }

    function update($data, $where){
        return $this->db_update('ms_dosen', $data, $where);
    }

    function delete($id){
        $sql = "DELETE FROM ms_dosen WHERE id_dosen = $id";
        return $this->db->query($sql);
    }
}