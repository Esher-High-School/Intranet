<div class="row">
	<div class="col-md-4">
		<?php
			echo $this->Form->create('Hod', array('action' => 'edit'));
			echo $this->Form->input('username', array('class' => 'col-md-4', 'placeholder' => 'Username', 'label' => false, 'class' => 'form-control'));
			echo $this->Form->input('dept', array('class' => 'col-md-4', 'placeholder' => 'Department', 'label' => false, 'class' => 'form-control'));
			echo $this->Form->button('Create HoD', array('type' => 'submit', 'class' => 'btn btn-primary btn-block'));
			echo $this->Form->end();
		?>
	</div>
	<div class="col-md-3">
		<p style="padding-top: 4px;">Username</p>
		<p style="padding-top: 10px;">Department</p>
	</div>
</div>
