<?php
	if (isset($hod[0])) {
		echo $this->Html->Link('Back to My Department', array('controller' => 'incidents', 'action' => 'hodHome'));
	}
?>
<h3><?php echo $dept; ?> Incident List</h3>
<?php if(isset($hod[1])) { ?>
<h4>Select Department</h4>
<form method="post" class="form-horizontal">
	<div class="control-group">
		<label class="control-label" for="department">Department</label>
		<div class="controls">
			<select name="department">
				<?php foreach($hod as $dept2): ?>
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
<?php
} elseif(isset($smt['Smt']['username'])) {
?>
<h4>Select Department</h4>
<form method="post" class="form-horizontal">
	<div class="control-group">
		<label class="control-label" for="department">Department</label>
		<div class="controls">
			<select name="department">
				<?php foreach($departments as $dept2): ?>
					<option value="<?php echo $dept2['incident']['subject']; ?>">
						<?php echo $dept2['incident']['subject']; ?>
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
<table class="table table-striped table-condensed table-hover">
	<thead>
		<th>&nbsp;</th>
		<th>Name</th>
		<th>Incidents</th>
	</thead>
	<tbody>
		<?php foreach($incidents as $incident): ?>
			<tr>
				<td><?php echo $this->Html->Link('View', array('action' => 'deptStudent', $dept, $incident['incident']['upn']), array('class' => 'btn btn-success btn-mini')); ?>
				<td><?php echo $incident['students']['forename'] . ' ' . $incident['students']['surname']; ?></td>
				<td><?php echo $incident[0]['Number']; ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>