<?php

// more information: http://www.php-fig.org/psr/psr-0/

set_include_path(
        get_include_path()
        . PATH_SEPARATOR . __DIR__
        . PATH_SEPARATOR . __DIR__ . DIRECTORY_SEPARATOR . 'Util'
);

spl_autoload_register(function ($className) {
    $class = ltrim($className, '\\');
    $fileName = '';
    $namespace = '';
    if ($lastNsPos = strripos($class, '\\')) {
        $namespace = substr($class, 0, $lastNsPos);
        $class = substr($class, $lastNsPos + 1);
        $fileName = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $class) . '.php';

    require $fileName;
});
