<?php
echo $this->Form->create('StaffBulletin');
?>

<?php
echo $this->Form->input('title', array('class' => 'form-control', 'placeholder' => 'Title', 'label' => false, 'class' => 'form-control'));
echo $this->Form->input('summary', array('class' => 'form-control', 'placeholder' => 'Summary (used for stickynote)', 'label' => false, 'class' => 'form-control'));
echo $this->Form->input('details', array('class' => 'form-control ckeditor', 'rows' => '15', 'placeholder' => 'Content', 'label' => false, 'class' => 'form-control'));
echo '<br><br>';
echo $this->Form->input('doctitle', array('class' => 'form-control', 'placeholder' => 'Document Title', 'label' => false, 'class' => 'form-control'));
echo $this->Form->input('document', array('class' => 'form-control', 'placeholder' => 'Document URL', 'label' => false, 'class' => 'form-control'));
?>
<?php echo $this->Form->input('published', array('class' => 'form-control', 'type' => 'select', 'options' => $published, 'label' => false, 'class' => 'form-control')); ?>


<?php echo $this->Form->button('Save Bulletin', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>

