<?php
class SettingsController extends AppController {
	public $helpers = array('Html', 'Form');
	public $components = array('Session', 'Security');

	var $uses = array('Setting', 'CmsUser');

	public function beforeFilter() {
		$Authentication = new Authentication;
		$cmsuser = $this->CmsUser->findByUser($Authentication->Username());
		if (!isset($cmsuser['CmsUser'])) {
			$this->redirect(array('controller' => 'CmsUser', 'action' => 'accessdenied'));
		} elseif ($cmsuser['CmsUser']['authlevel'] == 3) {
			$this->redirect(array('controller' => 'CmsUser', 'action' => 'accessdenied'));
		}
	}

	public function index() {
		$this->set('title', 'Settings');
		$settings = $this->Setting->listSettings();
		$this->set('settings', $settings);
	}

	public function add() {
		$this->set('title', 'Add New Setting');
		if ($this->request->is('post')) {
			if ($this->Setting->save($this->request->data)) {
				$this->Session->setFlash('
					<div class="alert alert-success">
						<button class="close" data-dismiss="alert">&times;</button>
						Setting added successfully.
					</div>
				');
				$this->redirect(array('action' => 'index'));
			}
		}
	}

	public function edit($id){ 
		$this->set('title', 'Edit Setting');
		$this->Setting->id = $id;
		if ($this->request->is('get')) {
			$this->request->data = $this->Setting->read();
		} else {
			if ($this->Setting->save($this->request->data())) {
				$this->Session->setFlash('
					<div class="alert alert-success">
						<button class="close" data-dismiss="alert">&times;</button>
						Setting updated successfully.
					</div>
				');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('
					<div class="alert alert-error">
						<button class="close" data-dismiss="alert">&times;</button>
						Unable to add setting. Please make sure that you have filled out all fields. 
					</div>
				');
			}
		}
	}

	public function delete($id) { 
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		if ($this->Setting->delete($id)) {
			$this->Session->setFlash('
				<div class="alert alert-success">
					<button class="close" data-dismiss="alert">&times;</button>
					Setting deleted successfully.
				</div>
			');
		}
	}
}