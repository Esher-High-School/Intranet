<?php
$Authentication = new Authentication;
if (!$Authentication->isAdmin()) {
	echo ("<h2>Access Denied.</h2>
	<p>You do not have permission to access this resource. If you believe this is in error, please contact ICT support.</p>
	<p>Your username is <strong>" . $Authentication->Username() . "</strong>.</p>");
} else {
?>
<h3>Add SMT Staff</h3>
<?php echo $this->Form->Create('smt', array('class' => 'form-horizontal')); ?>
	<div class="control-group">
		<label class="control-label">Username</label>
		<div class="controls">
			<?php echo $this->Form->input('username', array('label' => false)); ?>
		</div>
	</div>
	<div class="control-group">
		<div class="controls">
			<?php echo $this->Form->button('Add SMT Staff', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>
		</div>
	</div>
<?php } ?>