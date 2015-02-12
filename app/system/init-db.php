<?php

$sql = DB::$sql->exec(file_get_contents("../cfg/init-db.sql"));

var_dump($sql);
