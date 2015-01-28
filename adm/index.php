<?php

require '../core/autoload.php';

Config::loadFile('../cfg/config.ini');

Db::init();

$user = 'admin';

Router::init();
Router::map('/foo.*', function() {
    echo '<h1>FOOOOOO</h1>';
});
Router::map('/', function() use ($user) {
    echo "<h1>Home - $user</h1>";
});
Router::run();

// template

echo '<p>adm</p>';

