<div class="row">
	<div class="col-md-4">
		<?php
			echo $this->Form->create('Hoy', array('action' => 'edit'));
			echo $this->Form->input('username', array('class' => 'col-md-4', 'placeholder' => 'Username', 'label' => false, 'class' => 'form-control'));
			echo $this->Form->input('year', array('class' => 'col-md-4', 'placeholder' => 'Year', 'label' => false, 'class' => 'form-control'));
			echo $this->Form->button('Create HoY', array('type' => 'submit', 'class' => 'btn btn-primary btn-block'));
			echo $this->Form->end();
		?>
	</div>
	<div class="col-md-3">
		<p style="padding-top: 4px;">Username</p>
		<p style="padding-top: 10px;">Year</p>
	</div>
</div>