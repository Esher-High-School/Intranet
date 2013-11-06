<table class="table table-striped table-hover table-condensed">
	<thead>
		<th width="80%">Name</th>
		<th>
			<?php echo $this->Html->Link('Add Room', array('action' => 'add'), array('class' => 'btn btn-primary btn-xs')); ?>
		</th>
		<th></th>
	</thead>
	<tbody>
		<?php foreach($rooms as $room): ?>
			<tr>
				<td><?php echo $room['Room']['name']; ?></td>
				<td>
					<?php echo $this->Html->Link('Edit', array('action' => 'edit', $room['Room']['id'])); ?>
				</td>
				<td>
					<?php echo $this->Html->Link('Delete', array('action' => 'delete', $room['Room']['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>