<?php

class Router {

    private static $path = '';
    private static $queryString = '';
    private static $mapping = [];

    public static function init() {
        self::$path = self::_getRequestPath();
        self::$queryString = filter_input(INPUT_SERVER, 'QUERY_STRING');
    }

    private static function _getRequestPath() {
        $requestUri = filter_input(INPUT_SERVER, 'REQUEST_URI');
        $delimiter = strpos($requestUri, '?') ? strpos($requestUri, '?') : strlen($requestUri);
        $scriptDir = dirname(filter_input(INPUT_SERVER, 'SCRIPT_NAME'));
        return substr($requestUri, strlen($scriptDir), $delimiter);
    }

    public static function map($pattern, $closure) {
        self::$mapping[$pattern] = $closure;
    }

    public static function run() {
        foreach (self::$mapping as $pattern => $closure) {
            if (preg_match("#$pattern#", self::$path, $matches)) {
                array_shift($matches);
                return call_user_func_array($closure, $matches);
            }
        }
        throw new Exception('Route not Found');
    }

}
