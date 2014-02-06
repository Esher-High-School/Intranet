<table class="table table-striped table-hover table-condensed">
	<thead>
		<th width="80%">Name</th>
		<th>
			<?php echo $this->Html->Link('New', array('action' => 'add'), array('class' => 'btn btn-primary btn-xs')); ?>
		</th>
		<th>&nbsp;</th>
	</thead>
	<tbody>
		<?php foreach ($categories as $category): ?>
			<tr>
				<td>
					<?php echo $this->Html->Link($category['HandbookCategory']['name'], array('action' => 'view', $category['HandbookCategory']['id'])); ?>
				</td>
				<td>
					<?php echo $this->Html->Link('Edit', array('action' => 'edit', $category['HandbookCategory']['id'])); ?>
				</td>
				<td>
					<?php 
						echo $this->Form->postLink('Delete', array('action' => 'delete', $category['HandbookCategory']['id']), array('Are you sure you want to delete this handbook category?'));
					?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>