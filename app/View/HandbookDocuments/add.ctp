<?php echo $this->Form->create('HandBookCategory', array('class' => 'form-horizontal', 'type' => 'file')); ?>

	<div class="control-group">
		<label class="control-label">Name</label>
		<div class="controls">
			<?php echo $this->Form->input('name', array('label' => false)); ?>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">File</label>
		<div class="controls">
			<?php echo $this->Form->input('file', array('type' => 'file', 'label' => false)); ?>
		</div>
	</div>
	<div class="control-group">
		<div class="controls">
			<?php echo $this->Form->button('Upload Document', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>
		</div>
	</div>

<?php echo $this->Form->end(); ?>