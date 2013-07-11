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
	var $uses = array('CmsUser');
	
	public function beforeRender() {
		//Global Settings
		$this->loadModel('Setting');
		$global_settings = $this->Setting->getSettings();
		$this->set('global_settings', $global_settings);

		//Load user group models
		$this->loadModel('LearningMentor');
		$this->loadModel('Smt');
		$this->loadModel('Link');
		$this->loadModel('Hoy');
		$this->loadModel('Tutor');
		$this->loadModel('Hod');
		$this->loadModel('IncidentUser');
		
		$Authentication = new Authentication;
		$authUser['username'] = $Authentication->Username();
		$this->set('authUser', $authUser);
		$this->set('username', $authUser['username']);
		
		$cmsuser = $this->CmsUser->findByUser($Authentication->Username());
		$learningmentor = $this->LearningMentor->findByUsername($Authentication->Username());
		$smt = $this->Smt->findByUsername($Authentication->Username());
		
		$hoy = $this->Hoy->getHoyYears($Authentication->Username());
		
		$tutor = $this->Tutor->findByUsername($Authentication->Username());
		$hod = $this->Hod->getHodDepts($Authentication->Username());
		$incidentuser = $this->IncidentUser->findByUsername($Authentication->Username());
		
		if (isset($cmsuser)) {
			$this->set('cmsuser', $cmsuser);
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
		
		$links = $this->Link->find('all', array('order' => 'menu ASC'));
		$this->set('links', $links);
	}
}