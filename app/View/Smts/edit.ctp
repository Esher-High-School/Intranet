<h3>Edit SMT Staff</h3>
<?php echo $this->Form->Create('smt', array('action' => 'edit', 'class' => 'form-horizontal')); ?>
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
<?php echo $this->Form->end(); ?>