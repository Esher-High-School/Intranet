<?php echo $this->Form->create('Subject', array('action' => 'edit', 'class' => 'form-horizontal')); ?>
	<div class="form-group">
		<label class="col-md-3 control-label">Subject</label>
		<div class="col-md-9">
			<?php echo $this->Form->input('name', array('class' => 'form-control', 'label' => false, 'class' => 'form-control')); ?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-9">
			<?php echo $this->Form->button('Edit Subject', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>
		</div>
	</div>
<?php echo $this->Form->end(); ?>