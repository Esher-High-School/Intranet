<table class="table table-striped table-hover table-condensed">
	<thead>
		<th>Name</th>
		<th>Category</th>
		<th>Download</th>
		<th>
			<?php if (isset($User['User'])) {
				echo $this->Html->Link('Add', array('action' => 'add'), array('class' => 'btn btn-primary btn-xs'));
			} ?>
		</th>
	</thead>
	<tbody>
		<?php foreach($documents as $document): ?>
			<tr>
				<td>
					<?php echo $document['Document']['name']; ?>
				</td>
				<td>
					<?php echo $document['Document']['name']; ?>
				</td>
				<td>
					<?php echo $document['Document']['document']; ?>
				</td>
				<td>
					<?php 
						if (isset($User['User'])) {
							echo $this->Html->Link('Edit', array('action' => 'edit', $document['Document']['id'])); 
						}
				?>
				</td>
				<td>
					<?php
					if (isset($User['User'])) {
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
</table>
