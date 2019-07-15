<?php if ( ! defined('ROOT')) exit('No direct script access allowed');

class C_Model {
    function __construct()
    {
        $this->db = Database::getDB();
    }

    function results($res){
        $data = array();
        while($record = $res->fetch_object()){
            array_push($data, $record);
        }

        return $data;
    }
}