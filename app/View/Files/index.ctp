<h3>File Manager</h3>
<script type="text/javascript" charset="utf-8">
	$().ready(function() {
		var elf = $('#elfinder').elfinder({
			// lang: 'en',             // language (OPTIONAL)
			url : '/lib/elfinder/php/connector.php'  // connector URL (REQUIRED)
		}).elfinder('instance');			
	});
</script>

<!-- Element where elFinder will be created (REQUIRED) -->
<div id="elfinder"></div>