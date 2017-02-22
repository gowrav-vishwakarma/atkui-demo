<?php

namespace Demo\Model;

class Contact extends SQL {
	
	public $table = "contact";

	function init(){
		parent::init();

		$this->addField('name');
	}
}