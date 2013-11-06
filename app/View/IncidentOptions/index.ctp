<table class="table table-striped table-hover table-condensed table-centered">
	<thead>
		<th width="80%">Name</th>
		<th><?php echo $this->Html->Link('Add Option', array('action' => 'add'), array('class' => 'btn btn-primary btn-xs')); ?></th>
	</thead>
	<tbody>
		<?php foreach($incidentoptions as $option): ?>
			<tr>
				<td><?php echo $option['IncidentOption']['name']; ?></td>
				<td>
					<?php echo $this->Html->Link('<i class="icon-pencil black"></i>', array('action' => 'edit', $option['IncidentOption']['id']), array('escape' => false)); ?>
					<?php echo $this->Html->Link('<i class="icon-remove black"></i>', array('action' => 'delete', $option['IncidentOption']['id']), array('escape' => false)); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>