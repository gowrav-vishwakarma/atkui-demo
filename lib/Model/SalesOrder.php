<?php


namespace Demo\Model;

class SalesOrder extends QSPMaster {
	function init(){
		parent::init();

		$this->addCondition('type','SalesInvoice');
	}
}