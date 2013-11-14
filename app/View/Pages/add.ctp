<?php echo $this->Form->create('Page', array('action' => 'add', 'class' => 'form-horizontal')); ?>
	<div class="form-group">
		<label class="col-lg-2 control-label" for="name">Name</label>
		<div class="col-lg-10">
			<?php echo $this->Form->input('name', array('label' => false, 'class' => 'form-control', 'class' => 'form-control')); ?>
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-2 control-label" for="Description">Description</label>
		<div class="col-lg-10">
			<?php echo $this->Form->input('description', array('label' => false, 'class' => 'form-control', 'class' => 'form-control', 'rows' => 15)); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-lg-10 col-lg-offset-2">
			<?php echo $this->Form->button('Add Pages', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>
		</div>
	</div>
<?php echo $this->Form->end(); ?>
