<h3>Add Link</h3>
<?php echo $this->Form->create('Link', array('action' => 'add', 'class' => 'form-horizontal')); ?>
	<div class="control-group">
		<label class="control-label" for="nameInput">Name</label>
		<div class="controls">
			<?php echo $this->Form->input('menu', array('class' => 'input-block-level','id' => 'nameInput', 'label' => false)); ?>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="urlInput">URL</label>
		<div class="controls">
			<?php echo $this->Form->input('link', array('type' => 'text', 'class' => 'input-block-level', 'id' => 'urlInput', 'label' => false)); ?>
		</div>
	</div>
	<div class="control-group">
		<div class="controls">
			<?php echo $this->Form->button('Save Link', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>
		</div>
	</div>
<?php echo $this->Form->end(); ?>
<p><?php echo $this->Html->Link('Cancel and return to index', array('action' => 'index')); ?></p>