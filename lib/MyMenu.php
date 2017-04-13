<?php

class MyMenu extends \atk4\ui\Menu 
{
    function init() {
        parent::init();

        $layout->leftMenu->addItem(['Home', 'icon'=>'home'], ['index']);
        $layout->leftMenu->addItem(['Customers', 'icon'=>'users'], ['customers']);
        $layout->leftMenu->addItem(['Orders', 'icon'=>'users'], ['orders']);
        $layout->leftMenu->addItem(['Invoices', 'icon'=>'users'], ['invoices']);

    }
}
