<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $title; ?></title>
		<link href="/assets/stylesheets/print.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div class="navbar navbar-fixed-top navbar-inverse">
			<div class="navbar-inner">
				<div class="print-container">
					<a href="javascript:window.print()" class="btn btn-primary">Print</a>
					<?php echo $this->Html->Link('Incident Printing', array('controller' => 'students', 'action' => 'IncidentPrintList'), array('class' => 'btn btn-inverse pull-right')); ?>
				</div>
			</div>
		</div>
		<div class="container">
			<?php echo $content_for_layout; ?>
		</div>
	</body>
</html>
