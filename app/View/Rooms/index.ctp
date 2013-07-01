<h3>Listing Rooms</h3>
<table class="table table-bordered table-striped table-hover table-condensed">
	<thead>
		<th width="80%">Name</th>
		<th><?php echo $this->Html->Link('Add Room', array('action' => 'add'), array('class' => 'btn btn-primary btn-mini')); ?></th>
	</thead>
	<tbody>
		<?php foreach($rooms as $room): ?>
			<tr>
				<td><?php echo $room['Room']['name']; ?></td>
				<td>
					<?php echo $this->Html->Link('<i class="icon-pencil black"></i>', array('action' => 'edit', $room['Room']['id']), array('escape' => false)); ?>
					<?php echo $this->Html->Link('<i class="icon-remove black"></i>', array('action' => 'delete', $room['Room']['id']), array('escape' => false)); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>