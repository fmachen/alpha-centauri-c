<?php

namespace Acc\Util;

class Config {

    private static $_config;

    public static function loadFile($filepath) {
        self::$_config = parse_ini_file($filepath, true);
    }

    public static function get($name) {
        return isset(self::$_config[$name]) ? self::$_config[$name] : null;
    }

}
