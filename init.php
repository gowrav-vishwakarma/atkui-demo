<?php

require_once "./vendor/autoload.php";

$appdb = new \atk4\data\Persistence_SQL( \atk4\dsql\Connection::connect('mysql:dbname=atkui;host=localhost','root','winserver'));

$app= new Demo\Admin("Agile UI - Demo Application");
$app->init();
