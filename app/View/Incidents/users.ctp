<h3>Start Date <small>Date format: Year-Month-Day</small></h3>
<form method="post" class="form-horizontal">
	<div class="control-group">
		<label class="control-label" for="inputStartdate">Start Date</label>
		<div class="controls">
			<input type="text" name="startDate" id="inputStartdate" value="<?php echo $startdate; ?>">
		</div>
	</div>
	<div class="control-group">
		<div class="controls">
			<button type="submit" class="btn btn-primary">Filter</button>
		</div>
	</div>
</form>

<h3>Incidents by User <small>since <?php echo $startdate; ?></small></h3>
<table class="table table-striped table-condensed table-hover">
	<thead>
		<th width="2%">&nbsp;</th>
		<th width="49%">Name</th>
		<th width="49%">Incidents</th>
	</thead>
	<tbody>
		<?php foreach ($users as $user): ?>
			<tr>
				<td>
					<?php echo $this->Html->Link('View', array('action' => 'incidentsByUser', $user['incident']['username']), array('class' => 'btn btn-mini btn-success')); ?>
				</td>
				<td>
					<?php 
					echo (
						strtoupper(substr($user['incident']['username'], 0, 1)) .
						' ' .
						ucfirst(substr($user['incident']['username'], 1))
					);
					?>
				</td>
				<td><?php echo $user[0]['Number']; ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>