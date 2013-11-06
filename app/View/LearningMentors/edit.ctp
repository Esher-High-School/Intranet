<h1>Edit Learning Mentor</h1>
<br>
<div class="row">
	<div class="col-md-4">
		<?php
			echo $this->Form->create('LearningMentor', array('action' => 'edit'));
			echo $this->Form->input('username', array('class' => 'col-md-4', 'placeholder' => 'Username', 'label' => false, 'class' => 'form-control'));
			echo $this->Form->button('Edit Learning Mentor', array('type' => 'submit', 'class' => 'btn btn-primary btn-block'));
			echo $this->Form->end();
		?>
	</div>
	<div class="col-md-3">
		<p style="padding-top: 4px;">Username</p>
	</div>
</div>