<h3>Listing All Pages</h3>
<table class="table table-striped table-hover table-condensed">
	<thead>
		<th width="84%">Title</th>
		<th>
			<?php echo $this->Html->link('<i class="icon-plus-sign"></i>', array('controller' => 'pages', 'action' => 'add'), array('escape' => false)); ?>
		</th>
	</thead>
	
	<?php foreach ($pages as $page): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($page['Page']['name'], array('controller' => 'pages', 'action' => 'view', $page['Page']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link('<i class="icon-pencil black"></i>', array('controller' => 'pages', 'action' => 'edit', $page['Page']['id']), array('escape' => false)); ?>
			<?php echo $this->Form->postLink('<i class="icon-remove black"></i>', array('controller' => 'pages', 'action' => 'delete', $page['Page']['id']), array('escape' => false)); ?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>