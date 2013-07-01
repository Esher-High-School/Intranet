<?php
$cake = true;
$user=$_SERVER['REMOTE_USER'];
$_SERVER["AUTH_USER"]=$user;

/* User Authentication Fix */
if ($user !== '') {
	if (is_numeric(substr($user, 0, 2))) {
		$this->element('access-denied', array('user', $user));
		die;		
	} elseif(substr($user, 0, 6) == 'rmuser') {
		$this->element('access-denied', array('user', $user));
		die;
	}
} else {
	$this->element('access-denied', array('user', $user));
	die;
}

if (isset($title)) {
	$showTitle = ($title . ' - Staff Intranet');
} else {
	$showTitle = 'Staff Intranet';
}
echo $this->element('header', array('showTitle' => $showTitle));
echo $this->element('topmenu', array('user' => $user));
if ($this->params['controller'] == 'incidents') {
	if (isset($smt['Smt'])) {
		echo $this->element('smtmenu', array('user' => $user));
	}
	if (isset($learningmentor['LearningMentor'])) {
		echo $this->element('learningmentormenu', array('user' => $user));
	}
}
?>

<div class="container">
	<div class="row">
		<div class="span9">
			<?php echo $this->Session->flash(); ?>
		
			<?php echo $content_for_layout; ?>
		</div>
		<div class="span3">
			<?php echo $this->element('newmenu'); ?>
		</div>
<?php 
echo $this->element('footer');
?>