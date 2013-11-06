<?php echo $this->Form->create('HandbookDocument', array('class' => 'form-horizontal', 'type' => 'file', 'action' => 'add')); ?>

<?php if(isset($error)) {
	debug($error); 
} ?>

	<div class="form-group">
		<label class="col-lg-3 control-label">Name</label>
		<div class="col-lg-9">
			<?php echo $this->Form->input('name', array('label' => false, 'class' => 'form-control')); ?>
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-3 control-label" for="category">
			Category
		</label>
		<div class="col-lg-9">
			<select name="data[HandbookDocument][category]" class="form-control">
				<?php if (isset($selected_category)): ?>
					<option value="<?php echo $select_category['HandbookCategory']['id']; ?>">
						<?php echo $select_category['HandbookCategory']['name']; ?>
					</option>
				<?php endif; ?>
				<?php foreach($categories as $category): ?>
					<option value="<?php echo $category['HandbookCategory']['id']; ?>">
						<?php echo $category['HandbookCategory']['name']; ?>
					</option>
				<?php endforeach; ?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-3 control-label">File</label>
		<div class="col-lg-9">
			<?php echo $this->Form->input('document', array('type' => 'file', 'label' => false, 'class' => 'form-control')); ?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-lg-9">
			<?php echo $this->Form->button('Upload Document', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>
		</div>
	</div>

<?php echo $this->Form->end(); ?>