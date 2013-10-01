<h3>Phone Extensions</h3>
<table class="table table-striped table-hover table-condensed">
	<thead>
		<th width="10%">Ext</th>
		<th width="85%">Name</th>
		<?php if (isset($cmsuser)): ?>
			<th>&nbsp;</th>
			<th>
				<?php echo $this->Html->Link('Add', 
					array('action' => 'add'),
					array('class' => 'btn btn-primary btn-mini')
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
						<?php echo $this->Html->Link('Edit', 
							array('action' => 'edit', $extension['PhoneExtension']['id'])
						);
						?>
					</td>
					<td>
						<?php echo $this->Form->postLink('Delete', 
							array('action' => 'delete', $extension['PhoneExtension']['id'])
						);
						?>
					</td>
				<?php endif; ?>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
