<h3>Listing All Pages</h3>
<table class="table table-striped table-hover table-condensed">
	<thead>
		<th width="84%">Title</th>
		<th>
			<?php echo $this->Html->link('Add', array('controller' => 'pages', 'action' => 'add'), array('class' => 'btn btn-primary btn-mini')); ?>
		</th>
		<th></th>
	</thead>
	
	<?php foreach ($pages as $page): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($page['Page']['name'], array('controller' => 'pages', 'action' => 'view', $page['Page']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link('Edit', array('controller' => 'pages', 'action' => 'edit', $page['Page']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Form->postLink('Delete', array('controller' => 'pages', 'action' => 'delete', $page['Page']['id'])); ?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>