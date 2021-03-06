<table class="table table-striped table-hover table-condensed">
	<thead>
		<th>Name</th>
		<?php
		if (
			isset($ugroups['Publishers']) or
			isset($ugroups['Administrators'])
		):
		?>
			<th>
				<?php
				echo $this->Html->Link(
					'New',
					array('action' => 'add'),
					array('class' => 'btn btn-primary btn-xs')
				);
				?>
			</th>
			<th>&nbsp;</th>
		<?php endif; ?>
	</thead>
	<tbody>
		<?php foreach($categories as $category): ?>
		<tr>
			<td width="80%">
				<?php echo $this->Html->Link($category['Page']['name'], array('action' => 'view', $category['Page']['id'])); ?>
			</td>
			<?php if (
				isset($ugroups['Publishers']) or
				isset($ugroups['Administrator'])
			): ?>
				<td>
					<?php
					echo $this->Html->Link('Edit',
						array(
							'action' => 'edit',
							$category['Page']['id']
						));

					?>
				</td>
				<td>
					<?php
					echo $this->Form->postLink('Delete',
						array(
							'action' => 'delete', $category['Page']['id']
						));
					?>
				</td>
			<?php endif; ?>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
