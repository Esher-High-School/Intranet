<h3>Edit Incident Option</h3>
<?php echo $this->Form->create('IncidentOption', array('action' => 'edit', 'class' => 'form-horizontal')); ?>
	<div class="control-group">
		<label class="control-label">Name</label>
		<div class="controls">
			<?php echo $this->Form->input('name', array('class' => 'input-block-level', 'label' => false)); ?>
		</div>
	</div>
	<div class="control-group">
		<div class="controls">
			<?php echo $this->Form->button('Edit Incident Option', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>
		</div>
	</div>
<?php echo $this->Form->end(); ?>