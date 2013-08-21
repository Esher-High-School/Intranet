<h3>Edit Subject</h3>
<?php echo $this->Form->create('Subject', array('action' => 'edit', 'class' => 'form-horizontal')); ?>
	<div class="control-group">
		<label class="control-label">Subject</label>
		<div class="controls">
			<?php echo $this->Form->input('name', array('class' => 'input-block-level', 'label' => false)); ?>
		</div>
	</div>
	<div class="control-group">
		<div class="controls">
			<?php echo $this->Form->button('Edit Subject', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>
		</div>
	</div>
<?php echo $this->Form->end(); ?>