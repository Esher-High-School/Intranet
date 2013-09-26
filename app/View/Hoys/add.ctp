<h3>Add Head of Year</h3>
<div class="row">
	<div class="span4">
		<?php
			echo $this->Form->create('Hoy', array('action' => 'add'));
			echo $this->Form->input('username', array('class' => 'span4', 'placeholder' => 'Username', 'label' => false));
			echo $this->Form->input('year', array('class' => 'span4', 'placeholder' => 'Year', 'label' => false));
			echo $this->Form->button('Create HoY', array('type' => 'submit', 'class' => 'btn btn-primary btn-block'));
			echo $this->Form->end();
		?>
	</div>
	<div class="span3">
		<p style="padding-top: 4px;">Username</p>
		<p style="padding-top: 10px;">Year</p>
	</div>
</div>

<?php echo $this->Form->create('Hoy', array('class' => 'form-horizontal')); ?>
	<div class="control-group">
		<label class="control-label">
			Username
		</label>
		<div class="controls">
			<?php echo $this->Form->input('username', array('label' => false)); ?>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">
			Year
		</label>
		<div class="controls">
			<?php echo $this->Form->input('year', array('label' => false)); ?>
		</div>
	</div>
<?php echo $this->Form->end(); ?>