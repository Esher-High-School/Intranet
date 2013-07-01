<h3>Add Bulletin</h3>
<br>
<?php
echo $this->Form->create('StaffBulletin');
echo $this->Form->input('title', array('class' => 'span10', 'placeholder' => 'Title', 'label' => false));
echo $this->Form->input('summary', array('class' => 'span10', 'placeholder' => 'Summary (used for stickynote)', 'label' => false));
echo $this->Form->input('details', array('class' => 'span10 ckeditor', 'rows' => '15', 'placeholder' => 'Content', 'label' => false));
echo '<br><br>';
echo $this->Form->input('doctitle', array('class' => 'span10', 'placeholder' => 'Document Title', 'label' => false));
echo $this->Form->input('document', array('class' => 'span10', 'placeholder' => 'Document URL', 'label' => false));
?>
<div class="row">
	<div class="span5">
		<?php echo $this->Form->button('Save Bulletin', array('type' => 'submit', 'class' => 'btn btn-primary btn-block')); ?>
	</div>
	<div class="span5">
		<?php echo $this->Form->input('published', array('class' => 'span5', 'type' => 'select', 'options' => $published, 'label' => false)); ?>
	</div>
</div>