<?php echo $this->Form->create('Document', array('type' => 'file', 'action' => 'add', 'class' => 'form-horizontal')); ?>
	<div class="form-group">
		<label class="col-md-2 control-label" for="name">Name</label>
		<div class="col-md-10">
			<?php echo $this->Form->input('name', array('label' => false, 'class' => 'form-control', 'class' => 'form-control')); ?>
		</div>
	</div>

	<?php 
	if (isset($selected_category)):
		echo $this->Form->input('page_id', array('type' => 'hidden', 'value' => $selected_category['Page']['id'])); 
	else:
	?>
		<div class="form-group">
			<label class="col-md-2 control-label" for="category">Category</label>
			<div class="col-md-10">
				<select name="data[Document][page_id]" class="form-control" required="required">
					<?php foreach($categories as $category): ?>
						<option value="<?php echo $category['Page']['id']; ?>">
							<?php echo $category['Page']['name']; ?>
						</option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
	<?php endif; ?>

	<div class="form-group">
		<label class="col-md-2 control-label" for="document">Document</label>
		<div class="col-md-10">
			<?php echo $this->Form->input('document', array('type' => 'file', 'label' => false, 'class' => 'form-control', 'class' => 'form-control')); ?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-10 col-md-offset-2">
			<?php echo $this->Form->button('Add Document', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>
		</div>
	</div>
<?php echo $this->Form->end(); ?>
<?php if (isset($selected_category)): ?>
	<p>
		<?php echo $this->Html->Link('Back to page', array('controller' => 'pages', 'action' => 'view', $selected_category['Page']['id'])); ?>
	</p>
<?php endif; ?>