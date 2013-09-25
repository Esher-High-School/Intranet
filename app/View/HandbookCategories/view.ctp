<h3><?php echo $category['HandbookCategory']['name']; ?> Documents</h3>
<table class="table table-striped table-condensed table-hover">
	<thead>
		<th>
			Name
		</th>
		<th>
			<?php echo $this->Html->Link('Add', array('controller' => 'HandbookDocuments', 'action' => 'add')); ?>
		</th>
	</thead>
	<tbody>
		<?php foreach ($category['HandbookDocument'] as $document): ?>
			<tr>
				<td><?php echo $this->Html->Link($document['name'], array('controller' => 'HandbookDocuments', 'action' => 'view', $document['id'])) ; ?></td>
				<td>
					<?php echo $this->Html->Link('Edit', array('controller' => 'HandbookDocuments', 'action' => 'edit', $document['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>