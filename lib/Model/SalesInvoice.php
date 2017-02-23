<?php


namespace Demo\Model;

class SalesInvoice extends QSPMaster {
	function init(){
		parent::init();

		$this->addCondition('type','SalesInvoice');
	}
}