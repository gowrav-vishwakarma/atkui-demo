<?php

require_once "init.php";

$app->title = "Customers";

$btn = $app->add(new \atk4\ui\Button("hello"));
$btn->js('click',$btn->js()->hide());


$app->run();