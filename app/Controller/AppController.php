<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
 
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
		
		// Load Users
		if (isset($user)) {
			if (
				$this->basicAuth->checkGroupMembership($user, 'Administrators')	
			) {
				$this->set('admin', true);
			}
			if (
				$this->basicAuth->checkGroupMembership($user, 'Publisher') or
				$this->basicAuth->checkGroupMembership($user, 'Administrators') or
				$this->basicAuth->checkGroupMembership($user, 'Handbook Publishers')
			) {
				$this->set('cmsuser', true);
			}
			if (
				$this->basicAuth->checkGroupMembership($user, 'Learning Mentors')
			) {
				$this->set('learningmentor', true);
			}
			if (
				$this->basicAuth->checkGroupMembership($user, 'SMT')
			) {
				$this->set('smt', true);
			}
		}
		
		// Get group information
		$hoy = $this->Hoy->getHoyYears($username);
		
		$tutor = $this->Tutor->findByUsername($username);
		$hod = $this->Hod->getHodDepts($username);
		$incidentuser = $this->IncidentUser->findByUsername($username);
		
		// Send it all to the view with this wonderful array of ifs
		if (isset($User)) {
			$this->set('User', $User);
		}
		if (isset($learningmentor)) {
			$this->set('learningmentor', $learningmentor);
		}
		if (isset($smt)) {
			$this->set('smt', $smt);
		}
		if (isset($hoy)) {
			$this->set('hoy', $hoy);
		}
		if (isset($tutor)) {
			$this->set('tutor', $tutor);
		}
		if (isset($hod)) {
			$this->set('hod', $hod);
		}
		if (isset($incidentuser)) {
			$this->set('incidentuser', $incidentuser);
		}
		
		// Navigation related magic
		$links = $this->Link->getSidebarLinks();
		$this->set('links', $links);

		$menu = $this->Link->getHeaderLinks();
		$this->set('headerlinks', $menu); 

		$pages = $this->Page->getPages();
		$this->set('pages', $pages);
	}
}
