<h3>Add Link</h3>
<div class="row">
	<div class="span1">
		<p style="padding-top: 4px; text-align: center;">
			Name
		</p>
		<p style="padding-top: 12px; text-align: center;">
			URL
		</p>
		<p style="padding-top: 12px; text-align: center;">
			Status
		</p>
	</div>
	<div class="span6">
		<?php 
		echo $this->Form->create('Link');
		echo $this->Form->input('menu', array('class' => 'span6', 'label' => false));
		echo $this->Form->input('link', array('class' => 'span6', 'label' => false));
		echo $this->Form->input('status', array('class' => 'span6', 'type' => 'select', 'options' => $statuses, 'label' => false));
		echo $this->Form->button('Save Link', array('type' => 'submit', 'class' => 'btn btn-primary btn-block'));
		?>
	</div>
</div>
<p><?php echo $this->Html->Link('Cancel and return to index', array('action' => 'index')); ?></p>