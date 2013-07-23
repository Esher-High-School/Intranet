<h3>Incident Printing</h3>
<p>
	Student Name: <strong><?php echo $student['Student']['forename'] . ' ' . $student['Student']['surname']; ?></strong>
</p>
<p>
	<?php echo $this->Html->Link('Select another student', array('controller' => 'students', 'action' => 'incidentPrintList')); ?>
</p>
<h4>Select Date Range</h4>
<form class="form-horizontal" method="post">
	<p>Date format: <strong>DD-MM-YYYY</strong>.</p>
	<div class="control-group">
		<label class="control-label">
			Start Date
		</label>
		<div class="controls">
			<input type="text" name="startDate" value="<?php echo $date1; ?>">
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">
			End Date
		</label>
		<div class="controls">
			<input type="text" name="endDate" value="<?php echo $date2; ?>">
		</div>
	</div>
	<div class="control-group">
		<div class="controls">
			<input type="submit" class="btn btn-primary" value="Submit">
		</div>
	</div>
</form>