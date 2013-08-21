<h3>Edit Staff Member</h3>
<?php echo $this->Form->create('Staff', array('url' => array('controller' => 'staff', 'action' => 'edit'), 'class' => 'form-horizontal')); ?>
	<?php echo $this->Form->input('id', array('hidden' => true, 'label' => false)); ?>
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
			<?php echo $this->Form->button('Edit Staff Member', array('controller' => 'Staff', 'action' => 'edit', 'type' => 'submit', 'class' => 'btn btn-primary')); ?>
		</div>
	</div>
<?php echo $this->Form->end(); ?>
<p><?php echo $this->Html->Link('Back to staff list', array('action' => 'index')); ?></p>