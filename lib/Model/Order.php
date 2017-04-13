<?php

class Order extends Document {
    function init(){
        parent::init();

        $this->addCondition('type','SalesInvoice');
    }
}
