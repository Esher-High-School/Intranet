<?php
$Authentication = new Authentication;
if (!$Authentication->isAdmin()) {
	echo ("<h2>Access Denied.</h2>
	<p>You do not have permission to access this resource. If you believe this is in error, please contact ICT support.</p>
	<p>Your username is <strong>" . $Authentication->Username() . "</strong>.</p>");
} else {
?>
<h3>Add Student</h3>
<div class="row">
	<div class="span4">
		<?php
		echo $this->Form->create('Student', array('inputDefaults' => array('class' => 'span4', 'error' => array('wrap' => 'div', 'class' => 'inputError'))));
		echo $this->Form->input('surname', array('placeholder' => 'Surname', 'label' => false));
		echo $this->Form->input('forename', array('placeholder' => 'Forename', 'label' => false));
		echo $this->Form->input('DOB', array('placeholder' => 'Date of Birth', 'label' => false));
		echo $this->Form->input('sex', array('placeholder' => 'Sex', 'label' => false));
		echo $this->Form->input('adno', array('placeholder' => 'Admission Number', 'label' => false));
		echo $this->Form->input('upn', array('placeholder' => 'UPN', 'label' => false, 'type' => 'text'));
		echo $this->Form->input('year', array('placeholder' => 'Year', 'label' => false));
		echo $this->Form->input('form', array('placeholder' => 'Form', 'label' => false));
		echo $this->Form->input('postcode', array('placeholder' => 'Postcode', 'label' => false));
		echo $this->Form->input('sen', array('placeholder' => 'SEN', 'label' => false));
		echo $this->Form->input('onroll', array('placeholder' => 'On roll?', 'label' => false));
		echo $this->Form->button('Save Student', array('type' => 'submit', 'class' => 'btn btn-primary'));
		echo $this->Form->end();
		?>
	</div>
	<div class="span3">
		<p style="padding-top: 4px;">The student's surname</p>
		<p style="padding-top: 10px;">The student's forename</p>
		<p style="padding-top: 10px;">Date of birth ie 16-Jun-1999</p>
		<p style="padding-top: 10px;">Sex - Type either M or F</p>
		<p style="padding-top: 10px;">Admission number - from SIMS</p>
		<p style="padding-top: 10px;">UPN - This cannot be edited</p>
		<p style="padding-top: 10px;">School year: For example: 8</p>
		<p style="padding-top: 10px;">Form group: Example 8AZ</p>
		<p style="padding-top: 10px;">Student's postcode</p>
		<p style="padding-top: 10px;">Special Educational Needs</p>
		<p style="padding-top: 10px;">On roll - Type Y or N</p>
	</div>
</div>
<?php } ?>