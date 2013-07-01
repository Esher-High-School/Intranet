<h2>An Error Occured</h2>
<p>A team of highly trained monkeys has been dispatched to this location.</p>
<p>If you see them, please show them this information:</p>
<h3>PDO Error</h3>
<p class="error">
	<strong><?php echo __d('cake', 'Error'); ?>: </strong>
	<?php echo __d('cake', 'An Internal Error Has Occurred.'); ?>
</p>
<?php
if (Configure::read('debug') > 0 ):
	echo $this->element('exception_stack_trace');
endif;
?>
