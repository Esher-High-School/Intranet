<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $title; ?></title>
		<link href="/stylesheets/print.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div class="navbar navbar-fixed-top navbar-inverse">
			<div class="navbar-inner">
				<div class="print-container">
					<?php
					echo $this->Html->Link('Staff Intranet', '/', array('class' => 'navbar-brand')); 
					?>

					<a href="javascript:window.print()" class="btn btn-primary navbar-btn pull-right">Print</a>
					
				</div>
			</div>
		</div>
		<div class="container">
			<?php echo $content_for_layout; ?>
		</div>
	</body>
</html>
