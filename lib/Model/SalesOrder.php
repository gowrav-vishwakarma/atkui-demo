<?php



class Model_SalesOrder extends Model_QSPMaster {
	function init(){
		parent::init();

		$this->addCondition('type','SalesInvoice');
	}
}