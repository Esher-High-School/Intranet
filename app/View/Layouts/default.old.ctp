<?php
$IntranetAuth = new IntranetAuth;
$Theme = new ThemeFunctions;
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Staff Intranet</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=Edge">
		<!--[if lt IE 9]>
			<script src="https://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<?php echo $Theme->getCss('style'); ?>
		<!--[if IE 7]>
			<link href="/css/font-awesome-ie7.css" rel="stylesheet">
		<![endif]-->
	</head>
	<body>
		<div class="main-container">
			<div class="header">
				<a href="/cake"><?php echo $Theme->getImg('banner.jpg', "Esher C of E High School"); ?></a>
			</div>
			<?php /* Admin Navigation */ ?>
			<div class="navbar nav-top">
				<div class="navbar-inner">
					<ul class="nav">
						<li><?php echo $this->Html->Link('Ariadne', array('controller' => 'pages', 'action' => 'view', 27)); ?></li>
						<li><?php echo $this->Html->Link('Students', array('controller' => 'students', 'action' => 'index')); ?></li>
						<li><a href="http://10.18.56.70/SupportDeskSSP/Login_AI_Edit.aspx?login=<?php echo $_SERVER['REMOTE_USER']; ?>">ICT Heldesk</a></li>
						<li><a href="https://webmail.esherhigh.surrey.sch.uk/">Webmail</a></li>
						<li><a href="https://elm.itslearning.com/">VLE</a></li>
						<li><a href="http://web.esherhigh.surrey.sch.uk/incident.php?show=incident&amp;ord=surname&amp;year=">Incident Form</a></li>
					</ul>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<?php
						if ($IntranetAuth->isAdmin()) {
							echo $content_for_layout;
						} else {
							echo('
							<h2>Access Denied</h2>
							<p>You do not have permission to access this resource. If you believe this is in error, please contact ICT support.</p>
							');
						}
						?>
					</div>
					<div class="col-md-4">
						<h3>Navigation</h3>
						<ul class="nav nav-tabs nav-stacked">
							<li><?php echo $this->Html->Link('Home', array('controller' => 'pages', 'action' => 'view', 36)); ?></li>
							<li><?php echo $this->Html->Link('Ariadne (School Policy)', array('controller' => 'pages', 'action' => 'view', 27)); ?></li>
							<li><a href="https://surreycc-safety.net/scc//AIR/incbook/incbook_sys_initialise.asp">Accident Reporting</a></li>
						</ul>
						<ul class="nav nav-tabs nav-stacked">
							<li><?php echo $this->Html->Link('Child Protection', array('controller' => 'pages', 'action' => 'view', 31)); ?></li>
							<li><?php echo $this->Html->Link('Curriculum software List', array('controller' => 'pages', 'action' => 'view', 25)); ?></li>
						</ul>
						<ul class="nav nav-tabs nav-stacked">
							<li><a href="http://esher.lessontrackersystem.com/">Lesson Tracker System</a></li>
							<li><?php echo $this->Html->Link('Literacy', array('controller' => 'pages', 'action' => 'view', 21)); ?></li>
						</ul>
						<ul class="nav nav-tabs nav-stacked">
							<li><?php echo $this->Html->Link('New National Curriculum', array('controller' => 'pages', 'action' => 'view', 20)); ?></li>
						</ul>
						<ul class="nav nav-tabs nav-stacked">
							<li><?php echo $this->Html->Link('Performance Management', array('controller' => 'pages', 'action' => 'view', 19)); ?></li>
							<li><?php echo $this->Html->Link('Phone Extensions', array('controller' => 'pages', 'action' => 'view', 35)); ?></li>
						</ul>
						<ul class="nav nav-tabs nav-stacked">
							<li><a href="http://web.esherhigh.surrey.sch.uk/assets/forms/RiskAssessmentForm.dot">Risk Assessment Template</a></li>
						</ul>
						<ul class="nav nav-tabs nav-stacked">
							<li><?php echo $this->Html->Link('SEAL', array('controller' => 'pages', 'action' => 'view', 16)); ?></li>
							<li><a href="http://web.esherhigh.surrey.sch.uk/handbook/">Staff Handbook</a></li>
							<li><?php echo $this->Html->Link('Staff Lists', array('controller' => 'pages', 'action' => 'view', 30)); ?></li>
							<li><?php echo $this->Html->Link('Student Bulletin', array('controller' => 'pages', 'action' => 'view', 16)); ?></li>
							<li><a href="http://snet.surreycc.gov.uk/">Surrey CC Intranet</a></li>
						</ul>
						<ul class="nav nav-tabs nav-stacked">
							<li><?php echo $this->Html->Link('T &amp; L Working Group', array('controller' => 'pages', 'action' => 'view', 15), array('escape' => false)); ?>
							<li><?php echo $this->Html->Link('Teaching and Learning', array('controller' => 'pages', 'action' => 'view', 14)); ?></li>
							<li><?php echo $this->Html->Link('Thought for the Day', array('controller' => 'tfds', 'action' => 'index')); ?></li>
						</ul>
						<ul class="nav nav-tabs nav-stacked">
							<li><?php echo $this->Html->Link('Useful Documents and Forms', array('controller' => 'pages', 'action' => 'view', 10)); ?></li>
						</ul>
					</div>
				</div>
			</div>
			<footer>
				<p>
					<?php echo $this->Html->link('Home', array('controller' => 'pages', 'action' => 'view', 'home')); ?> | <a href="http://www.esherhigh.surrey.sch.uk">EHS Website</a> | <a href="https://webmail.esherhigh.surrey.sch.uk/">Email</a><br>
					Copyright &copy; 2012 Esher C of E High School : ICT Support Department
				</p>
			</footer>
		</div>
		<?php echo $Theme->getJs('jquery'); ?>
		<?php echo $Theme->getJs('bootstrap.min'); ?>
		<?php echo $Theme->getJs('ckeditor/ckeditor'); ?>
	</body>
</html>