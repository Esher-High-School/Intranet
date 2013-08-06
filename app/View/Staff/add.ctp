<h3>Add Staff Member</h3>
<?php echo $this->Form->create('Staff', array('action' => 'add', 'class' => 'form-horizontal')); ?>
	<div class="control-group">
		<label class="control-label">Username</label>
		<div class="controls">
			<?php echo $this->Form->input('username', array('label' => false)); ?>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">Forename</label>
		<div class="controls">
			<?php echo $this->Form->input('forename', array('label' => false)); ?>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">Surname</label>
		<div class="controls">
			<?php echo $this->Form->input('surname', array('label' => false)); ?>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">Group</label>
		<div class="controls">
			<?php echo $this->Form->input('group_id', array('type' => 'select', 'options' => $groups, 'label' => false)); ?>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">Title</label>
		<div class="controls">
			<?php echo $this->Form->input('title', array('label' => false)); ?>
		</div>
	</div>
<?php echo $this->Form->end(); ?>

<?php debug($groups); ?>