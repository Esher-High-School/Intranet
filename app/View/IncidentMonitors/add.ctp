<?php
$Authentication = new Authentication;
?>
<h3>Monitor Student</h3>
<?php echo $this->Form->create('IncidentMonitor', array('action' => 'add', 'class' => 'form-horizontal')); ?>
	<?php echo $this->Form->input('upn', array('value' => $upn, 'type' => 'hidden')); ?>
	<?php echo $this->Form->input('username', array('value' => $Authentication->username(), 'type' => 'hidden')); ?>
	<div class="control-group">
		<label class="control-label" for="inputStudent">Student Name</label>
		<div class="controls">
			<input type="text" id="inputStudent" value="<?php echo ($student['Student']['forename'] . ' ' . $student['Student']['surname']); ?>" disabled></input> 
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="inputForm">Student Form</label>
		<div class="controls">
			<input type="text" id="inputForm" value="<?php echo $student['Student']['form']; ?>" disabled></input>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="inputStartDate">Start Date</label>
		<div class="controls">
			<?php
			echo $this->Form->input('dateadded', array('label' => false, 'value' => date('Y-m-d'), 'id' => 'inputStartDate', 'style' => 'width: 30%')); ?>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="inputEndDate">End Date</label>
		<div class="controls">
			<?php
			$date = strtotime("+14 day", strtotime(date('Y-m-d')));
			echo $this->Form->input('enddate', array('label' => false, 'value' => date('Y-m-d', $date), 'id' => 'inputEndDate', 'style' => 'width: 30%'));
			?>
		</div>
	</div>
	<div class="control-group">
		<div class="controls">
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
	</div>
<?php echo $this->Form->end(); ?>