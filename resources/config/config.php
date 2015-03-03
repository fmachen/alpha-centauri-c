<?php

\Acc\Util\Config::loadFile(__DIR__ . '/config.ini');
\Acc\Util\Db::init();

$app['debug'] = true;
$app->register(new Silex\Provider\SessionServiceProvider());
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__ . '/../views',
));

