<?php


namespace Demo\Model;

class SQL extends \atk4\data\Model {
	
	public function __construct( $defaults = []){
		global $appdb;		
		parent::__construct($appdb, $defaults);
	}
}