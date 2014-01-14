<?php 
echo $this->Form->create(
	'StaffBulletin', array(
		'action' => 'edit', 
		'class' => 'form-horizontal'
	)
);
?>
	<div class="form-group">
		<label class="col-md-2 control-label" for="title">Title</label>
		<div class="col-md-10">
			<?php 
			echo $this->Form->input(
				'title', array(
					'class' => 'form-control',
					'placeholder' => 'Title',
					'label' => false,
				)
			);
			?>
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-2 control-label" for="summary">Summary</label>
		<div class="col-md-10">
			<?php 
			echo $this->Form->input(
				'summary', array(
					'class' => 'form-control',
					'placeholder' => 'Summary',
					'label' => false
				)
			);
			?>
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-2 control-label" for="details">Details</label>
		<div class="col-md-10">
			<?php
			echo $this->Form->input(
				'details', array(
					'class' => 'form-control',
					'placeholder' => 'Content',
					'label' => false,
				)
			);
			?>
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-2 control-label" for="published">Status</label>
		<div class="col-md-10">
			<?php
			echo $this->Form->input(
				'published', array(
					'class' => 'form-control', 
					'type' => 'select',
					'options' => array(
						0 => 'Draft',
						1 => 'Published'
					),
					'label' => false
				)
			);
			?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-10 col-md-offset-2">
			<?php
			echo $this->Form->button(
				'Update Bulletin', array(
					'type' => 'submit',
					'class' => 'btn btn-primary'
				)
			);
			?>
		</div>
	</div>
<?php
echo $this->Form->create('StaffBulletin');
?>