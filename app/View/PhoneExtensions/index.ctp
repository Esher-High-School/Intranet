<p class="screen">
	<a href="javascript:window.print()">Print</a>
</p>
<table class="table table-striped table-hover table-condensed table-centered">
	<thead>
		<th width="10%">Ext</th>
		<th width="85%">Name</th>
		<?php if (
			isset($ugroups['Administrators']) or
			isset($ugroups['Publishers'])
		): ?>
			<th class="cms-tools">
				<?php echo $this->Html->Link('Add', 
					array('action' => 'add'),
					array('class' => 'btn btn-primary btn-xs')
				);
				?>
			</th>
			<th>&nbsp;</th>
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
				<?php 
				if (
					isset($ugroups['Administrators']) or
					isset($ugroups['Publishers'])
				): 
				?>
					<td class="cms-tools">
						<?php echo $this->Html->Link('Edit', 
							array('action' => 'edit', $extension['PhoneExtension']['id'])
						);
						?>
					</td>
					<td class="cms-tools">
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
