<?php
$user = $_SERVER['REMOTE_USER'];

class Authentication {
	public function isAdmin() {
		$user = $_SERVER['REMOTE_USER'];
		$adminList = array('jnichols', 'muddin', 'jbailey', 'hbartle', 'administrator', 'khyde', 'nbuchan', 'nbuckland', 'ekourea', 'ataylor', 'ajones');
		$admin = in_array($user, $adminList);
		if ($admin == true) {
			return true;
		} else {
			return false;
		}
	}
	public function Username() {
		$user = $_SERVER['REMOTE_USER'];
		return $user;
	}
}