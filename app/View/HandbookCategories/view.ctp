<p>
	<?php echo $this->Html->Link('Back to categories', array('action' => 'index')); ?>
</p>
<table class="table table-striped table-condensed table-hover">
	<thead>
		<th>
			Name
		</th>
		<th>
			User
		</th>
		<th>
			Created
		</th>
		<th>
			Last Reviewed
		</th>
		<th>
			<?php echo $this->Html->Link('Add', array('controller' => 'handbookDocuments', 'action' => 'add', $category['HandbookCategory']['id']), array('class' => 'btn btn-primary btn-xs')); ?>
		</th>
		<th>

		</th>
	</thead>
	<tbody>
		<?php foreach ($category['HandbookDocument'] as $document): ?>
			<tr>
				<td>
					<?php echo $this->Html->Link($document['name'], array('controller' => 'handbookDocuments', 'action' => 'view', $document['id'])) ; ?>
				</td>
				<td>
					<?php echo $document['user']; ?>
				</td>
				<td>
					<?php echo $document['created']; ?>
				</td>
				<td>
					<?php echo $document['modified']; ?>
				</td>
				<td>
					<?php echo $this->Html->Link('Edit', array('controller' => 'handbookDocuments', 'action' => 'edit', $document['id'])); ?>
				</td>
				<td>
					<?php echo $this->Form->postLink('Delete', array('controller' => 'handbookDocuments', 'action' => 'delete', $document['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>