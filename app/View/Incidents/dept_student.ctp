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
					<?php echo $this->Html->Link('View', array('action' => 'view', $incident['Incident']['id']), array('class' => 'btn btn-xs btn-success')); ?>
				</td>
				<td><?php echo $incident['Incident']['date']; ?></td>
				<td><?php echo $incident['Incident']['subject']; ?></td>
				<td><?php echo $incident['Incident']['username']; ?></td>
				<td><?php echo substr($incident['Incident']['incident'], 0, 120); ?>...</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>