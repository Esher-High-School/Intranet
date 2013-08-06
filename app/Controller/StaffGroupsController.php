<?php
class StaffGroupsController extends AppController {
	public $helpers = array('Html', 'Form');
	public $components = array('Session');

	public function beforeFilter() {
		$Authentication = new Authentication;

		$cmsuser = $this->CmsUser->findByUser($Authentication->Username());
		if ($cmsuser == null) {
			$this->redirect(array('controller' => 'CmsUsers', 'action' => 'accessdenied'));
		}
		$grouptypes = array(
			0 => 'Teaching Staff',
			1 => 'Non-Teaching Staff',
			2 => 'SLT Staff'
		);
		$this->set('grouptypes', $grouptypes);
	}

	public function index() {
		$this->set('title', 'Staff Groups List');

		$group[0] = $this->StaffGroup->getByType(0);
		$group[1] = $this->StaffGroup->getByType(1);
		$group[2] = $this->StaffGroup->getByType(2);

		$this->set('group', $group);
	}

	public function view($id) {
		$this->set('title', 'Viewing Staff Group');

		$this->StaffGroup->id = $id;

		$group = $this->StaffGroup->read();

		$this->set('group', $group);
	}

	public function add() {
		$this->set('title', 'Add New Staff Group');
		if ($this->request->is('post')) {
			if ($this->StaffGroup->save($this->request->data)) {
				$this->Session->setFlash('
					<div class="alert alert-success">
						<button class="close" data-dismiss="alert">&times;</button>
						Staff group saved successfully.
					</div>
				');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('
					<div class="alert alert-error">
						<button class="close" data-dismiss="alert">&times;</button>
						Unable to add your staff group. Please ensure that you have filled out all fields correctly.
					</div>
				');
			}
		}
	}

	public function edit($id) {
		$this->set('title', 'Edit Staff Group');
		$this->StaffGroup->id = $id;

		if ($this->request->is('get')) {
			$this->request->data = $this->StaffGroup->read();
		} else {
			if ($this->StaffGroup->save($this->request->data)) {
				$this->Session->setFlash('
					<div class="alert alert-success">
						<button class="close" data-dismiss="alert">
							Staff group updated successfully.
						</div>
					</div>
				');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('
					<div class="alert alert-warning">
						<button class="close" data-dismiss="alert">&times;</button>
						Unable to update staff group. Please ensure that you have filled out all fields correctly.
					</div>
				');
			}
		}
	}
}