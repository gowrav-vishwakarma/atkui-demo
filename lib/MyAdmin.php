<?php


class MyAdmin extends \atk4\ui\App {
    
    function init(){
        parent::init();

        $this->initLayout('Admin');

        $layout = $this->layout; 
        $layout->leftMenu->addItem(['Home', 'icon'=>'home'], ['index']);
        $layout->leftMenu->addItem(['Customers', 'icon'=>'users'], ['customers']);
        $layout->leftMenu->addItem(['Orders', 'icon'=>'users'], ['orders']);
        $layout->leftMenu->addItem(['Invoices', 'icon'=>'users'], ['invoices']);
    }

}
