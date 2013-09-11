<h3>Showing All Links</h3>

<h4>Sidebar Links</h4>
<table class="table table-striped table-hover table-condensed">
	<thead>
		<th width="75%">Name</th>
		<th width="25%">
			<?php echo $this->Html->Link('New', array('controller' => 'links', 'action' => 'add'), array('escape' => false)); ?>
		</th>
	</thead>
	<tbody>
		<?php foreach ($links as $link): ?>
			<tr>
				<td>
					<?php echo $this->Html->link($link['Link']['menu'], $link['Link']['link']); ?>
				</td>
				<td>
					<?php echo $this->Html->link('Edit', array('action' => 'edit', $link['Link']['id'])); ?>
					<?php echo $this->Form->postLink('Delete', array('action' => 'delete', $link['Link']['id'], 'class' => 'danger'), array('Are you sure you want to delete this link?')); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
