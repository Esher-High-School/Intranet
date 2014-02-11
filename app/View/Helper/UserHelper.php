<?php
class UserHelper extends Helper {
	function getUsername() {
		return $_SERVER['REMOTE_USER'];
	}

	function checkGroupMembership($user, $group) {
		foreach($user['Group'] as $group) {
			if ($group['name'] == $group) {
				return true;
			}
		}
		return false;
	}

	function accessDenied() {
		$this->redirect(array('controller' => 'users', 'action' => 'accessdenied'));
	}
}