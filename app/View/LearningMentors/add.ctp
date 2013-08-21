<h1>Add Learning Mentor</h1>
<br>
<div class="row">
	<div class="span4">
		<?php
			echo $this->Form->create('LearningMentor', array('action' => 'edit'));
			echo $this->Form->input('username', array('class' => 'span4', 'placeholder' => 'Username', 'label' => false));
			echo $this->Form->button('Add Learning Mentor', array('type' => 'submit', 'class' => 'btn btn-primary btn-block'));
			echo $this->Form->end();
		?>
	</div>
	<div class="span3">
		<p style="padding-top: 4px;">Username</p>
	</div>
</div>