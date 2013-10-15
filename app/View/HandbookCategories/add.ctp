<h2>Add Handbook Category</h2>
<?php echo $this->Form->Create('HandbookCategory', array('class' => 'form-horizontal')); ?>

	<div class="control-group">
		<label class="control-label">Category Name</label>
		<div class="controls">
			<?php echo $this->Form->input('name', array('label' => false)); ?>
		</div>
	</div>
	<div class="control-group">
		<div class="controls">
			<?php echo $this->Form->button('Add Category', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>
		</div>
	</div>

<?php echo $this->Form->end(); ?>