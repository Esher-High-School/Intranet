<?php echo $this->Form->create('Student', array('class' => 'form-horizontal', 'inputDefaults' => array('class' => 'form-horizontal', 'error' => array('wrap' => 'div', 'class' => 'inputError')))); ?>
	<div class="form-group">
		<label class="col-lg-3 control-label" for="forenameInput">Forename</label>
		<div class="col-lg-9">
			<?php echo $this->Form->input('forename', array('label' => false, 'class' => 'form-control', 'id' => 'forenameInput')); ?>
		</div>
	</div>

	<div class="form-group">
		<label class="col-lg-3 control-label" for="surnameInput">Surname</label>
		<div class="col-lg-9">
			<?php echo $this->Form->input('surname', array('label' => false, 'class' => 'form-control', 'id' => 'surnameInput')); ?>
		</div>
	</div>

	<div class="form-group">
		<label class="col-lg-3 control-label" for="dobInput">
			Date of Birth<br>
			<small>(example: 16-Jun-1999)</small>
		</label>
		<div class="col-lg-9">
			<?php echo $this->Form->input('dob', array('label' => false, 'class' => 'form-control', 'id' => 'dobInput')); ?>
		</div>
	</div>

	<div class="form-group">
		<label class="col-lg-3 control-label" for="genderInput">
			Gender<br>
			<small>(example: M or F)</small>
		</label>
		<div class="col-lg-9">
			<?php echo $this->Form->input('gender', array('label' => false, 'class' => 'form-control', 'id' => 'genderInput')); ?>
		</div>
	</div>

	<div class="form-group">
		<label class="col-lg-3 control-label" for="adnoInput">
			Admission Number<br>
			<small>(From SIMS)</small>
		</label>
		<div class="col-lg-9">
			<?php echo $this->Form->input('adno', array('label' => false, 'class' => 'form-control', 'id' => 'adnoInput')); ?>
		</div>
	</div>

	<div class="form-group">
		<label class="col-lg-3 control-label" for="upnInput">
			UPN<br>
			<small>(cannot be changed)</small>
		</label>
		<div class="col-lg-9">
			<?php echo $this->Form->input('upn', array('label' => false, 'class' => 'form-control', 'id' => 'upnInput', 'type' => 'text')); ?>
		</div>
	</div>

	<div class="form-group">
		<label class="col-lg-3 control-label" for="yearInput">
			School Year<br>
			<small>(example: 8)</small>
		</label>
		<div class="col-lg-9">
			<?php echo $this->Form->input('year', array('label' => false, 'class' => 'form-control', 'id' => 'yearInput')); ?>
		</div>
	</div>

	<div class="form-group">
		<label class="col-lg-3 control-label" for="formInput">
			Tutor Group<br>
			<small>(example: 8AZ)</small>
		</label>
		<div class="col-lg-9">
			<?php echo $this->Form->input('form', array('label' => false, 'class' => 'form-control', 'id' => 'formInput')); ?>
		</div>
	</div>

	<div class="form-group">
		<label class="col-lg-3 control-label" for="postcodeInput">
			Postcode
		</label>
		<div class="col-lg-9">
			<?php echo $this->Form->input('postcode', array('label' => false, 'class' => 'form-control', 'id' => 'postcodeInput')); ?>
		</div>
	</div>

	<div class="form-group">
		<label class="col-lg-3 control-label" for="senInput">
			Special Educational Needs
		</label>
		<div class="col-lg-9">
			<?php echo $this->Form->input('sen', array('label' => false, 'class' => 'form-control', 'id' => 'senInput')); ?>
		</div>
	</div>

	<div class="form-group">
		<label class="col-lg-3 control-label" for="onrollInput">
			On Roll<br>
			<small>(example: Y or N)</small>
		</label>
		<div class="col-lg-9">
			<?php echo $this->Form->input('onroll', array('label' => false, 'class' => 'form-control', 'id' => 'onrollInput')); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-lg-9">
			<?php echo $this->Form->button('Add Student', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>
		</div>
	</div>
<?php echo $this->Form->end();
