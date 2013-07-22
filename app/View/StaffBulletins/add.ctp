<h3>Add Bulletin</h3>
<br>
<?php
echo $this->Form->create('StaffBulletin');
echo $this->Form->input('title', array('class' => 'input-block-level', 'placeholder' => 'Title', 'label' => false));
echo $this->Form->input('summary', array('class' => 'input-block-level', 'placeholder' => 'Summary (used for stickynote)', 'label' => false));
echo $this->Form->input('details', array('class' => 'input-block-level ckeditor', 'rows' => '15', 'placeholder' => 'Content', 'label' => false));
echo '<br><br>';
echo $this->Form->input('doctitle', array('class' => 'input-block-level', 'placeholder' => 'Document Title', 'label' => false));
echo $this->Form->input('document', array('class' => 'input-block-level', 'placeholder' => 'Document URL', 'label' => false));
?>
<?php echo $this->Form->input('published', array('class' => 'input-block-level', 'type' => 'select', 'options' => $published, 'label' => false)); ?>


<?php echo $this->Form->button('Save Bulletin', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>

