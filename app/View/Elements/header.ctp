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
		<link href="/assets/stylesheets/screen.css" rel="stylesheet" type="text/css">
		<link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css">
		<link href="http://web.esherhigh.surrey.sch.uk/cake/lib/elfinder/css/elfinder.min.css" rel="stylesheet" type="text/css">
		<link href="http://web.esherhigh.surrey.sch.uk/cake/lib/elfinder/css/theme.css" rel="stylesheet" type="text/css">
		<!--[if lt IE 9]>
			<script src="dist/html5shiv.js"></script>
		<![endif]-->
		<?php if (isset($cmsuser['CmsUser'])): ?>
			<style type="text/css">
				body {
					margin-top: 40px;
				}
				.navigation-bg {
					top: 120px;
				}
			</style>
		<?php endif; ?>
	</head>
	<body>
		<script src="http://code.jquery.com/jquery-1.9.1.js" type="text/javascript"></script>
		<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" type="text/javascript"></script>
		<script src="http://code.jquery.com/jquery-migrate-1.0.0.js" type="text/javascript"></script>
		<script src="http://web.esherhigh.surrey.sch.uk/static/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="http://web.esherhigh.surrey.sch.uk/static/js/ckeditor/ckeditor.js" type="text/javascript"></script>
		<script src="http://web.esherhigh.surrey.sch.uk/cake/lib/elfinder/js/elfinder.min.js" type="text/javascript"></script>
		<?php 
		if (isset($cmsuser['CmsUser'])) {
			echo $this->element('top-navbar'); 
		}
		?>
		<div class="navigation-bg">
			&nbsp;
		</div>
		<div class="header">
			<div class="container">
				<div class="span1">
					<a href="/">
						<img src="/img/ehs.png" alt="Esher C of E High School">
					</a>
				</div>
				<div class="span9">
					<a href="/">
						<h1>Esher C of E High School</h1>
						<h2>Staff Intranet</h2>
					</a>
				</div>
				<div class="span1 right">
					<img src="/img/ac.png" alt="Arts Colleges">
				</div>
			</div>
		</div>
		<?php
		echo $this->element('topmenu', array('user' => $username));
		?>
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