<h3>Add CMS User</h3>
<?php echo $this->Form->Create('CmsUser', array('class' => 'form-horizontal')); ?>
	<div class="control-group">
		<label class="control-label" for="user">Username</label>
		<div class="controls">
			<?php echo $this->Form->input('user', array('label' => false)); ?>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label" for="authlevel">Role</label>
		<div class="controls">
			<?php echo $this->Form->input('authlevel', array('type' => 'select', 'options' => $roles, 'label' => false)); ?>
		</div>
	</div>

	<div class="control-group">
		<div class="controls">
		<?php echo $this->Form->button('Save', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>
		</div>
	</div>
<?php echo $this->Form->end(); ?>