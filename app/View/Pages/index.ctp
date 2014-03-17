<table class="table table-striped table-hover table-condensed">
	<thead>
		<th>Name</th>
		<th>
			<?php if (isset($User['User'])) {
				echo $this->Html->Link(
					'Add', 
					array('action' => 'add'),
					array('class' => 'btn btn-primary btn-xs')
				); 
			}
			?>
		</th>
		<th>&nbsp;</th>
	</thead>
	<tbody>
		<?php foreach($categories as $category): ?>
		<tr>
			<td width="80%">
				<?php echo $this->Html->Link($category['Page']['name'], array('action' => 'view', $category['Page']['id'])); ?>
			</td>
			<?php if (isset($cmsuser)): ?>
				<td>
					<?php
					echo $this->Html->Link('Edit', 
						array(
							'action' => 'edit', 
							$category['Page']['id']
						) 
					}
					?>
				</td>
				<td>
					<?php 
					echo $this->Form->postLink('Delete', 
						array(
							'action' => 'delete', $category['Page']['id']
							), 
						array(
							'Are you sure you want to delete this category?')
						);
					?>
				</td>
			<?php endif; ?>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
