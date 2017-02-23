<?php


namespace Demo\Model;


class SQL extends \atk4\data\Model {
	
	public function __construct( $defaults = []){
		global $appdb;	
		$this->persistence = $appdb;	
		parent::__construct($appdb, $defaults);
	}

	// public function init(){
	// 	parent::init();
	// 	$this->app->db  = $this->persistence;
	// }
}