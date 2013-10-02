<?php
class CmsUsersController extends AppController {
	public $helpers = array('Html', 'Form');
	public $components = array('Session');
	

	public function beforeFilter() {
		$roles = array(
			1 => 'Publisher',
			2 => 'Administrator',
			3 => 'Thought for the Day Upload',
			4 => 'Staff Handbook and Documents Upload'
		);
		$this->set('roles', $roles);
	}
	
	public function index() {
		$Authentication = new Authentication;
		$user = $this->CmsUser->findByUser($Authentication->Username());
		if ($user['CmsUser']['authlevel'] <2) {
			$this->redirect(array('controller' => 'CmsUsers', 'action' => 'accessdenied'));
		}
		$this->set('title', 'CMS Users');
		$cmsusers = $this->CmsUser->getUsers();
		$this->set('cmsusers', $data);
	}
	
	public function accessdenied() {
		$this->set('title', 'Access Denied');
	}
	
	public function add() {
		$Authentication = new Authentication;
		$user = $this->CmsUser->findByUser($Authentication->Username());
		if ($user['CmsUser']['authlevel'] <2) {
			$this->redirect(array('controller' => 'CmsUsers', 'action' => 'accessdenied'));
		}
		
		$this->set('title', 'Add CMS user');
		if ($this->request->is('post')) {
			if ($this->CmsUser->save($this->request->data)) {
				$this->Session->setFlash('
					<div class="alert alert-success">
						<button class="close" data-dismiss="alert">&times;</button>
						CMS user added successfully.
					</div>
			');
			$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('
					<div class="alert alert-warning">
						<button class="close" data-dismiss="alert">&times;</button>
						Unable to add the CMS user. Please make sure that you have filled out all fields correctly.
					</div>
				');
			}
		}
	}
	
	public function edit($id) {
		$Authentication = new Authentication;
		$user = $this->CmsUser->findByUser($Authentication->Username());
		if ($user['CmsUser']['authlevel'] <2) {
			$this->redirect(array('controller' => 'CmsUsers', 'action' => 'accessdenied'));
		}
		
		$this->set('title', 'Edit CMS User');
		$this->CmsUser->id = $id;
		if ($this->request->is('get')) {
			$this->request->data = $this->CmsUser->read();
		} else {
			if($this->CmsUser->save($this->request->data)) {
				$this->Session->setFlash('
					<div class="alert alert-success">
						<button class="close" data-dismiss="alert">&times;</button>
						CMS user updated successfully.
					</div>
				');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('
					<div class="alert alert-error">
						<button class="close" data-dismiss="alert">&times;</button>
						Unable to update the CMS user. Please make sure that you have filled out all fields correctly.
					</div>
				');
			}
		}
	}
	
	public function delete($id) {
		$Authentication = new Authentication;
		$user = $this->CmsUser->findByUser($Authentication->Username());
		if ($user['CmsUser']['authlevel'] <2) {
			$this->redirect(array('controller' => 'CmsUsers', 'action' => 'accessdenied'));
		}
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		if ($this->CmsUser->delete($id)) {
			$this->Session->setFlash('
				<div class="alert alert-success">
					<button class="close" data-dismiss="alert">&times;</button>
					CMS user deleted successfully.
				</div>
			');
			$this->redirect(array('action' => 'index'));
		}
	}
}