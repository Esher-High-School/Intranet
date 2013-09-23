<h2>Edit Head of Department</h2>
<br>
<div class="row">
	<div class="span4">
		<?php
			echo $this->Form->create('Hod', array('action' => 'edit'));
			echo $this->Form->input('username', array('class' => 'span4', 'placeholder' => 'Username', 'label' => false));
			echo $this->Form->input('dept', array('class' => 'span4', 'placeholder' => 'Department', 'label' => false));
			echo $this->Form->button('Edit HoD', array('type' => 'submit', 'class' => 'btn btn-primary btn-block'));
			echo $this->Form->end();
		?>
	</div>
	<div class="span3">
		<p style="padding-top: 4px;">Username</p>
		<p style="padding-top: 10px;">Department</p>
	</div>
</div>
