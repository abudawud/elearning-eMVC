<?php if ( ! defined('ROOT')) exit('No direct script access allowed');

class m_dosen extends C_Model{
    function get($id = 0){
        $sql = "SELECT * FROM dosen WHERE id_dosen = $id";
        return $this->db->query($sql)->fetch_row();
    }
}