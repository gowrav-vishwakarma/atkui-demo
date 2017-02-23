<?php

namespace Demo\Model;

/* 
	Details Model

	Generic Model to store all similer type of data in same table
	Like Qutation, SalesOrder, SalesInvoices, Purchase Order, Purchase Invoices etc.
	All have very same type of fields differenciated by type field
	This way they all will have unique primary key also,
	So, no mess if we use any id as foreign key, it will always be required data row

	QSP :: Qutation, Sales, Purchase
*/

class QSPDetail extends \atk4\data\Model {
	
	public $table = "qsp_master";

	function init(){
		parent::init();

		$this->hasOne('QSPMaster');
		$this->hasOne('Item');
		$this->addField('rate');
		$this->addField('quantity');
		$this->addField('tax_percentage');

		$this->addExpression('amount_excluding_tax')->set(function($m,$q){
			return $q->expr('[rate]*[quantity]');
		});

		$this->addExpression('tax_amount')->set('round([tax_percentage] * [amount_excluding_tax] / 100,2)');

		$this->addExpression('total_amount')->set('[amount_excluding_tax]+[tax_amount]');

	}
}