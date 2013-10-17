<h3>Add Tutor</h3>
<?php echo $this->Form->create('Tutor', array('action' => 'add', 'class' => 'form-horizontal')); ?>
	<div class="control-group">
		<label class="control-label" for="name">Full Name</label>
		<div class="controls">
			<?php echo $this->Form->input('name', array('label' => false)); ?>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="form">Form</label>
		<div class="controls">
			<?php echo $this->Form->input('form', array('label' => false)); ?>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="username">Network Username</label>
		<div class="controls">
			<?php echo $this->Form->input('username', array('label' => false)); ?>
		</div>
	</div>
	<?php echo $this->Form->input('id', array('type' => 'hidden')); ?>
	<div class="control-group">
		<div class="controls">
			<?php echo $this->Form->button('Create Tutor', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>
		</div>
	</div>
<?php echo $this->Form->end(); ?>
