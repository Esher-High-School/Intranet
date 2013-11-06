<?php
echo $this->Form->create('LearningMentor', 
	array(
		'action' => 'edit', 
		'class' => 'form-horizontal'
	)
);
?>
	<div class="form-group">
		<label class="col-lg-3" for="nameInput">Username</label>
		<div class="col-lg-5">
			<?php
			echo $this->Form->input('username', 
				array(
					'class' => 'form-control',
					'id' => 'nameInput', 
					'label' => false
				)
			);
			?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-lg-offset-3 col-lg-9">
			<?php 
			echo $this->Form->button('Add Learning Mentor', 
				array(
					'type' => 'submit',
					'class' => 'btn btn-primary'
				)
			);
			?>
		</div>
	</div>
