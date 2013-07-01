<h3>Phone Extensions</h3>
<table class="table table-striped table-hover table-condensed">
	<thead>
		<th width="10%">Ext</th>
		<th width="85%">Name</th>
		<?php if (isset($cmsuser)): ?>
			<th>
				<?php echo $this->Html->Link('<i class="icon-plus-sign"></i>', 
					array('action' => 'add'),
					array('escape' => false)
				);
				?>
			</th>
		<?php endif; ?>
	</thead>
	<tbody>
		<?php foreach($extensions as $extension): ?>
			<tr>
				<td>
					<?php echo $extension['PhoneExtension']['extension']; ?>
				</td>
				<td>
					<?php echo $extension['PhoneExtension']['name']; ?>
				</td>
				<?php if (isset($cmsuser)): ?>
					<td>
						<?php echo $this->Html->Link('<i class="icon-pencil"></i>', 
							array('action' => 'edit', $extension['PhoneExtension']['id']),
							array('escape' => false)
						);
						?>
						
						<?php echo $this->Form->postLink('<i class="icon-trash"></i>', 
							array('action' => 'delete', $extension['PhoneExtension']['id']),
							array('escape' => false)
						);
						?>
					</td>
				<?php endif; ?>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>