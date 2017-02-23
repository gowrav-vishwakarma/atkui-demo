<?php

namespace Demo\View;

class Modal extends \atk4\ui\View {

	public $defaultTemplate = './templates/view/modal.html';

	function addAction($action,$defaults=[]){
		$this->add(new \atk4\ui\Button($action,$defaults),'actions');
	}

}