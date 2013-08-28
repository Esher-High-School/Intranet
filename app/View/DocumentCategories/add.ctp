<h3>Add New Document Category</h3>
<?php echo $this->Form->create('DocumentCategory', array('action' => 'add', 'class' => 'form-horizontal')); ?>
	<div class="control-group">
		<label class="control-label" for="name">Name</label>
		<div class="controls">
			<?php echo $this->Form->input('name', array('label' => false, 'class' => 'input-block-level')); ?>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="Description">Description</label>
		<div class="controls">
			<?php echo $this->Form->input('description', array('label' => false, 'class' => 'input-block-level')); ?>
		</div>
	</div>

	<div class="control-group">
		<div class="controls">
			<?php echo $this->Form->button('Add Document Category', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>
		</div>
	</div>
<?php echo $this->Form->end(); ?>
