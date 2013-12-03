<p>Date format: Year-Month-Day</p>
<form method="post" class="form-horizontal">
	<div class="form-group">
		<label class="col-lg-2 control-label" for="inputStartdate">Start Date</label>
		<div class="col-lg-10">
			<input type="text" name="startDate" id="inputStartdate" value="<?php echo $startdate; ?>" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-2 control-label" for="inputEnddate">End Date</label>
		<div class="col-lg-10">
			<input type="text" name="endDate" id="inputEnddate" value="<?php echo $enddate; ?>" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-2 control-label" for="inputYear">Year Group</label>
		<div class="col-lg-10">
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
		<div class="col-lg-10 col-lg-offset-2">
			<button type="submit" class="btn btn-primary">Filter</button>
		</div>
	</div>
</form>
<h3>Listing Form Group By Incident Reports <small>Between <?php echo $startdate; ?> and <?php echo $enddate; ?></small></h3>
<table class="table bordered table-striped table-hover table-condensed">
	<thead>
		<th>&nbsp;</th>
		<th>Form Group</th>
		<th>Number of Incidents</th>
	</thead>
	<tbody>
		<?php foreach($groups as $group): ?>
			<tr>
				<td width="10%">
					<?php echo $this->Html->Link('View', array('action' => 'tutorgroup', $group['students']['form']), array('class' => 'btn btn-success btn-xs')); ?>
				</td>
				<td>
					<?php echo $group['students']['form']; ?>
				</td>
				<td>
					<?php echo $group[0]['Number']; ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>