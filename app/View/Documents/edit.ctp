<h3>Edit Document</h3>
<?php echo $this->Form->create('Document', array('action' => 'edit', 'class' => 'form-horizontal')); ?>
	<div class="control-group">
		<label class="control-label" for="name">Name</label>
		<div class="controls">
			<?php echo $this->Form->input('name', array('label' => false, 'class' => 'input-block-level')); ?>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="category">
			Category<br>
			<small>
				<?php echo $this->Html->link('(Edit Categories)', array('controller' => 'DocumentCategories', 'action' => 'index')); ?>
			</small>
		</label>
		<div class="controls">
			<select name="data[Document][category_id]" class="input-block-level">
				<option value="<?php echo $document_category['DocumentCategory']['id']; ?>">
					<?php echo $document_category['DocumentCategory']['name']; ?>
				</option>
				<?php foreach($categories as $category): ?>
					<option value="<?php echo $category['DocumentCategory']['id']; ?>">
						<?php echo $category['DocumentCategory']['name']; ?>
					</option>
				<?php endforeach; ?>
			</select>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="document">Document</label>
		<div class="controls">
			<?php echo $this->Form->input('document', array('label' => false, 'class' => 'input-block-level')); ?>
		</div>
	</div>
	<div class="control-group">
		<div class="controls">
			<?php echo $this->Form->button('Edit Document', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>
		</div>
	</div>
<?php echo $this->Form->end(); ?>
