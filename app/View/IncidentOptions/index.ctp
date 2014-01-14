<table class="table table-striped table-hover table-condensed table-centered">
	<thead>
		<th width="80%">Name</th>
		<th>
			<?php echo $this->Html->Link('Add', array('action' => 'add'), array('class' => 'btn btn-primary btn-xs')); ?>
		</th>
		<th></th>
	</thead>
	<tbody>
		<?php foreach($incidentoptions as $option): ?>
			<tr>
				<td><?php echo $option['IncidentOption']['name']; ?></td>
				<td>
					<?php echo $this->Html->Link('Edit', array('action' => 'edit', $option['IncidentOption']['id'])); ?>
				</td>
				<td>
					<?php echo $this->Html->Link('Delete', array('action' => 'delete', $option['IncidentOption']['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>