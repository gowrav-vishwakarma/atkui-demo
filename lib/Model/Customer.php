<?php

namespace Demo\Model;

// class Contact extends SQL {
class Customer extends Contact {
	
	function init(){
		parent::init();

		$this->addCondition('type','Customer');
	}
}