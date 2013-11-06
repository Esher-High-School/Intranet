<?phpclass StaffBulletinsController extends AppController {	public $helpers = array('Html', 'Form');		var $uses = array('StaffBulletin', 'CmsUser');		public function display() {		// Search		if (isset($_POST['query'])) {			$sp = h($_POST['sp']);			$query = ($_POST['query']);			$searchprovideruri = array(				'google' => 'http://google.co.uk/search?q=',				'wikipedia' => 'http://en.wikipedia.org/w/index.php?search=',				'wolframalpha' => 'http://www.wolframalpha.com/input/?i='			);			if (isset($searchprovideruri[$sp])) {				$this->redirect($searchprovideruri[$sp] . $query);			}		}		// Staff Bulletins		$this->set('title', 'Staff Bulletins');		$this->set('latestbulletin', $this->StaffBulletin->find('first',			array('order' => array('created' => 'desc'))));		$this->set('bulletins', $this->StaffBulletin->find('all', 			array('limit' => 5, 'order' => array('created' => 'desc'))));	}	public function index() {		$this->set('title', 'All Staff Bulletins');		$this->set('bulletins', $this->StaffBulletin->find('all'));	}		public function view($id = null) {		$this->StaffBulletin->id = $id;		$staffbulletin = $this->StaffBulletin->read();		$this->set('title', $staffbulletin['StaffBulletin']['title']);		$this->set('bulletin', $staffbulletin);	}		public function add() {		$Authentication = new Authentication;		$cmsuser = $this->CmsUser->findByUser($Authentication->Username());		if ($cmsuser == null) {			$this->redirect(array('controller' => 'cmsusers', 'action' => 'accessdenied'));		}		$this->set('cmsuser', $cmsuser);		$this->set('title', 'Add Staff Bulletin');		$published[0] = 'Draft';		$published[1] = 'Published';		$this->set('published', $published);		if ($this->request->is('post')) {			if ($this->StaffBulletin->save($this->request->data)) {				$this->Session->setFlash('					<div class="alert alert-success">						<button class="close" data-dismiss="alert">&times;</button>						Your bulletin has been added successfully.					</div>				');				$this->redirect(array('action' => 'display'));			} else {				$this->Session->setFlash('					<div class="alert alert-error">						<button class="close" data-dismiss="alert">&times;</button>						Unable to add your bulletin. Please make sure that you have filled out all fields correctly. If the problem persists, please contact ICT support.					</div>				');			}		}	}		public function edit($id) {		$Authentication = new Authentication;		$cmsuser = $this->CmsUser->findByUser($Authentication->Username());		if ($cmsuser == null) {			$this->redirect(array('controller' => 'cmsusers', 'action' => 'accessdenied'));		}		$this->set('title', 'Edit Staff Bulletin');		$published[0] = 'Draft';		$published[1] = 'Published';		$this->set('published', $published);		$this->StaffBulletin->id = $id;		if ($this->request->is('get')) {			$this->request->data = $this->StaffBulletin->read();		} else {			if ($this->StaffBulletin->save($this->request->data)) {				$this->Session->setFlash('					<div class="alert alert-success">						<button class="close" data-dismiss="alert">&times;</button>						Bulletin updated successfully.					</div>				');				$this->redirect(array('action' => 'view', $id));			} else {				$this->Session->setFlash('					<div class="alert alert-error">						<button class="close" data-dismiss="alert">&times;</button>						An error occured when trying to update your bulletin. Please check that all fields are updated. If problems persist, contact ICT support.					</div>				');			}		}	}		public function delete($id) {		if ($this->request->is('get')) {			throw new MethodNotAllowedException();		}		if ($this->StaffBulletin->delete($id)) {			$this->Session->setFlash('				<div class="alert alert-success">					<button class="close" data-dismiss="alert">&times;</button>					Bulletin deleted successfully.				</div>			');			$this->redirect(array('action' => 'index'));		}	}}