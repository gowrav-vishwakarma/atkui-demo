<?php


class View_Modal extends \atk4\ui\View {

	public $defaultTemplate = './templates/view/modal.html';

	function addAction($action,$defaults=[]){
		return $this->add(new \atk4\ui\Button($action,$defaults),'actions');
	}

}