<h3>Incident reports by <?php echo $user; ?></h3>
<table class="table table-condensed table-striped table-hover">
	<thead>
		<th>&nbsp;</th>
		<th>Date</th>
		<th>Student</th>
		<th>Description</th>
	</thead>
	<tbody>
		<?php foreach ($incidents as $incident): ?>
			<tr>
				<td>
					<?php echo $this->Html->Link('View', array('action' => 'view', $incident['Incident']['id']), array('class' => 'btn btn-mini btn-success')); ?>
				</td>
				<td><?php echo $incident['Incident']['date']; ?></td>
				<td><?php echo ($incident['Student']['forename'] . ' ' . $incident['Student']['surname']); ?></td>
				<td><?php echo substr($incident['Incident']['incident'], 0, 120); ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>