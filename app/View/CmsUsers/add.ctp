<?php echo $this->Form->Create('CmsUser', array('class' => 'form-horizontal')); ?>
	<div class="form-group">
		<label class="col-md-3 control-label" for="user">Username</label>
		<div class="col-md-9">
			<?php echo $this->Form->input('user', array('label' => false, 'class' => 'form-control')); ?>
		</div>
	</div>

	<div class="form-group">
		<label class="col-md-3 control-label" for="authlevel">Role</label>
		<div class="col-md-9">
			<?php echo $this->Form->input('authlevel', array('type' => 'select', 'options' => $roles, 'label' => false, 'class' => 'form-control')); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-9">
		<?php echo $this->Form->button('Save', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>
		</div>
	</div>
<?php echo $this->Form->end(); ?>