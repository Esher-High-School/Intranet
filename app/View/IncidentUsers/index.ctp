<?php
function displayPermission($value) {
	if ($value == 1) {
		return 'Yes';
	} else {
		return 'No';
	}
}
?>
<table class="table table-striped table-hover table-condensed table-centered">
	<thead>
		<th>Username</th>
		<th>Incident Monitoring</th>
		<th>Incident Printing</th>
		<th width="5%">
			<?php echo $this->Html->Link('Add', array('action' => 'add'), array('class' => 'btn btn-primary btn-xs')); ?>
		</th>
		<th></th>
	</thead>
	<tbody>
		<?php foreach($incidentusers as $incidentuser): ?>
			<tr>
				<td><?php echo $incidentuser['IncidentUser']['username']; ?></td>
				<td><?php echo displayPermission($incidentuser['IncidentUser']['monitoring']); ?></td>
				<td><?php echo displayPermission($incidentuser['IncidentUser']['printing']); ?></td>
				<td>
					<?php 
					echo $this->Html->Link('Edit', array('action' => 'edit', $incidentuser['IncidentUser']['id']), array('escape' => false)); ?>
				</td>
				<td>
					<?php
					echo $this->Form->postLink('Delete', array('action' => 'delete', $incidentuser['IncidentUser']['id']), array('escape' => false));
					?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
