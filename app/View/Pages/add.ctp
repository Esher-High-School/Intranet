<?php
$Authentication = new Authentication;
if (!$Authentication->isAdmin()) {
	echo ("<h2>Access Denied</h2>
	<p>You do not have permission to access this resource. If you believe this is in error, please contact ICT support.</p>
	<p>Your username is <strong>" . $Authentication->Username() . "</strong>.</p>");
} else {
?>
<?php
echo $this->Form->create('Page');
echo $this->Form->input('name', array('class' => 'form-control', 'placeholder' => 'Title', 'label' => false, 'class' => 'form-control'));
echo $this->Form->input('page', array('class' => 'form-control ckeditor', 'rows' => '15', 'placeholder' => 'Content', 'label' => false, 'class' => 'form-control'));
echo $this->Form->button('Save Page', array('type' => 'submit', 'class' => 'btn btn-primary'));
}?>