<table class="table table-striped table-hover table-condensed">
	<thead>
		<th width="70%">Title</th>
		<th>Date Posted</th>
		<th>
			<?php echo $this->Html->link('Add', array('controller' => 'staffBulletins', 'action' => 'add'), array('class' => 'btn btn-primary btn-xs')); ?>

		</th>
		<th></th>
	</thead>
	
	<?php foreach ($bulletins as $bulletin): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($bulletin['StaffBulletin']['title'], array('controller' => 'staffBulletins', 'action' => 'view', $bulletin['StaffBulletin']['id'])); ?>
		</td>
		<td>
			<?php echo $bulletin['StaffBulletin']['created']; ?>
		</td>
		<td>
			<?php echo $this->Html->link('Edit', array('controller' => 'staffBulletins', 'action' => 'edit', $bulletin['StaffBulletin']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Form->postLink('Delete', array('controller' => 'staffBulletins', 'action' => 'delete', $bulletin['StaffBulletin']['id']), array('confirm' => 'Are you sure?')); ?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>
