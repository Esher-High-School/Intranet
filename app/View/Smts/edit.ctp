<?php
$Authentication = new Authentication;
if (!$Authentication->isAdmin()) {
	echo ("<h2>Access Denied.</h2>
	<p>You do not have permission to access this resource. If you believe this is in error, please contact ICT support.</p>
	<p>Your username is <strong>" . $Authentication->Username() . "</strong>.</p>");
} else {
?>
<h1>Edit SMT Staff</h1>
<br>
<div class="row">
	<div class="span4">
		<?php
			echo $this->Form->create('Smt', array('action' => 'edit'));
			echo $this->Form->input('username', array('class' => 'span4', 'placeholder' => 'Username', 'label' => false));
			echo $this->Form->button('Edit SMT Staff', array('type' => 'submit', 'class' => 'btn btn-primary btn-block'));
			echo $this->Form->end();
		?>
	</div>
	<div class="span3">
		<p style="padding-top: 4px;">Username</p>
	</div>
</div>
<?php } ?>