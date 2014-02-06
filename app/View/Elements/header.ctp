<?php
if (isset($title)) {
	$showTitle = ($title . ' - Staff Intranet');
} else {
	$showTitle = 'Staff Intranet';
}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=Edge">
		<meta charset="utf-8">
		<title><?php echo $showTitle; ?></title>
		<link href="/stylesheets/screen.css" rel="stylesheet" type="text/css" media="screen">
		<link href="/stylesheets/print.css" rel="stylesheet" type="text/css" media="print">
		<!--[if lt IE 9]>
			<script src="dist/html5shiv.js"></script>
		<![endif]-->
		<?php if (isset($User['User'])): ?>
			<style type="text/css" media="screen">
				body {
					padding-top: 51px;
				}
				.navigation-bg {
					top: 120px;
				}
			</style>
		<?php endif; ?>
	</head>
	<body>
		<script src="/javascripts/jquery.min.js" type="text/javascript"></script>
		<script src="/javascripts/bootstrap.min.js" type="text/javascript"></script>
		<?php 
		if (isset($User['User'])) {
			echo $this->element('cms-navbar'); 
		}
		?>
		<div class="header">
			<div class="container">
				<div class="row">
					<div class="logo">
						<a href="/">
							<img src="/images/ehs.png" alt="Esher C of E High School">
						</a>
					</div>
					<div class="title">
						<a href="/">
							<h1><?php echo $global_settings['School Name']; ?></h1>
							<h2>Staff Intranet</h2>
						</a>
					</div>

				</div>
			</div>
		</div>

		<?php
		echo $this->element('topmenu', array('user' => $username));
		?>

		<div class="page-title container">
			<h1>
				<?php echo $title; ?>
				<?php if (isset($subtitle)): ?>
					<small>
						<?php echo $subtitle; ?>
					</small>
				<?php endif; ?>
			</h1>
		</div>

		<div class="main-container">
			<?php
			if ($this->params['controller'] == 'incidents') {
				if ($this->params['action'] !== 'report') {
					if (isset($smt['Smt'])) {
						echo $this->element('smtmenu', array('user' => $username));
					}
					if (isset($learningmentor['LearningMentor'])) {
						echo $this->element('learningmentormenu', array('user' => $username));
					}
				}
			}
			?>
			<div class="container">
