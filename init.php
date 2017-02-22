<?php

require_once "./vendor/autoload.php";

// ==== This Runs ==== Without calling run() method 
// $app = new \atk4\ui\App('Agile UI - Demo Suite', ['icon'=>'user']);
// $app->initLayout('Admin');
// $layout = $app->layout; 
// $layout->leftMenu->addItem(['Welcome Page', 'icon'=>'gift'], ['index']);

require_once "lib/Admin.php";
$app= new Admin("Agile UI - Demo Application");
$app->init();



// DUE TO \atk4\ui\App line 138 html propery