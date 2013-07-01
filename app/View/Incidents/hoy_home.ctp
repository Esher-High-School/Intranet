<h3>My Year Group</h3>
<h4>Select Year Group</h4>
<form method="post" class="form-horizontal">
	<div class="control-group">
		<label class="control-label" for="year">Year Group</label>
		<div class="controls">
			<select name="yearGroups">
				<?php foreach ($hoy as $year): ?>
					<option value="<?php echo $year['Hoy']['year']; ?>">
						Year <?php echo $year['Hoy']['year']; ?>
					</option>
				<?php endforeach; ?>
			</select>
		</div>
	</div>
	<div class="control-group">
		<div class="controls">
			<input type="submit" class="btn btn-primary" value="Select Year Group">
		</div>
	</div>
</form>

<h4>Year <?php echo $year['Hoy']['year']; ?></h4>
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
					<?php echo $this->Html->Link('View', array('controller' => 'incidents', 'action' => 'student', $student['incident']['upn']), array('class' => 'btn btn-mini btn-success')); ?>
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