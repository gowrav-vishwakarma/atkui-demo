<?php


/* 
	Master Model

	Generic Model to store all similer type of data in same table
	Like Qutation, SalesOrder, SalesInvoices, Purchase Order, Purchase Invoices etc.
	All have very same type of fields differenciated by type field
	This way they all will have unique primary key also,
	So, no mess if we use any id as foreign key, it will always be required data row

	QSP :: Qutation, Sales, Purchase
*/

class Model_QSPMaster extends \atk4\data\Model {
	
	public $table = "qsp_master";

	function init(){
		global $db;
		parent::init();

		$this->hasOne('customer_id','Customer')->addTitle();
		$this->hasOne('currency_id','Currency');
		$this->hasOne('nominal_id');

		$this->addField('number');
		// $this->addField('address');

		$this->addField('type',['enum'=>['Quotation','SalesInvoice','SalesOrder','PurhcaseOrder','PurchaseInvoice']]);

		// Not Working
		// $this->hasMany('QSPDetail', (new Model_QSPDetail($db)))
		// 	->addField('total_amount', ['aggregate'=>'sum', 'field'=>'amount_excluding_tax'])
		// 	->addField('tax_amount', ['aggregate'=>'sum', 'field'=>'tax_amount'])
		// 	;

		// Not WOrking
		// $this->hasMany('QSPDetail', (new Model_QSPDetail($db)))
		// 	->addFields([
		// 		['total_amount', ['aggregate'=>'sum', 'field'=>'amount_excluding_tax']],
		// 		['tax_amount', ['aggregate'=>'sum', 'field'=>'tax_amount']]
		// 		]);
	
		// Final workaround working
		$qsp_detail = $this->hasMany('QSPDetail', (new Model_QSPDetail($db)));
		$qsp_detail->addField('total_amount', ['aggregate'=>'sum', 'field'=>'amount_excluding_tax']);
		$qsp_detail->addField('tax_amount', ['aggregate'=>'sum', 'field'=>'tax_amount']);

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