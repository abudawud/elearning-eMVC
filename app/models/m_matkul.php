<?php if ( ! defined('ROOT')) exit('No direct script access allowed');

class m_matkul extends C_Model{
    function gets(){
        $sql = "SELECT * FROM ms_matkul";
        $res = $this->db->query($sql);
        return $this->results($res);
    }
}