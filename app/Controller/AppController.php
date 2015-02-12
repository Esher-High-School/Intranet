<?php
// Application Controller
class AppController extends Controller {
	var $uses = array('User');

	public $components = array('basicAuth');
	public function beforeFilter() {
		$this->set('title', '');
	}

	public function beforeRender() {
		//Global Settings
		$this->loadModel('Setting');
		$global_settings = $this->Setting->getSettings();
		$this->set('global_settings', $global_settings);

		// Load content for navigation
		$this->loadModel('Page');

		//Load user group models
		$this->loadModel('LearningMentor');
		$this->loadModel('Smt');
		$this->loadModel('Link');
		$this->loadModel('Hoy');
		$this->loadModel('Tutor');
		$this->loadModel('Hod');
		$this->loadModel('IncidentUser');

		// Authentication magic
		$username = $this->basicAuth->getUsername();
		$this->set('username', $username);

		$user = $this->User->findByUser($username);

		$ugroups['NoGroup'] = true;

		if (isset($user['Group'])) {
			foreach ($user['Group'] as $ugroup) {
				$ugroups[$ugroup['name']] = true;
			}
		}
		$this->set('ugroups', $ugroups);

		// Get group information
		$hoy = null;
		$tutor = null;
		$hod = null;
		$hoy = $this->Hoy->getHoyYears($username);
		$tutor = $this->Tutor->findByUsername($username);
		$hod = $this->Hod->getHodDepts($username);

		// Send it all to the view with this wonderful array of ifs
		if (isset($User)) {
			$this->set('User', $User);
		}

		$this->set('hoy', $hoy);
		$this->set('tutor', $tutor);
		$this->set('hod', $hod);

		// Navigation related magic
		$sidebarLinks = $this->Link->getSidebarLinks();
		$this->set('sidebarLinks', $sidebarLinks);

		$menu = $this->Link->getHeaderLinks();
		$this->set('headerlinks', $menu);

		$pages = $this->Page->getPages();
		$this->set('pages', $pages);
	}
}
