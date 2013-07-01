<h3>Edit Tutor</h3>
<?php echo $this->Form->create('Tutor', array('action' => 'edit', 'class' => 'form-horizontal')); ?>
	<div class="control-group">
		<label class="control-label" for="name">Full Name</label>
		<div class="controls">
			<?php echo $this->Form->input('name', array('class' => 'input-block-level', 'label' => false)); ?>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="form">Form</label>
		<div class="controls">
			<?php echo $this->Form->input('form', array('class' => 'input-block-level', 'label' => false)); ?>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="username">Network Username</label>
		<div class="controls">
			<?php echo $this->Form->input('username', array('class' => 'input-block-level', 'label' => false)); ?>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="email">Email</label>
		<div class="controls">
			<?php echo $this->Form->input('email', array('class' => 'input-block-level', 'label' => false)); ?>
		</div>
	</div>
	<?php echo $this->Form->input('id', array('type' => 'hidden')); ?>
	<div class="control-group">
		<div class="controls">
			<?php echo $this->Form->button('Update Tutor', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>
		</div>
	</div>
<?php echo $this->Form->end(); ?>