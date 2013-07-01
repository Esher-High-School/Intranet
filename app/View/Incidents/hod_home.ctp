<h3>My Department</h3>
<?php if (isset($hod[1])) {?>
<h4>Select Department</h4>
<form method="post" class="form-horizontal">
	<div class="control-group">
		<label class="control-label" for="year">Department</label>
		<div class="controls">
			<select name="department">
				<?php foreach ($hod as $dept2): ?>
					<option value="<?php echo $dept2['Hod']['dept']; ?>">
						<?php echo $dept2['Hod']['dept']; ?>
					</option>
				<?php endforeach; ?>
			</select>
		</div>
	</div>
	<div class="control-group">
		<div class="controls">
			<input type="submit" class="btn btn-primary" value="Select Department">
		</div>
	</div>
</form>
<?php } ?>
<h4><?php echo $dept; ?> Department</h4>
<p>There have been <?php echo $count; ?> incidents since the start of the academic year.</p>
<h4>Top 20 Offending Students</h4>
<p><?php echo $this->Html->Link('List All Students', array('controller' => 'incidents', 'action' => 'incidentsByDepartment', $dept)); ?>
<table class="table table-striped table-hover table-condensed">
	<thead>
		<th>&nbsp;</th>
		<th>Student Name</th>
		<th>Form</th>
		<th>Number of incidents</th>
	</thead>
	<tbody>
		<?php foreach ($students as $student): ?>
			<tr>
				<td width="5%">
					<?php echo $this->Html->Link('View', array('controller' => 'incidents', 'action' => 'deptStudent', $dept, $student['incident']['upn']), array('class' => 'btn btn-mini btn-success')); ?>
				</td>
				<td width="60%">
					<?php
					echo (
						$student['students']['forename'] . ' ' .
						$student['students']['surname']
					);
					?>
				</td>
				<td width="1%">
					<?php echo $student['students']['form']; ?>
				</td>
				<td>
					<?php echo $student[0]['Number']; ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
	
</table>