<h3>Edit Extension</h3>
<?php echo $this->Form->create('PhoneExtension', array('action' => 'edit', 'class' => 'form-horizontal')); ?>
	<div class="control-group">
		<label class="control-label" for="extension">Extension</label>
		<div class="controls">
			<?php echo $this->Form->input('extension', array('label' => false)); ?>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">Name</label>
		<div class="controls">
			<?php echo $this->Form->input('name', array('class' => 'input-block-level', 'label' => false)); ?>
		</div>
	</div>
<?php 
echo $this->Form->button('Edit Extension', array('type' => 'submit', 'class' => 'btn btn-primary'));
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end(); 
echo $this->Html->Link('View Extensions', array('action' => 'index'));
?>