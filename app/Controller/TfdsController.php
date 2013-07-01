<?php
class TfdsController extends AppController {
	public $helpers = array('Html', 'Form');
	var $paginate = array (
		'limit' => 25,
		'order' => array(
			'Tfd.date' => 'desc'
		)
	);
	
	public function index() {
		$data = $this->paginate('Tfd');
		$this->set('tfds', $data);
	}

	public function edit($id) {
		$this->Tfd->date = $date;
	}
	
	public function upload() {
		
	}
	
	public function download($id) {
		$this->Tfd->id = $id;
		$file = $this->Tfd->read;
		$path = ('webroot/tftd' . $file['path']);
		$this->response->file($path);
		return $this->response;
	}
}
