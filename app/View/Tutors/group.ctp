<table class="table table-bordered table-striped table-hover table-condensed">
	<thead>
		<tr>
			<th>Name</th>
			<th>Surname</th>
			<th>Sex</th>
			<th width="20%">
				<?php echo $this->Html->Link('Add Student', array('controller' => 'students', 'action' => 'add'), array('class' => 'btn btn-primary btn-xs')); ?>
			</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($students as $student): ?>
			<tr>
				<td><?php echo $student['Student']['forename'];?></td>
				<td><?php echo $student['Student']['surname']; ?></td>
				<td><?php echo $student['Student']['sex']; ?></td>
				<td>
					<?php
					echo $this->Html->Link('<i class="icon-pencil black"></i>', array('controller' => 'students', 'action' => 'edit', $student['Student']['upn']), array('escape' => false));
					echo $this->Form->postLink('<i class="icon-remove black"></i>', array('controller' => 'students', 'action' => 'delete', $student['Student']['upn']), array('escape' => false), 'Are you sure you want to delete ' . $student['Student']['forename'] . ' ' . $student['Student']['surname'] . '?');
					?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>