<?php if (isset($cmsuser)): ?>
	<span class="edit-link">
		<?php 
		echo $this->Html->Link(
			'Edit',
			array(
				'action' => 'edit',
				$category['DocumentCategory']['id']
			)
		);
		?>
	</span>
<?php endif; ?>
<?php echo Markdown($category['DocumentCategory']['description']); ?>

<?php if(isset($category['Document'][0])):
	$textOnly = trim($category['DocumentCategory']['description']);
	if (strlen($textOnly) > 0): ?>
		<hr>
	<?php endif; ?>
	<table class="table table-striped table-hover table-condensed">
		<thead>
			<th width="80%">Name</th>
			<th> 
				<?php if (isset($cmsuser['CmsUser'])) {
					echo $this->Html->Link('Add', array('controller' => 'documents', 'action' => 'add', $category['DocumentCategory']['id']), array('class' => 'btn btn-primary btn-xs'));
				} ?>
			</th>
			<th></th>
		</thead>
		<tbody>
			<?php foreach($category['Document'] as $document): ?>
				<tr>
					<td>
						<?php 
						echo $this->Html->Link($document['name'], 
							array(
								'controller' => 'Documents', 
								'action' => 'download', 
								$document['id'], 
								$document['filename']
							)
						); 
						?>
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
<?php elseif (isset($cmsuser)): ?>
	<?php 
	$textOnly = trim($category['DocumentCategory']['description']);
	if (strlen($textOnly) > 0): ?>
		<hr>
	<?php endif; ?>
	<h2>There are currently no documents uploaded.</h2>
	<p class="center">
		<?php 
		echo $this->Html->Link(
			'Upload Document',
			array(
				'controller' => 'documents',
				'action' => 'add',
				$category['DocumentCategory']['id']
			),
			array(
				'class' => 'btn btn-primary'
			)
		);
		?>
	</p>
<?php endif; ?>