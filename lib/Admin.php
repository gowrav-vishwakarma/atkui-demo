<?php


class Admin extends \atk4\ui\App {

    public $title = 'Agile UI - Demo Application';
    
    function init(){
        parent::init();

        $this->initLayout('Admin');

        $layout = $this->layout; 
        $layout->leftMenu->addItem(['Customers', 'icon'=>'users'], ['customers']);
        $layout->leftMenu->addItem(['Orders', 'icon'=>'money'], ['orders']);
    }

}
