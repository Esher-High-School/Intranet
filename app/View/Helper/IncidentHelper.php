<?php
class IncidentHelper extends Helper {
	function problemFormat($problem) {
		if ($problem == 'na') {
			return 'N/A';
		} else {
			return $problem;
		}
	}

	function actionFormat($action) {
		if ($action == 'na') {
			return 'None';
		} else {
			return $action;
		}
	}

	function usernameFormat($username) {
		$username = (
			strtoupper(substr($username, 0, 1)) .
			' ' .
			ucfirst(strtolower(substr($username, 1)))
		);
		return ($username);
	}
}