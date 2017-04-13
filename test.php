<?php
require_once "./vendor/autoload.php";
$appdb = new \atk4\data\Persistence_SQL( \atk4\dsql\Connection::connect('mysql:dbname=atkui;host=localhost','root','root'));
/*

$app= new \atk4\ui\App("Agile UI - Demo Application");
$app->initLayout('Centered');
$f = $app->add('Form');
$f->setModel(new Model_Customer($appdb))->load(4);

$f->onSubmit(function($f){ 
    var_dump($f->model->dirty);
    $f->model->save();
    var_dump($f->model['name']);
    //return $f->success('ok');
});


//$app->layout->add('Form');
 */
class Client extends \atk4\data\Model {
  	public $table = 'contact';
  
  	function init() {
      	parent::init();
      	
      	$this->addField('name');
      	$this->addField('address');
  	}
}

$app = new \atk4\ui\App('My First App');
$app->initLayout('Centered');

$segment = $app->layout->add(['View', 'ui'=>'segment'])
    ->addClass('red inverted');

$segment->add('Button')->set('Button in a Segment');



exit;

$grid = $app->layout->add(['Form']);
$grid->setModel(new Client($appdb))->tryLoadAny();

$grid->onSubmit(function($f) {
    $f->model->save();
    return $f->success('Record updated');
});


