<?php
class HandbookController extends AppController {
	public $helpers = array('Html', 'Form', 'Fck');
	public $components = array('Session');

	public function home() {
		$this->layout = 'handbook';
	}
}