<?php


class Customer extends Contact {

    function init(){
        parent::init();

        $this->addCondition('type','Customer');

        $this->hasMany('Orders', new Order())
            ->addField('total', ['aggregate'=>'sum', 'type'=>'money']);
    }
}
