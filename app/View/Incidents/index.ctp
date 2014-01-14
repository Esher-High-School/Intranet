<form method="post" class="form-horizontal">
	<div class="form-group">
		<label class="col-md-2 control-label" for="inputStartdate">Start Date</label>
		<div class="col-md-10">
			<input type="text" name="startDate" id="inputStartdate" value="<?php echo $startdate; ?>" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-2 control-label" for="inputEnddate">End Date</label>
		<div class="col-md-10">
			<input type="text" name="endDate" id="inputEnddate" value="<?php echo $enddate; ?>" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-2 control-label" for="inputYear">Year Group</label>
		<div class="col-md-10">
			<select name="yearGroup" class="form-control">
				<?php if ($posted == true) { ?>
				<option value="<?php echo $year; ?>">
					<?php
						if (is_numeric($year)) {
							echo ('Year ' . $year);
						} elseif($year == 'any') {
							echo ('All Years');
						} else {
							echo ($year);
						}
					?>
				</option>
				<?php } ?>
				<option value="any">All Years</option>
				<option value="7">Year 7</option>
				<option value="8">Year 8</option>
				<option value="9">Year 9</option>
				<option value="10">Year 10</option>
				<option value="11">Year 11</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-10 col-md-offset-2">
			<button type="submit" class="btn btn-primary">Filter</button>
		</div>
	</div>
</form>
<?php
if ($year=='' or $year=='any') {
	$year = 'all years';
}
if (is_numeric($year)) {
	$year = ('Year ' . $year);
}
?>
<h3>Incident Reports <small>Between <?php echo $startdate; ?> and <?php echo $enddate; ?> in <?php echo $year; ?></small></h3>
<table class="table table-condensed table-striped table-hover">
	<thead>
		<th width="1%">&nbsp;</th>
		<th width="1%">Incidents</th>
		<th>Name</th>
		<th>Tutor Group</th>
	</thead>
	<tbody>
		<?php foreach ($incidents as $incident): ?>
			<tr>
				<td>
					<?php echo $this->Html->Link('View', array('action' => 'student', $incident['incident']['upn']), array('class' => 'btn btn-xs btn-success')); ?>
				</td>
				<td><?php echo $incident[0]['Number']; ?></td>
				<td><?php echo $incident['students']['forename']; ?> <?php echo $incident['students']['surname']; ?></td>
				<td><?php echo $this->Html->Link($incident['students']['form'], array('action' => 'form', $incident['students']['form'])); ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>