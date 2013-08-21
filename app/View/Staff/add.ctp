<h3>Add Staff Member</h3>
<?php echo $this->Form->create('Staff', array('class' => 'form-horizontal')); ?>
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
		<label class="control-label">
			Group
			<br>
			<small>
				<?php echo $this->Html->Link('Add Group', array('controller' => 'StaffGroups', 'action' => 'add')); ?>
			</small>
		</label>
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
	<div class="control-group">
		<div class="controls">
			<?php echo $this->Form->button('Add Staff Member', array('action' => 'add', 'type' => 'submit', 'class' => 'btn btn-primary')); ?>
		</div>
	</div>
<?php echo $this->Form->end(); ?>
<p><?php echo $this->Html->Link('Back to staff list', array('action' => 'index')); ?></p>