<?php
$Authentication = new Authentication;
if (!$Authentication->isAdmin()) {
	echo ("<h2>Access Denied.</h2>
	<p>You do not have permission to access this resource. If you believe this is in error, please contact ICT support.</p>
	<p>Your username is <strong>" . $Authentication->Username() . "</strong>.</p>");
} else {
?>
<h1>Edit Page</h1>
<br>
<?php
echo $this->Form->create('Page', array('action' => 'edit'));
echo $this->Form->input('name', array('class' => 'span10', 'placeholder' => 'Title', 'label' => false));
echo $this->Form->input('page', array('class' => 'span10 ckeditor', 'rows' => '30', 'placeholder' => 'Content', 'label' => false));
echo $this->Form->input('id', array('type' => 'hidden'));
?>
<br>
<?php
echo $this->Form->button('Save Page', array('type' => 'submit', 'class' => 'btn btn-primary'));
echo $this->Form->end();
}
?>
