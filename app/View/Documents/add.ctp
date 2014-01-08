<?php echo $this->Form->create('Document', array('type' => 'file', 'action' => 'add', 'class' => 'form-horizontal')); ?>
	<div class="form-group">
		<label class="col-lg-2 control-label" for="name">Name</label>
		<div class="col-lg-10">
			<?php echo $this->Form->input('name', array('label' => false, 'class' => 'form-control', 'class' => 'form-control')); ?>
		</div>
	</div>
	<?php echo $this->Form->input('category_id', array('type' => 'hidden', 'value' => $selected_category['Page']['id'])); ?>
	<div class="form-group">
		<label class="col-lg-2 control-label" for="document">Document</label>
		<div class="col-lg-10">
			<?php echo $this->Form->input('document', array('type' => 'file', 'label' => false, 'class' => 'form-control', 'class' => 'form-control')); ?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-lg-10 col-lg-offset-2">
			<?php echo $this->Form->button('Add Document', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>
		</div>
	</div>
<?php echo $this->Form->end(); ?>
<?php if (isset($selected_category)): ?>
	<p>
		<?php echo $this->Html->Link('Back to page', array('controller' => 'Pages', 'action' => 'view', $selected_category['Page']['id'])); ?>
	</p>
<?php endif; ?>
