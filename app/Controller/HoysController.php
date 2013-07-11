<?php
class HoysController extends AppController {
	public $helpers = array('Html', 'Form');
	public $components = array('Session', 'Security');
	
	var $uses = array('Hoy', 'CmsUser');
	
	var $paginate = array(
		'fields' => array('Hoy.id', 'Hoy.username', 'Hoy.year'),
		'maxLimit' => 2000,
		'limit' => 2000,
		'order' => array(
			'Hoy.year' => 'asc'
		)
	);
	
	public function index() {
		$Authentication = new Authentication;
		$cmsuser = $this->CmsUser->findByUser($Authentication->Username());
		if ($cmsuser == null) {
			$this->redirect(array('controller' => 'CmsUsers', 'action' => 'accessdenied'));
		}
		$this->set('title', 'Listing HoYs');
		$data = $this->paginate('Hoy');
		$this->set('hoys', $data);
	}
	
	public function add() {
		$Authentication = new Authentication;
		$cmsuser = $this->CmsUser->findByUser($Authentication->Username());
		if ($cmsuser == null) {
			$this->redirect(array('controller' => 'CmsUsers', 'action' => 'accessdenied'));
		}
		$this->set('title', 'Add New Head of Year');
		if ($this->request->is('post')) {
			if ($this->Hoy->save($this->request->data)) {
				$this->Session->setFlash('
					<div class="alert alert-success">
						<button class="close" data-dismiss="alert">&times;</button>
						Head of Year saved successfully.
					</div>
				');
				$this->redirect(array('action' => 'index'));
			}
		}
	}
	
	public function edit($id) {
		$Authentication = new Authentication;
		$cmsuser = $this->CmsUser->findByUser($Authentication->Username());
		if ($cmsuser == null) {
			$this->redirect(array('controller' => 'CmsUsers', 'action' => 'accessdenied'));
		}
		$this->set('title', 'Edit Head of Year');
		$this->Hoy->id = $id;
		if ($this->request->is('get')) {
			$this->request->data = $this->Hoy->read();
		} else {
			if ($this->Hoy->save($this->request->data)) {
				$this->Session->setFlash('
					<div class="alert alert-success">
						<button class="close" data-dismiss="alert">&times;</button>
						Head of Year updated successfully.
					</div>
				');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('
					<div class="alert alert-warning">
						<button class="close" data-dismiss="alert">&times;</button>
						Unable to update head of year. Please confirm that you have entered all details correctly.
					</div>
				');
			}
		}
	}
	
	public function delete($id) {
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		if ($this->Hoy->delete($id)) {
			$this->Session->setFlash('
				<div class="alert alert-success">
					<button class="close" data-dismiss="alert">&times;</button>
					Head of Year deleted successfully.
				</div>
			');
			$this->redirect(array('action' => 'index'));
		}
	}
}