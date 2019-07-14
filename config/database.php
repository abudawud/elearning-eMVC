<?php if ( ! defined('ROOT')) exit('No direct script access allowed');

require (ROOT . "config/private.php");

class Database {
    private static $db = null;
    private function __construct(){

    }
    
    public static function getDB(){
        if(is_null(self::$db)){
            self::$db = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_HOST_PORT);
        }

        return self::$db;
    }
}