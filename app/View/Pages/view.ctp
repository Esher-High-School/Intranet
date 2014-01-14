<?php if (isset($cmsuser)): ?>
	<span class="edit-link">
		<?php 
		echo $this->Html->Link(
			'Edit',
			array(
				'action' => 'edit',
				$category['Page']['id']
			)
		);
		?>
	</span>
<?php endif; ?>
<?php echo Markdown($category['Page']['description']); ?>

<?php if(isset($category['Document'][0])):
	$textOnly = trim($category['Page']['description']);
	if (strlen($textOnly) > 0): ?>
		<hr>
	<?php endif; ?>
	<table class="table table-striped table-hover table-condensed">
		<thead>
			<th width="80%">Name</th>
			<th> 
				<?php if (isset($cmsuser['CmsUser'])) {
					echo $this->Html->Link('Add', array('controller' => 'documents', 'action' => 'add', $category['Page']['id']), array('class' => 'btn btn-primary btn-xs'));
				} ?>
			</th>
			<th></th>
		</thead>
		<tbody>
			<?php foreach($documents as $document): ?>
				<tr>
					<td>
						<?php 
						echo $this->Html->Link($document['Document']['name'], 
							array(
								'controller' => 'documents', 
								'action' => 'download', 
								$document['Document']['id'], 
								$document['Document']['filename']
							)
						); 
						?>
					</td>
					<td>
						<?php 
						if (isset($cmsuser['CmsUser'])) {
							echo $this->Html->Link(
								'Edit', 
								array(
									'controller' => 'Documents', 
									'action' => 'edit', 
									$document['Document']['id'])
							);
						}
						?>
					</td>
					<td>
						<?php
						if (isset($cmsuser['CmsUser'])) {
							echo $this->Form->postLink(
								'Delete', 
								array(
									'controller' => 'Documents', 
									'action' => 'delete', 
									$document['Document']['id']), 
								array(
									'Are you sure you want to delete this document?'
									)
								); 
						}
						?>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
<?php else:
	$textOnly = trim($category['Page']['description']);
	if (strlen($textOnly) > 0): ?>
		<hr>
		<p>
			There are currently no documents associated with this page.
		</p>
	<?php else: ?>
		<h2>This page currently has no content.</h2>
	<?php endif; ?>
	<?php if(isset($cmsuser)): ?>
		<p class="center">
			<?php 
			echo $this->Html->Link(
				'Upload Document',
				array(
					'controller' => 'documents',
					'action' => 'add',
					$category['Page']['id']
				),
				array(
					'class' => 'btn btn-primary'
				)
			);
			?>
		</p>
	<?php endif; ?>
<?php endif;