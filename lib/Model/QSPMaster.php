<?php

namespace Demo\Model;

/* 
	Master Model

	Generic Model to store all similer type of data in same table
	Like Qutation, SalesOrder, SalesInvoices, Purchase Order, Purchase Invoices etc.
	All have very same type of fields differenciated by type field
	This way they all will have unique primary key also,
	So, no mess if we use any id as foreign key, it will always be required data row

	QSP :: Qutation, Sales, Purchase
*/

class QSPMaster extends \atk4\data\Model {
	
	public $table = "qsp_master";

	function init(){
		parent::init();

		global $db;

		$this->hasOne('customer_id','Customer')->addTitle();
		$this->hasOne('currency_id','Currency');
		$this->hasOne('nominal_id');

		$this->addField('number');
		// $this->addField('address');

		$this->addField('type',['enum'=>['Quotation','SalesInvoice','SalesOrder','PurhcaseOrder','PurchaseInvoice']]);

		$this->hasMany('QSPDetail', (new QSPDetail($db)))
		    ->addField('total_amount', ['aggregate'=>'sum', 'field'=>'amount_excluding_tax']);
		;

		return;

		$this->addExpression('total_amount',function($m,$q){
			$details = $m->refSQL('QSPDetails');
			return $details->sum('amount_excluding_tax');
		})->type('money');

		$qsp_master_j->addField('discount_amount')->defaultValue(0)->type('money');

		$this->addExpression('tax_amount', function($m,$q){
			$details = $m->refSQL('Details');
			return $q->expr("[0]", [$details->sum('tax_amount')]);
		})->type('money');

		$this->addExpression('net_amount')->set(function($m,$q){
			return $q->expr('round( ([0] - [1]) , 2 )',[$m->getElement('total_amount'), $m->getElement('discount_amount')]);
		})->type('money');

		$qsp_master_j->addField('due_date')->type('datetime')->defaultValue(null);
		$qsp_master_j->addField('priority_id');
		$qsp_master_j->addField('narration')->type('text');

		$qsp_master_j->addField('exchange_rate')->defaultValue(1);		
		$qsp_master_j->addField('tnc_text')->type('text')->defaultValue('');		
		$qsp_master_j->addField('round_amount')->defaultValue('0.00');
		

		$this->addExpression('net_amount_self_currency')->set(function($m,$q){
			return $q->expr('([0]*[1])',[$m->getElement('net_amount'), $m->getElement('exchange_rate')]);
		})->type('money');

	}
}