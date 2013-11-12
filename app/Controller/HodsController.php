<?php
class HodsController extends AppController {
	public $helpers = array('Html', 'Form');
	public $components = array('Session');
	
	var $uses = array('Hod', 'Subject', 'CmsUser');
	
	var $paginate = array(
		'fields' => array('Hod.id', 'Hod.username', 'Hod.dept'),
		'maxLimit' => 2000,
		'limit' => 2000,
		'order' => array(
			'Hod.dept' => 'asc'
		)
	);
	
	public function beforeFilter() {
		$Authentication = new Authentication;
		$cmsuser = $this->CmsUser->findByUser($Authentication->Username());
		if ($cmsuser['CmsUser']['authlevel'] <2 ) {
			$this->redirect(array('controller' => 'cmsusers', 'action' => 'accessdenied'));
		}
	}
	
	public function index() {
		$this->set('title', 'Listing HoDs');
		$data = $this->paginate('Hod');
		$this->set('hods', $data);
	}
	
	public function add() {
		$this->set('title', 'Add Head of Department');
		
		$subjects = $this->Subject->getSubjects();
		$this->set('subjects', $subjects);

		$this->set('Add New Head of Department');
		if ($this->request->is('post')) {
			if ($this->Hod->save($this->request->data)) {
				$this->Session->setFlash('
					<div class="alert alert-success">
						<button class="close" data-dismiss="alert">&times;</button>
						<p>Head of Department added successfully.</p>
					</div>
				');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('
					<div class="alert alert-error">
						<button class="close" data-dismiss="alert">
							&times;
						</button>
						Unable to add Head of Year. Please make sure that you have filled out all fields correctly.
					</div>
				');
			}
		}
	}
	
	public function edit($id = null) {
		$this->set('title', 'Edit Head of Department');
		$this->Hod->id = $id;
		if ($this->request->is('get')) {
			$this->request->data = $this->Hod->read();
		} else {
			if($this->Hod->save($this->request->data)) {
				$this->Session->setFlash('
					<div class="alert alert-success">
						<button class="close" data-dismiss="alert">&times;</button>
						<p>Head of Department saved successfully.</p>
					</div>
				');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('
					<div class="alert alert-warning">
						<button class="close" data-dismiss="alert">&times;</button>
						<p>Unable to update head of department. Please confirm that you have entered all details correctly.</p>
					</div>
				');
			}
		}
	}
	
	public function delete($id) {
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		if ($this->Hod->delete($id)) {
			$this->Session->setFlash('
				<div class="alert alert-success">
					<button class="close" data-dismiss="alert">&times;</button>
					<p>Head of Department deleted successfully.</p>
				</div>
			');
			$this->redirect(array('action' => 'index'));
		}
		
	}
}