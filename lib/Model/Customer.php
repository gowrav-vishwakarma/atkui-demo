<?php


// class Contact extends SQL {
class Model_Customer extends Contact {
	
	function init(){
		parent::init();

		$this->addCondition('type','Customer');
	}
}