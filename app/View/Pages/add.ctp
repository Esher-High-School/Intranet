<?php
$Authentication = new Authentication;
if (!$Authentication->isAdmin()) {
	echo ("<h2>Access Denied</h2>
	<p>You do not have permission to access this resource. If you believe this is in error, please contact ICT support.</p>
	<p>Your username is <strong>" . $Authentication->Username() . "</strong>.</p>");
} else {
?>
<h3>Add Page</h3>
<?php
echo $this->Form->create('Page');
echo $this->Form->input('name', array('class' => 'input-block-level', 'placeholder' => 'Title', 'label' => false));
echo $this->Form->input('page', array('class' => 'input-block-level ckeditor', 'rows' => '15', 'placeholder' => 'Content', 'label' => false));
echo $this->Form->button('Save Page', array('type' => 'submit', 'class' => 'btn btn-primary'));
}?>