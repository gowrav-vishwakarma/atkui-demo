<?php


// class Contact extends SQL {
class Model_Customer extends Model_Contact {
	
	function init(){
		parent::init();

		$this->addCondition('type','Customer');
	}
}