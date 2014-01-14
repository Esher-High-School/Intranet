<?php echo $this->Form->create('IncidentUser', array('action' => 'edit', 'class' => 'form-horizontal')); ?>
	<div class="form-group">
		<label class="col-md-3 control-label" for="username">Username</label>
		<div class="col-md-9">
			<?php echo $this->Form->input('username', array('class' => 'form-control', 'label' => false, 'class' => 'form-control')); ?>
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-3 control-label" for="monitoring">Incident Monitoring</label>
		<div class="col-md-9">
			<?php echo $this->Form->input('monitoring', array('class' => 'form-control', 'type' => 'select', 'options' => $options, 'label' => false, 'class' => 'form-control')); ?>
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-3 control-label" for="printing">Incident Printing</label>
		<div class="col-md-9">
			<?php echo $this->Form->input('printing', array('class' => 'form-control', 'type' => 'select', 'options' => $options, 'label' => false, 'class' => 'form-control')); ?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-9">
			<?php echo $this->Form->button('Edit User', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>
		</div>
	</div>
<?php echo $this->Form->end(); ?>