<h3><?php echo $category['DocumentCategory']['name']; ?></h3>
<p><?php echo nl2br($category['DocumentCategory']['description']); ?></p>

<table class="table table-striped table-hover table-condensed">
	<thead>
		<th>Name</th>
		<th></th>
		<th> 
			<?php if (isset($cmsuser['CmsUser'])) {
			       echo $this->Html->Link('Add', array('controller' => 'documents', 'action' => 'add', $category['DocumentCategory']['id']), array('class' => 'btn btn-primary btn-mini'));
			} ?>
		</th>
	</thead>
	<tbody>
		<?php foreach($category['Document'] as $document): ?>
			<tr>
				<td>
					<?php echo $this->Html->Link($document['name'], array('controller' => 'Documents', 'action' => 'download', $document['id'])); ?>
				</td>
				<td>
					<?php 
					if (isset($cmsuser['CmsUser'])) {
						echo $this->Html->Link('Edit', array('controller' => 'Documents', 'action' => 'edit', $document['id']));
					}
					 ?>
				</td>
				<td>
					<?php
					if (isset($cmsuser['CmsUser'])) {
						echo $this->Form->postLink('Delete', array('controller' => 'Documents', 'action' => 'delete', $document['id']), array('Are you sure you want to delete this document?')); 
					}
					?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
