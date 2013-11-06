<form method="post" class="form-horizontal">
	<div class="form-group">
		<label class="col-lg-3 control-label" for="inputStartdate">Start Date</label>
		<div class="col-lg-9">
			<input type="text" name="startDate" id="inputStartdate" value="<?php echo $startdate; ?>">
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-3 control-label" for="inputEnddate">End Date</label>
		<div class="col-lg-9">
			<input type="text" name="endDate" id="inputEnddate" value="<?php echo $enddate; ?>">
		</div>
	</div>
	<div class="form-group">
		<div class="col-lg-9">
			<button type="submit" class="btn btn-primary">Filter</button>
		</div>
	</div>
</form>
<h3>Listing Year Groups</h3>
<table class="table bordered table-striped table-hover table-condensed">
	<thead>
		<th>&nbsp;</th>
		<th>Year Group</th>
		<th>Number of Incidents</th>
	</thead>
	<tbody>
		<?php foreach($groups as $group): ?>
			<tr>
				<td width="10%">
					<?php echo $this->Html->Link('View', array('action' => 'incidentsByYear', $group['students']['year']), array('class' => 'btn btn-success btn-xs')); ?>
				</td>
				<td>
					<?php echo $group['students']['year']; ?>
				</td>
				<td>
					<?php echo $group[0]['Number']; ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>