<form method="post" class="form-horizontal">
	<div class="form-group">
		<label class="col-lg-2 control-label" for="inputStartdate">Start Date</label>
		<div class="col-lg-10">
			<input type="text" name="startDate" id="inputStartdate" value="<?php echo $startdate; ?>" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<div class="col-lg-10 col-lg-offset-2">
			<button type="submit" class="btn btn-primary">Filter</button>
		</div>
	</div>
</form>

<h3>Incidents since <?php echo $startdate; ?></h3>
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
					<?php echo $this->Html->Link('View', array('action' => 'incidentsByUser', $user['incident']['username']), array('class' => 'btn btn-xs btn-success')); ?>
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