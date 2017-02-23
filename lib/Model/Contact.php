<?php

namespace Demo\Model;

// class Contact extends SQL {
class Contact extends \atk4\data\Model {
	
	public $table = "contact";

	function init(){
		parent::init();

		$this->addField('name',['mandatory'=>true]);
		$this->addField('address');
	}
}