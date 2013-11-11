<table class="table table-condensed table-striped table-hover">
	<thead>
		<th>&nbsp;</th>
		<th>Date</th>
		<th>Student</th>
		<th>Description</th>
	</thead>
	<tbody>
		<?php foreach ($incidents as $incident):
			if (isset($incident['Student']['surname'])):
		?>
				<tr>
					<td>
						<?php echo $this->Html->Link('View', array('action' => 'view', $incident['Incident']['id']), array('class' => 'btn btn-xs btn-success')); ?>
					</td>
					<td><?php echo $incident['Incident']['date']; ?></td>
					<td><?php echo ($incident['Student']['forename'] . ' ' . $incident['Student']['surname']); ?></td>
					<td><?php echo substr($incident['Incident']['incident'], 0, 120); ?></td>
				</tr>
			<?php 
			endif;
		endforeach; ?>
	</tbody>
</table>