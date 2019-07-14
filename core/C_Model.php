<?php if ( ! defined('ROOT')) exit('No direct script access allowed');

class C_Model {
    function __construct()
    {
        $this->db = Database::getDB();
    }
}