<?php

require_once __DIR__ . '/../vendor/autoload.php';

$app = new Silex\Application();

$app->get('/hello/{name}', function ($name) use ($app) {
    return 'Hello ' . $app->escape($name);
});
$app->get('/', function () use ($app) {
    return '<h1>Home</h1>';
});
$app->get('/system/{script}', function ($script) use ($app) {
    $filepath = "system/$script.php";
    if (file_exists($filepath)) {
        include $filepath;
    }
});
$app->get('/{controller}/{method}', function ($controller, $method) use ($app) {
    $object = ucfirst($controller);
    if (class_exists($object) && $class = new $object() && method_exists($class, $method)) {
        (new $class())->$method();
    } else {
        $app->abort(404, "Not Found, $object::$method");
    }
});

$app->run();
