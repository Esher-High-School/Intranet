<?php
class AdminsController extends AppController {
	public $helpers = array('Html', 'Form');
	public $components = array('Session');
	
	var $uses = array('User');
	
	public function index() {
		$this->set('title', 'Administration Home');
	}
}