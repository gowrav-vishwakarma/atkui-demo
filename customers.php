<?php

require_once "init.php";

$app->title = "Customers";

$grid = new \atk4\ui\Grid();
$grid->add(new \Demo\Model\Contact());

$app->add($grid);



$app->run();