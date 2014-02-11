<?php
class basicAuthComponent extends Component {
	function getUsername() {
		return $_SERVER['REMOTE_USER'];
	}

	function checkGroupMembership($user, $group) {
		foreach($user['Group'] as $group) {
			if ($group['name'] == $group) {
				$member = true;
			}
		}
		if ($member == true) {
			return true;
		} else {
			return false;
		}
	}
}