<?php


// class Contact extends SQL {
class Model_Contact extends \atk4\data\Model {
	
	public $table = "contact";

	function init(){
		parent::init();

		$this->addField('name',['mandatory'=>true]);
		$this->addField('address');
		$this->addField('type',['enum'=>['Customer','Supplier']]);
	}
}