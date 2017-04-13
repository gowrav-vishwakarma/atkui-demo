<?php

require "init.php";

$app->add(['Button', '<< Back'])->link('customers.php');

$customer = new Contact($db);

$form = $app->add('Form');
$form->setModel($customer);

if(isset($_GET['id'])) {
    $form->model->load($_GET['id']);
}

$form->onSubmit(function($f) {
    $f->model->save();
    return $f->success("Done",'Data saved');
});
