<?php echo $this->Form->create('HandBookCategory', array('class' => 'form-horizontal', 'type' => 'file')); ?>

	<div class="control-group">
		<label class="control-label">Name</label>
		<div class="controls">
			<?php echo $this->Form->input('name', array('label' => false)); ?>
		</div>
	</div>

<?php echo $this->Form->end(); ?>