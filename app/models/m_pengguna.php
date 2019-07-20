<?php if ( ! defined('ROOT')) exit('No direct script access allowed');

class m_pengguna extends C_Model{
    function gets(){
        $sql = "SELECT * FROM ms_pengguna";
        $res = $this->db->query($sql);
        return $this->db_results($res);
    }

    function get($id = 0){
        $sql = "SELECT * FROM ms_pengguna WHERE id_pengguna = $id";
        return $this->db->query($sql)->fetch_object();
    }

    function add($data){
        return $this->db_insert('ms_pengguna', $data);
    }

    function update($data, $where){
        return $this->db_update('ms_pengguna', $data, $where);
    }
    function delete($id){
        $sql = "DELETE FROM ms_pengguna WHERE id_pengguna = $id";
        return $this->db->query($sql);
    }
}