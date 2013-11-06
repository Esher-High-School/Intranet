<?php echo $this->Form->create('Document', array('action' => 'edit', 'class' => 'form-horizontal')); ?>
	<div class="form-group">
		<label class="col-lg-3 control-label" for="name">Name</label>
		<div class="col-lg-9">
			<?php echo $this->Form->input('name', array('label' => false, 'class' => 'form-control', 'class' => 'form-control')); ?>
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-3 control-label" for="category">
			Category<br>
			<small>
				<?php echo $this->Html->link('(Edit Categories)', array('controller' => 'DocumentCategories', 'action' => 'index')); ?>
			</small>
		</label>
		<div class="col-lg-9">
			<select name="data[Document][category_id]" class="form-control">
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
	<div class="form-group">
		<div class="col-lg-9 col-lg-offset-3">
			<?php echo $this->Form->button('Edit Document', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>
		</div>
	</div>
<?php echo $this->Form->end(); ?>
