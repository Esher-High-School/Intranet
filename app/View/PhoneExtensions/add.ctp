<h3>Add New Extension</h3>
<?php echo $this->Form->create('PhoneExtension', array('action' => 'add', 'class' => 'form-horizontal')); ?>
	<div class="control-group">
		<label class="control-label" for="extension">Extension</label>
		<div class="controls">
			<?php echo $this->Form->input('extension', array('label' => false)); ?>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="name">Name</label>
		<div class="controls">
			<?php echo $this->Form->input('name', array('class' => 'input-block-level', 'label' => false)); ?>
		</div>
	</div>
	<div class="control-group">
		<div class="controls">
			<?php echo $this->Form->button('Add Extension', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>
		</div>
	</div>
<?php echo $this->Form->end(); ?>