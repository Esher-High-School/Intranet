<?php echo $this->Form->create('Link', array('action' => 'edit', 'class' => 'form-horizontal')); ?>
	<div class="form-group">
		<label class="col-md-3 control-label" for="nameInput">Name</label>
		<div class="col-md-9">
			<?php echo $this->Form->input('menu', array('class' => 'form-control','id' => 'nameInput', 'label' => false, 'class' => 'form-control')); ?>
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-3 control-label" for="urlInput">URL</label>
		<div class="col-md-9">
			<?php echo $this->Form->input('link', array('type' => 'text', 'class' => 'form-control', 'id' => 'urlInput', 'label' => false, 'class' => 'form-control')); ?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-9">
			<?php echo $this->Form->button('Save Link', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>
		</div>
	</div>
<?php echo $this->Form->end(); ?>
<p><?php echo $this->Html->Link('Cancel and return to index', array('action' => 'index')); ?></p>