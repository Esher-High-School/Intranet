<h3>Add Staff Group</h3>
<?php echo $this->Form->create('StaffGroup', array('action' =>'add', 'class' => 'form-horizontal')); ?>
	<div class="control-group">
		<label class="control-label" for="name">Name</label>
		<div class="controls">
			<?php echo $this->Form->input('name', array('label' => false)); ?>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">Group Type</label>
		<div class="controls">
			<?php echo $this->Form->input('type', array('type' => 'select', 'options' => $grouptypes, 'label' => false)); ?>
		</div>
	</div>
	<div class="control-group">
		<div class="controls">
			<?php echo $this->Form->button('Add Group', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>
		</div>
	</div>
<?php echo $this->Form->end(); ?>