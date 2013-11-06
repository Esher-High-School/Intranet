<?php echo $this->Form->create('Hoy', array('class' => 'form-horizontal')); ?>
	<div class="form-group">
		<label class="col-lg-3 control-label">
			Username
		</label>
		<div class="col-lg-9">
			<?php echo $this->Form->input('username', array('label' => false, 'class' => 'form-control')); ?>
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-3 control-label">
			Year
		</label>
		<div class="col-lg-9">
			<?php echo $this->Form->input('year', array('label' => false, 'class' => 'form-control')); ?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-9 col-md-offset-3">
			<?php echo $this->Form->button('Create HoY', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>
		</div>
	</div>
<?php echo $this->Form->end(); ?>