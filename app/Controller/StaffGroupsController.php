<?php
class StaffGroupsController extends AppController {
	public $helpers = array('Html', 'Form');
	public $components = array('Session');

	public function index() {
		$this->set('title', 'Staff Groups List');

		$group[0] = $this->StaffGroup->getByType(0);
		$group[1] = $this->StaffGroup->getByType(1);
		$group[2] = $this->StaffGroup->getByType(2);

		$this->set('group', $group);
	}

	public function add() {
		$Authentication = new Authentication;

		$cmsuser = $this->CmsUser->findByUser($Authentication->Username());
		if ($cmsuser == null) {
			$this->redirect(array('controller' => 'CmsUsers', 'action' => 'accessdenied'));
		}
		$this->set('title', 'Add New Staff Group');
		if ($this->request->is('post')) {
			if ($this->StaffGroup->save($this->request->data)) {
				$this->Session->setFlash('
					<div class="alert alert-success">
						<button class="close" data-dismiss="alert">&times;</button>
						Staff group saved successfully.
					</div>
				');
			}
		}
	}
}