<?php

namespace Acc\Util;

class Db {

    /**
     *
     * @var \PDO
     */
    public static $sql;

    public static function init() {
        $conf = Config::get('mysql');
        if (!$conf) {
            throw new Exception('Config error: mysql section missing in config.ini');
        }
        try {
            self::$sql = new \PDO($conf['dsn'], $conf['username'], $conf['password']);
        } catch (PDOException $e) {
            throw new Exception('Connection failed: ' . $e->getMessage());
        }
    }

}
