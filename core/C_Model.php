<?php if ( ! defined('ROOT')) exit('No direct script access allowed');

class C_Model {
    function __construct()
    {
        $this->db = Database::getDB();
    }

    function db_results($res){
        $data = array();
        while($record = $res->fetch_object()){
            array_push($data, $record);
        }

        return $data;
    }

    function db_insert($table, $data){
        $fields = implode(', ', array_keys($data));
        $value = "'" . implode("','", $data) . "'";
        $sql = "INSERT INTO $table ($fields) VALUE ($value)";
        $res = $this->db->query($sql);
        if(!$res){
            echo $this->db->error;
            echo "<br>SQL: $sql";
            die();
        }
        return $res;
    }

    function db_update($table, $data, $where = null){
        $sets = array();
        $wheres = array();
        foreach ($data as $key => $value) {
            array_push($sets, "$key = '$value'");
        }

        foreach ($where as $key => $value) {
            array_push($wheres, "$key = $value");
        }

        $sets = implode(', ', $sets);
        $where = count($where) ? "WHERE " . implode(' AND ', $wheres) : '';
        $sql = "UPDATE $table SET $sets $where";
        $res = $this->db->query($sql);
        if(!$res){
            echo $this->db->error;
            echo "<br>SQL: $sql";
            die();
        }
        return $res;
    }
}