
<?php echo $this->Form->create('PhoneExtension', array('action' => 'edit', 'class' => 'form-horizontal')); ?>
	<div class="form-group">
		<label class="col-md-3 control-label" for="extension">Extension</label>
		<div class="col-md-9">
			<?php echo $this->Form->input('extension', array('label' => false, 'class' => 'form-control')); ?>
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-3 control-label">Name</label>
		<div class="col-md-9">
			<?php echo $this->Form->input('name', array('class' => 'form-control', 'label' => false, 'class' => 'form-control')); ?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-9 col-md-offset-3">
			<?php echo $this->Form->button('Edit Extension', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>
		</div>
	</div>
<?php
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end(); 
echo $this->Html->Link('View Extensions', array('action' => 'index'));
?>