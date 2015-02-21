<?php

$loader = require_once __DIR__ . '/../vendor/autoload.php';
$loader->add('Acc', __DIR__ . '/../src');

\Acc\Util\Config::loadFile('../resources/config/config.ini');
\Acc\Util\Db::init();

$app = new Silex\Application();

$app['debug'] = true;

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__ . '/../resources/views',
));

$app->get('/', function () use ($app) {
    return '<h1>Home</h1>';
});
$app->get('/hello/{name}', function ($name) use ($app) {
    $user = new Acc\Entity\User();
    $manager = (new Acc\Controller\UserController())->loginAction();
    return $app['twig']->render('hello.twig', array(
                'name' => $name,
    ));
});
$app->get('/system/{script}', function ($script) use ($app) {
    $filepath = "system/$script.php";
    if (file_exists($filepath)) {
        include $filepath;
    }
});
$app->get('/{object}/{action}', function ($object, $action) use ($app) {
    $controller = "Acc\Controller\\" . ucfirst($object) . "Controller";
    $method = $action . "Action";
    if (class_exists($controller) && method_exists($controller, $method)) {
        return (new $controller())->$method();
    } else {
        return $app->abort(404, "Not Found, $controller::$method");
    }
});

$app->run();
