<?php

class Order extends Document {
    function init(){
        parent::init();

        $this->addCondition('type','SalesInvoice');

        $j_order = $this->join('invoice.document_id');
        $j_order->addField('price', ['type'=>'mone']);
        $j_order->addField('qty', ['type'=>'real']);

        $this->addExpression('total', ['[price] * [qty]', 'type'=>'money']);
    }
}
