<?php echo $this->Form->create('Document', array('type' => 'file', 'action' => 'add', 'class' => 'form-horizontal')); ?>
	<div class="form-group">
		<label class="col-lg-3 control-label" for="name">Name</label>
		<div class="col-lg-9">
			<?php echo $this->Form->input('name', array('label' => false, 'class' => 'form-control', 'class' => 'form-control')); ?>
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-3 control-label" for="category">
			Page<br>
			<small>
				<?php echo $this->Html->link('(Edit Pages)', array('controller' => 'Pages', 'action' => 'index')); ?>
			</small>
		</label>
		<div class="col-lg-9">
			<select name="data[Document][category_id]" class="form-control">
				<?php if (isset($selected_category)): ?>
					<option value="<?php echo $selected_category['Page']['id']; ?>">
						<?php echo $selected_category['Page']['name']; ?>
					</option>
				<?php endif; ?>
				<?php foreach($categories as $category): ?>
					<option value="<?php echo $category['Page']['id']; ?>">
						<?php echo $category['Page']['name']; ?>
					</option>
				<?php endforeach; ?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-3 control-label" for="document">Document</label>
		<div class="col-lg-9">
			<?php echo $this->Form->input('document', array('type' => 'file', 'label' => false, 'class' => 'form-control', 'class' => 'form-control')); ?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-lg-9 col-lg-offset-3">
			<?php echo $this->Form->button('Add Document', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>
		</div>
	</div>
<?php echo $this->Form->end(); ?>
<?php if (isset($selected_category)): ?>
	<p>
		<?php echo $this->Html->Link('Back to category', array('controller' => 'DocumentCategories', 'action' => 'view', $selected_category['Page']['id'])); ?>
	</p>
<?php endif; ?>
