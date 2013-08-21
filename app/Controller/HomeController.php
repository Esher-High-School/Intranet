<?php
class HomeController extends AppController {
	public function view() {
		$this->loadModel('StaffBulletin');
		$this->set('bulletins', $this->StaffBulletin->find('all'));
	}
}