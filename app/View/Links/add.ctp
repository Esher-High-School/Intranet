<h3>Add Link</h3>
<?php echo $this->Form->create('Link', array('action' => 'add', 'class' => 'form-horizontal')); ?>
	<div class="form-group">
		<label class="col-md-3 control-label" for="typeInput">Type</label>
		<div class="col-md-9">
			<select name="data[Link][type]">
				<?php 
				$t = 0;
				foreach($types as $type): ?>
					<option value="<?php echo $t; ?>">
						<?php echo $type; ?>
					</option>
				<?php
				$t++;
				endforeach; 
				?>
			</select>
		</div>
	</div>
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
		<div class="col-md-9 col-md-offset-3">
			<?php echo $this->Form->button('Save Link', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>
		</div>
	</div>
<?php echo $this->Form->end(); ?>
<p><?php echo $this->Html->Link('Cancel and return to index', array('action' => 'index')); ?></p>
