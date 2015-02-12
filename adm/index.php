<?php

require '../core/autoload.php';

Config::loadFile('../cfg/config.ini');

Db::init();

$user = 'admin';

Router::init();
Router::map('^/$', function() use ($user) {
    echo "<h1>Home - $user</h1>";
});
Router::map('/system/(.*)', function($script) {
    $filepath = "system/$script.php";
    if (file_exists($filepath)) {
        include $filepath;
    }
});
Router::map('(login|logout)$', function($methodAction) {
    (new \Manager\UserManager())->$methodAction();
});
Router::map('/(\w+)/(\w+)', function($controller, $methodAction) {
    $object = ucfirst($controller);
    var_dump($object, class_exists($object));
    if (class_exists($object) && $class = new $object() && method_exists($class, $methodAction)) {
        (new $class())->$methodAction();
    } else {
        echo "pas glop";
    }
});
Router::run();
