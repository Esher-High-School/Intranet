<?php echo $this->Form->create('Tutor', array('action' => 'edit', 'class' => 'form-horizontal')); ?>
	<div class="form-group">
		<label class="col-lg-3 control-label" for="name">Full Name</label>
		<div class="col-lg-9">
			<?php echo $this->Form->input('name', array('class' => 'form-control', 'label' => false, 'class' => 'form-control')); ?>
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-3 control-label" for="form">Form</label>
		<div class="col-lg-9">
			<?php echo $this->Form->input('form', array('class' => 'form-control', 'label' => false, 'class' => 'form-control')); ?>
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-3 control-label" for="username">Network Username</label>
		<div class="col-lg-9">
			<?php echo $this->Form->input('username', array('class' => 'form-control', 'label' => false, 'class' => 'form-control')); ?>
		</div>
	</div>
	<?php echo $this->Form->input('id', array('type' => 'hidden')); ?>
	<div class="form-group">
		<div class="col-lg-9">
			<?php echo $this->Form->button('Update Tutor', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>
		</div>
	</div>
<?php echo $this->Form->end(); ?>
