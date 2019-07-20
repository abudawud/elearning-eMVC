<?php if ( ! defined('ROOT')) exit('No direct script access allowed');

class m_ampu extends C_Model{
    function add($data){
        return $this->db_insert('dosen_teachs', $data);
    }
}