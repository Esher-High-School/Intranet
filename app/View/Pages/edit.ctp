<h3>Edit Page</h3>
<?php
echo $this->Form->create('Page', array('action' => 'edit'));
echo $this->Form->input('name', array('class' => 'span9', 'placeholder' => 'Title', 'label' => false));
echo $this->Form->input('page', array('class' => 'span9 ckeditor', 'rows' => '30', 'placeholder' => 'Content', 'label' => false));
echo $this->Form->input('id', array('type' => 'hidden'));
?>
<br>
<?php echo $this->Form->button('Save Page', array('type' => 'submit', 'class' => 'btn btn-primary')); ?> 
<?php echo $this->Html->Link('View Page', array('action' => 'view', $id), array('class' => 'btn'));
echo $this->Form->end();