<?php echo $this->Form->Create('HandbookCategory', array('action' => 'edit', 'class' => 'form-horizontal')); ?>

	<div class="form-group">
		<label class="col-md-3 control-label">Category Name</label>
		<div class="col-md-9">
			<?php echo $this->Form->input('name', array('label' => false, 'class' => 'form-control')); ?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-9">
			<?php echo $this->Form->button('Save Category', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>
		</div>
	</div>

<?php echo $this->Form->end(); ?>