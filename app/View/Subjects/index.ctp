<table class="table table-striped table-hover table-condensed table-centered">
	<thead>
		<th width="80%">Name</th>
		<th>
			<?php echo $this->Html->Link('Add', array('action' => 'add'), array('class' => 'btn btn-primary btn-xs')); ?>
		</th>
		<th></th>
	</thead>
	<tbody>
		<?php foreach($subjects as $subject): ?>
			<tr>
				<td><?php echo $subject['Subject']['name']; ?></td>
				<td>
					<?php echo $this->Html->Link('Edit', array('action' => 'edit', $subject['Subject']['id'])); ?>
				</td>
				<td>
					<?php echo $this->Html->Link('Delete', array('action' => 'delete', $subject['Subject']['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>