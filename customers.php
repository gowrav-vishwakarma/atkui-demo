<?php

require_once "./vendor/autoload.php";
$db = new \atk4\data\Persistence_SQL( \atk4\dsql\Connection::connect('mysql:dbname=atkui;host=localhost','root','root'));

$app= new \atk4\ui\App('Agile UI - Demo Application');
$app->initLayout('Admin');

/** Define Menu */
$app->layout->leftMenu->addItem(['Customers', 'icon'=>'users'], ['customers']);
$app->layout->leftMenu->addItem(['Orders', 'icon'=>'money'], ['orders']);

/** Define Content */
$app->add(['Button', 'Add'])->link('customers-edit.php');

$grid = $app->layout->add('Table');
$grid->setModel(new Customer($db), false);

$grid->addColumn('name', new \atk4\ui\TableColumn\Link('customers-edit.php?id={$id}'));
$grid->addColumn('address');
$grid->addColumn('type');
$grid->addColumn('total');
