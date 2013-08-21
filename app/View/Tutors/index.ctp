<h3>All Tutors</h3>
<table class="table table-striped table-hover table-condensed">
	<thead>
		<th>Name</th>
		<th>Form</th>
		<th>Username</th>
		<th>
			<?php echo $this->Html->Link('Add', array('action' => 'add'), array('class' => 'btn btn-primary btn-mini')); ?>
		</th>
	</thead>
	<tbody>
		<?php foreach ($tutors as $tutor): ?>
			<tr>
				<td><?php echo $tutor['Tutor']['name']; ?></td>
				<td><?php echo $this->Html->Link($tutor['Tutor']['form'], array('action' => 'group', $tutor['Tutor']['id'])); ?></td>
				<td><?php echo $tutor['Tutor']['username']; ?></td>
				<td>
					<?php 
					echo $this->Html->Link('<i class="icon-pencil black"></i>', array('action' => 'edit', $tutor['Tutor']['id']), array('escape' => false));
					echo $this->Form->postLink('<i class="icon-remove black"></i>', array('action' => 'delete', $tutor['Tutor']['id']), array('escape' => false), 'Are you sure you want to delete ' . $tutor['Tutor']['name'] . '?');
					?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
