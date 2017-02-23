<?php


namespace Demo\Model;


class SQL extends \atk4\data\Model {
	use \atk4\core\AppScopeTrait;
    use \atk4\core\FactoryTrait;
	
	public function __construct( $defaults = []){
		global $db;
		$this->persistence = $db;	
		parent::__construct($db, $defaults);
	}

	public function init(){
		parent::init();
		$this->app->db  = $this->persistence;
	}
}