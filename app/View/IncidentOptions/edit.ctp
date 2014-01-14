<?php echo $this->Form->create('IncidentOption', array('action' => 'edit', 'class' => 'form-horizontal')); ?>
	<div class="form-group">
		<label class="col-md-3 control-label">Name</label>
		<div class="col-md-9">
			<?php echo $this->Form->input('name', array('class' => 'form-control', 'label' => false, 'class' => 'form-control')); ?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-9 col-md-offset-3">
			<?php echo $this->Form->button('Edit Incident Option', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>
		</div>
	</div>
<?php echo $this->Form->end(); ?>