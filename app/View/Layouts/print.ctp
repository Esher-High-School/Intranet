<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $title; ?></title>
		<link href="/assets/stylesheets/print.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div class="container">
			<div class="header-container">
				<div class="span1">
					<a href="/">
						<img src="/cake/img/ehs.png" alt="Esher C of E High School">
					</a>
				</div>
				<div class="span9">
					<a href="/">
						<h1>Esher C of E High School</h1>
					</a>
				</div>
				<div class="span1 right">
					<img src="/cake/img/ac.png" alt="Arts Colleges">
				</div>
			</div>
			<?php echo $content_for_layout; ?>
		</div>
	</body>
</html>