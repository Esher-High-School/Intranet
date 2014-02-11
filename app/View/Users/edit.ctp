<?php 
echo $this->Form->Create(
	'User', 
	array(
		'class' => 'form-horizontal', 
		'action' => 'edit'
		)
	); 
?>
	<div class="form-group">
		<label class="col-md-2 control-label" for="user">Username</label>
		<div class="col-md-10">
			<?php 
			echo $this->Form->input(
				'user', 
				array(
					'label' => false, 
					'class' => 'form-control'
				)
			); 
			?>
		</div>
	</div>

	<div class="form-group">
		<label class="col-md-2 control-label" for="authlevel">Groups</label>
		<div class="col-md-10">
			<?php 
			echo $this->Form->input(
				'Group',
				array(
					'label' => false,
					'class' => 'form-control'
				)
			);
			?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-10 col-md-offset-2">
		<?php echo $this->Form->button('Save', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>
		</div>
	</div>
<?php echo $this->Form->end(); ?>