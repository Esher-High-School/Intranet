<?php echo $this->Form->create('Document', array('action' => 'edit', 'class' => 'form-horizontal')); ?>
	<div class="form-group">
		<label class="col-md-2 control-label" for="name">Name</label>
		<div class="col-md-10">
			<?php echo $this->Form->input('name', array('label' => false, 'class' => 'form-control', 'class' => 'form-control')); ?>
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-2 control-label" for="category">
			Page<br>
			<small>
				<?php echo $this->Html->link('(List Pages)', array('controller' => 'Pages', 'action' => 'index')); ?>
			</small>
		</label>
		<div class="col-md-10">
			<select name="data[Document][category_id]" class="form-control">
				<option value="<?php echo $document_category['Page']['id']; ?>">
					<?php echo $document_category['Page']['name']; ?>
				</option>
				<?php foreach($categories as $category): ?>
					<option value="<?php echo $category['Page']['id']; ?>">
						<?php echo $category['Page']['name']; ?>
					</option>
				<?php endforeach; ?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-10 col-md-offset-2">
			<?php echo $this->Form->button('Save Document', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>
		</div>
	</div>
<?php echo $this->Form->end(); ?>
