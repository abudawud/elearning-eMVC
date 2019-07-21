<?php if ( ! defined('ROOT')) exit('No direct script access allowed');

class m_login extends C_Model{
    function get($user, $password){
        $sql = "SELECT * FROM v_pengguna WHERE user = '$user' AND password = '$password'";
        return $this->db->query($sql)->fetch_object();
    }
}