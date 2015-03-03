<?php

$loader = require_once __DIR__ . '/../vendor/autoload.php';
$loader->add('Acc', __DIR__ . '/../src');

$app = new Silex\Application();

require __DIR__ . '/../resources/config/config.php';

if (!$app['session']->get('user')) {
    $app['session']->set('user', new \Acc\Entity\User());
}

$app->match('/', function () use ($app) {
    return $app['twig']->render('hello.twig', array(
    ));
});
$app->match('/system/{script}', function ($script) use ($app) {
    $filepath = "system/$script.php";
    if (file_exists($filepath)) {
        include $filepath;
    }
});
$app->match('/{object}/{action}', function ($object, $action) use ($app) {
    $controller = "Acc\Controller\\" . ucfirst($object) . "Controller";
    $method = $action . "Action";
    if (class_exists($controller) && method_exists($controller, $method)) {
        return (new $controller($app))->$method();
    } else {
        return $app->abort(404, "Not Found, $controller::$method");
    }
});

$app->run();
