<?php
class basicAuthComponent extends Component {
	function getUsername() {
		return $_SERVER['REMOTE_USER'];
	}

	function checkGroupMembership($user, $group) {
		$member = false;
		if (isset($user['Group'])) {
			foreach($user['Group'] as $uGroup) {
				if ($uGroup['name'] == $group) {
					$member = true;
				}
			}
			if ($member == true) {
				return true;
			} else {
				return false;
			}
		}
		return false;
	}
}