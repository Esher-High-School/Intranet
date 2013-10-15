<h3>Upload Handbook Document</h3>
<?php echo $this->Form->create('HandBookDocument', array('class' => 'form-horizontal', 'type' => 'file')); ?>

	<div class="control-group">
		<label class="control-label">Name</label>
		<div class="controls">
			<?php echo $this->Form->input('name', array('label' => false)); ?>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="category">
			Category
		</label>
		<div class="controls">
			<select name="data[HandbookDocument][category]" class="input-block-level">
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
	<div class="control-group">
		<label class="control-label">File</label>
		<div class="controls">
			<?php echo $this->Form->input('document', array('type' => 'file', 'label' => false)); ?>
		</div>
	</div>
	<div class="control-group">
		<div class="controls">
			<?php echo $this->Form->button('Upload Document', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>
		</div>
	</div>

<?php echo $this->Form->end(); ?>