<?php
require_once "./vendor/autoload.php";
$db = new \atk4\data\Persistence_SQL( \atk4\dsql\Connection::connect('mysql:dbname=atkui;host=localhost','root','root'));

// Move app logic into Admin class
$app = new Admin();
$app->init();

// move UI logic into Component
$my_crud = new \atk4\ui\CRUD();
$app->add($my_crud);
$my_crud->setModel(new Order($db), ['ref','contact','price','qty','total']);
