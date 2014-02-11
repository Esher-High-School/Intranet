<?php
echo $this->Form->create(
	'Group',
	array(
		'class' => 'form-horizontal'
	)
);
?>
	<div class="form-group">
		<label class="col-md-2 control-label" for="name">Group Name</label>
		<div class="col-md-10">
			<?php
			echo $this->Form->input('name', array(
					'label' => false,
					'class' => 'form-control'
				)
			);
			?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-10 col-md-offset-2">
			<?php
			echo $this->Form->button(
				'Save',
				array(
					'type' => 'submit',
					'class' => 'btn btn-primary'
				)
			);
			?>
		</div>
	</div>
<?php echo $this->Form->end(); ?>