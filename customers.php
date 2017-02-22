<?php

require_once "init.php";

$app->title = "Customers";

$grid = new \atk4\ui\Grid();
$grid->setModel(new \Demo\Model\Contact($appdb));

$app->add($grid);



$app->run();