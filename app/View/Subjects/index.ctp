<h3>Listing Subjects</h3>
<table class="table table-bordered table-striped table-hover table-condensed">
	<thead>
		<th width="80%">Name</th>
		<th><?php echo $this->Html->Link('Add Subject', array('action' => 'add'), array('class' => 'btn btn-primary btn-mini')); ?></th>
	</thead>
	<tbody>
		<?php foreach($subjects as $subject): ?>
			<tr>
				<td><?php echo $subject['Subject']['name']; ?></td>
				<td>
					<?php echo $this->Html->Link('<i class="icon-pencil black"></i>', array('action' => 'edit', $subject['Subject']['id']), array('escape' => false)); ?>
					<?php echo $this->Html->Link('<i class="icon-remove black"></i>', array('action' => 'delete', $subject['Subject']['id']), array('escape' => false)); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>