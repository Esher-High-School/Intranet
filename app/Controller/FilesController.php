<?php
class FilesController extends AppController {
	public $helpers = array('Html', 'Form');
	public $components = array('Session');
	
	var $uses = array('CmsUser');
	
    public function beforeFilter() {   
		parent::beforeFilter();
	}
	
	public function index() {
		$Authentication = new Authentication;
		$user = $this->CmsUser->findByUser($Authentication->Username());
		if ($user['CmsUser']['authlevel'] <1) {
			$this->redirect(array('controller' => 'CmsUsers', 'action' => 'accessdenied'));
		}
		
		$this->set('title', 'File Manager');
	}
}