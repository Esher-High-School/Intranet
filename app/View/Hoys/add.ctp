<h3>Add Head of Year</h3>
<?php echo $this->Form->create('Hoy', array('class' => 'form-horizontal')); ?>
	<div class="control-group">
		<label class="control-label">
			Username
		</label>
		<div class="controls">
			<?php echo $this->Form->input('username', array('label' => false)); ?>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">
			Year
		</label>
		<div class="controls">
			<?php echo $this->Form->input('year', array('label' => false)); ?>
		</div>
	</div>
	<div class="control-group">
		<div class="controls">
			<?php echo $this->Form->button('Create HoY', array('type' => 'submit', 'class' => 'btn btn-primary btn-block')); ?>
		</div>
	</div>
<?php echo $this->Form->end(); ?>