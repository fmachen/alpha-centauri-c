<?php

class Db {

    public static $sql;

    public static function init() {
        $conf = Config::get('mysql');
        if (!$conf) {
            throw new Exception('Config error: mysql section missing in config.ini');
        }
        self::$sql = new mysqli(
                $conf['host']
                , $conf['username']
                , $conf['password']
                , $conf['dbname']
                , $conf['port']
        );
        if (self::$sql->connect_error) {
            throw new Exception('Mysql error: (' . $mysqli->connect_errno . ') ' 
                    . $mysqli->connect_error);
        }
    }

}
