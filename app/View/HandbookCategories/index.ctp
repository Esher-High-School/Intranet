<h3>Handbook Categories</h3>

<p><?php echo $this->Html->Link('Add Category', array('action' => 'add')); ?></p>
<table class="table table-striped table-hover table-condensed">
	<thead>
		<th>Name</th>
		<th>Documents</th>
		<th>&nbsp;</th>
	</thead>
	<tbody>
		<?php foreach ($categories as $category): ?>
			<tr>
				<td>
					<?php echo $this->Html->Link($category['HandbookCategory']['name'], array('action' => 'view', $category['HandbookCategory']['id'])); ?>
				</td>
				<td>
					0
				</td>
				<td>
					<?php echo $this->Html->Link('Edit', array('action' => 'edit', $category['HandbookCategory']['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>