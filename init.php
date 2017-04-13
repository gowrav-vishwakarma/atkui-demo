<?php

require_once "./vendor/autoload.php";

$db = new \atk4\data\Persistence_SQL( \atk4\dsql\Connection::connect('mysql:dbname=atkui;host=localhost','root','root'));

$app= new Admin("Agile UI - Demo Application");
$app->init();
