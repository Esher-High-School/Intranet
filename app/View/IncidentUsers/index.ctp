<?php
function displayPermission($value) {
	if ($value == 1) {
		return 'Yes';
	} else {
		return 'No';
	}
}
?>
<h3>Incident Users</h3>
<table class="table table-striped table-hover table-condensed">
	<thead>
		<th>Username</th>
		<th>Incident Monitoring</th>
		<th>Incident Printing</th>
		<th width="5%">
			<?php echo $this->Html->Link('Add', array('action' => 'add'), array('class' => 'btn btn-primary btn-mini')); ?>
		</th>
	</thead>
	<tbody>
		<?php foreach($incidentusers as $incidentuser): ?>
			<tr>
				<td><?php echo $incidentuser['IncidentUser']['username']; ?></td>
				<td><?php echo displayPermission($incidentuser['IncidentUser']['monitoring']); ?></td>
				<td><?php echo displayPermission($incidentuser['IncidentUser']['printing']); ?></td>
				<td>
					<?php 
					echo $this->Html->Link('<i class="icon-pencil"></i>', array('action' => 'edit', $incidentuser['IncidentUser']['id']), array('escape' => false)); 
					echo ' ';
					echo $this->Form->postLink('<i class="icon-trash"></i>', array('action' => 'delete', $incidentuser['IncidentUser']['id']), array('escape' => false));
					?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
