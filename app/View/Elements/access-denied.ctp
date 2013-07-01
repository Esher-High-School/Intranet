<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Access Denied - Staff Intranet</title>
		<link href="http://web.esherhigh.surrey.sch.uk/static/css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<style type="text/css">
			footer p {
				font-size: 10pt;
				text-align: center;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<h1>Access Denied <small>Staff Intranet</small></h1>
			<hr>
			<p>You do not have permission to access this resource.</p>
			<p>The username you attempted to access the site with was: <strong><?php echo $user; ?></strong>. If you believe this to be in error, please contact ICT support.</p>
			<footer>
				<p>Copyright &copy; <?php echo date("Y"); ?> Esher Church of England High School - ICT Support Department</p>
			</footer>
		</div>
	</body>
</html>