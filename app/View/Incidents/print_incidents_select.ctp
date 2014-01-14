<p>
	Student Name: <strong><?php echo $student['Student']['forename'] . ' ' . $student['Student']['surname']; ?></strong>
</p>
<p>
	<?php echo $this->Html->Link('Select another student', array('controller' => 'students', 'action' => 'incidentPrintList')); ?>
</p>
<h4>Select Date Range</h4>
<form class="form-horizontal" method="post">
	<p>Date format: <strong>DD-MM-YYYY</strong>.</p>
	<div class="form-group">
		<label class="col-md-2 control-label">
			Start Date
		</label>
		<div class="col-md-9">
			<input type="text" name="startDate" value="<?php echo $date1; ?>" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-2 control-label">
			End Date
		</label>
		<div class="col-md-9">
			<input type="text" name="endDate" value="<?php echo $date2; ?>" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-9 col-md-offset-2">
			<input type="submit" class="btn btn-primary" value="Submit">
		</div>
	</div>
</form>