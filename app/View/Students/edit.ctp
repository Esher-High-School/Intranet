<h3>Edit Student</h3>
<?php echo $this->Form->create('Student', array('class' => 'form-horizontal', 'inputDefaults' => array('class' => 'form-horizontal', 'error' => array('wrap' => 'div', 'class' => 'inputError')))); ?>
	<div class="control-group">
		<label class="control-label" for="forenameInput">Forename</label>
		<div class="controls">
			<?php echo $this->Form->input('forename', array('label' => false, 'id' => 'forenameInput')); ?>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label" for="surnameInput">Surname</label>
		<div class="controls">
			<?php echo $this->Form->input('surname', array('label' => false, 'id' => 'surnameInput')); ?>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label" for="dobInput">
			Date of Birth<br>
			<small>(example: 16-Jun-1999)</small>
		</label>
		<div class="controls">
			<?php echo $this->Form->input('dob', array('label' => false, 'id' => 'dobInput')); ?>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label" for="sexInput">
			Sex<br>
			<small>(example: M or F)</small>
		</label>
		<div class="controls">
			<?php echo $this->Form->input('sex', array('label' => false, 'id' => 'sexInput')); ?>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label" for="adnoInput">
			Admission Number<br>
			<small>(From SIMS)</small>
		</label>
		<div class="controls">
			<?php echo $this->Form->input('adno', array('label' => false, 'id' => 'adnoInput')); ?>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label" for="upnInput">
			UPN<br>
			<small>(cannot be changed)</small>
		</label>
		<div class="controls">
			<?php echo $this->Form->input('upn', array('label' => false, 'id' => 'upnInput', 'type' => 'text')); ?>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label" for="yearInput">
			School Year<br>
			<small>(example: 8)</small>
		</label>
		<div class="controls">
			<?php echo $this->Form->input('year', array('label' => false, 'id' => 'yearInput')); ?>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label" for="formInput">
			Tutor Group<br>
			<small>(example: 8AZ)</small>
		</label>
		<div class="controls">
			<?php echo $this->Form->input('form', array('label' => false, 'id' => 'formInput')); ?>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label" for="postcodeInput">
			Postcode
		</label>
		<div class="controls">
			<?php echo $this->Form->input('postcode', array('label' => false, 'id' => 'postcodeInput')); ?>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label" for="senInput">
			Special Educational Needs
		</label>
		<div class="controls">
			<?php echo $this->Form->input('sen', array('label' => false, 'id' => 'senInput')); ?>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label" for="onrollInput">
			On Roll<br>
			<small>(example: Y or N)</small>
		</label>
		<div class="controls">
			<?php echo $this->Form->input('onroll', array('label' => false, 'id' => 'onrollInput')); ?>
		</div>
	</div>

	<div class="control-group">
		<div class="controls">
			<?php echo $this->Form->button('Edit Student', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>
		</div>
	</div>
<?php echo $this->Form->end();