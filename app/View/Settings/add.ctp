<?php echo $this->Form->create('Setting', array('action' => 'add', 'class' => 'form-horizontal')); ?>
	<div class="form-group">
		<label class="col-lg-3 control-label" for="nameInput">Name</label>
		<div class="col-lg-9">
			<?php echo $this->Form->input('name', array('class' => 'form-control', 'id' => 'nameInput', 'label' => false, 'class' => 'form-control')); ?>
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-3 control-label" for="valueInput">Value</label>
		<div class="col-lg-9">
			<?php echo $this->Form->input('value', array('class' => 'form-control', 'id' => 'valueInput', 'label' => false, 'class' => 'form-control')); ?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-lg-9">
			<?php echo $this->Form->button('Save Setting', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>
		</div>
	</div>
<?php echo $this->Form->end(); 