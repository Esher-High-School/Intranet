<?php
function gender($gender) {
	if ($gender == 'M') {
		return 'Male';
	} elseif($gender == 'F') {
		return 'Female';
	} else {
		return 'Unknown';
	}
}
?>

<table class="table table-striped table-hover table-condensed table-centered">
	<thead>
		<tr>
			<th>Name</th>
			<th>Surname</th>
			<th>Gender</th>
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
				<td><?php echo gender($student['Student']['gender']); ?></td>
				<td>
					<?php
					echo $this->Html->Link('Edit', array('controller' => 'students', 'action' => 'edit', $student['Student']['upn']));
					echo '&nbsp;';
					echo $this->Form->postLink('Delete', array('controller' => 'students', 'action' => 'delete', $student['Student']['upn']), array('escape' => false), 'Are you sure you want to delete ' . $student['Student']['forename'] . ' ' . $student['Student']['surname'] . '?');
					?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>