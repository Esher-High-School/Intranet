<?php echo $this->Form->Create('smt', array('action' => 'edit', 'class' => 'form-horizontal')); ?>
	<div class="form-group">
		<label class="col-lg-3 control-label">Username</label>
		<div class="col-lg-9">
			<?php echo $this->Form->input('username', array('label' => false, 'class' => 'form-control')); ?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-lg-9">
			<?php echo $this->Form->button('Add SMT Staff', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>
		</div>
	</div>
<?php echo $this->Form->end(); ?>