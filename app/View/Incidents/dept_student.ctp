<h3>Incidents for <?php echo ($student['Student']['forename'] . ' ' . $student['Student']['surname']); ?> in <?php echo $dept; ?></h3>
<table class="table table-condensed table-striped table-hover">
	<thead>
		<th>&nbsp;</th>
		<th>Date</th>
		<th>Subject</th>
		<th>User</th>
		<th>Description</th>
	</thead>
	<tbody>
		<?php foreach ($incidents as $incident): ?>
			<tr>
				<td>
					<?php echo $this->Html->Link('View', array('action' => 'view', $incident['Incident']['id']), array('class' => 'btn btn-mini btn-success')); ?>
				</td>
				<td><?php echo $incident['Incident']['date']; ?></td>
				<td><?php echo $incident['Incident']['subject']; ?></td>
				<td><?php echo $incident['Incident']['username']; ?></td>
				<td><?php echo substr($incident['Incident']['incident'], 0, 120); ?>...</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>