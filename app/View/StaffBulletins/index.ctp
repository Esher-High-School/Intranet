<h3>All Staff Bulletins</h3>
<table class="table table-bordered table-striped table-hover">
	<thead>
		<th width="60%">Title</th>
		<th width="20%">Date Posted</th>
		<th>
			<?php echo $this->Html->link('Add Bulletin', array('controller' => 'staffbulletins', 'action' => 'add'), array('class' => 'btn btn-primary btn-mini')); ?>

		</th>
	</thead>
	
	<?php foreach ($bulletins as $bulletin): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($bulletin['StaffBulletin']['title'], array('controller' => 'staffbulletins', 'action' => 'view', $bulletin['StaffBulletin']['id'])); ?>
		</td>
		<td class="center">
			<?php echo $bulletin['StaffBulletin']['created']; ?>
		</td>
		<td>
			<?php echo $this->Html->link('<i class="icon-pencil black"></i>', array('controller' => 'staffbulletins', 'action' => 'edit', $bulletin['StaffBulletin']['id']), array('escape' => false)); ?>
			<?php echo $this->Form->postLink('<i class="icon-remove black"></i>', array('controller' => 'staffbulletins', 'action' => 'delete', $bulletin['StaffBulletin']['id']), array('confirm' => 'Are you sure?', 'escape' => false)); ?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>
