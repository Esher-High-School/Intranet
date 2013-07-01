<h3>Edit Incident User</h3>
<?php echo $this->Form->create('IncidentUser', array('action' => 'edit', 'class' => 'form-horizontal')); ?>
	<div class="control-group">
		<label class="control-label" for="username">Username</label>
		<div class="controls">
			<?php echo $this->Form->input('username', array('class' => 'input-block-level', 'label' => false)); ?>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="monitoring">Incident Monitoring</label>
		<div class="controls">
			<?php echo $this->Form->input('monitoring', array('class' => 'input-block-level', 'type' => 'select', 'options' => $options, 'label' => false)); ?>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="printing">Incident Printing</label>
		<div class="controls">
			<?php echo $this->Form->input('printing', array('class' => 'input-block-level', 'type' => 'select', 'options' => $options, 'label' => false)); ?>
		</div>
	</div>
	<div class="control-group">
		<div class="controls">
			<?php echo $this->Form->button('Edit User', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>
		</div>
	</div>
<?php echo $this->Form->end(); ?>