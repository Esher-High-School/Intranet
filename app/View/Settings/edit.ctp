<h3>Edit Setting</h3>
<?php echo $this->Form->create('Setting', array('action' => 'edit', 'class' => 'form-horizontal')); ?>
	<div class="control-group">
		<label class="control-label" for="nameInput">Name</label>
		<div class="controls">
			<?php echo $this->Form->input('name', array('class' => 'input-block-level', 'id' => 'nameInput', 'label' => false)); ?>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="valueInput">Value</label>
		<div class="controls">
			<?php echo $this->Form->input('value', array('class' => 'input-block-level', 'id' => 'valueInput', 'label' => false)); ?>
		</div>
	</div>
	<div class="control-group">
		<div class="controls">
			<?php echo $this->Form->button('Save Setting', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>
		</div>
	</div>
<?php echo $this->Form->end(); 