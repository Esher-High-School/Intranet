<?php echo $this->Form->create('StaffGroup', array('action' =>'add', 'class' => 'form-horizontal')); ?>
	<div class="form-group">
		<label class="col-md-3 control-label" for="name">Name</label>
		<div class="col-md-9">
			<?php echo $this->Form->input('name', array('label' => false, 'class' => 'form-control')); ?>
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-3 control-label">Group Type</label>
		<div class="col-md-9">
			<?php echo $this->Form->input('type', array('type' => 'select', 'options' => $grouptypes, 'label' => false, 'class' => 'form-control')); ?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-9">
			<?php echo $this->Form->button('Add Group', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>
		</div>
	</div>
<?php echo $this->Form->end(); ?>