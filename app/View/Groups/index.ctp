<table class="table table-striped table-hover table-condensed table-contents-center">
	<thead>
		<tr>
			<th width="60%">Name</th>
			<th>Users</th>
			<th>
				<?php 
				echo $this->Html->Link(
					'<i class="fa fa-plus-circle"></i> New',
					array(
						'action' => 'add'
					),
					array(
						'class' => 'btn btn-primary btn-xs',
						'escape' => false
					)
				);
				?>
			</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($groups as $group): ?>
			<tr>
				<td>
					<?php echo $group['Group']['name']; ?>
				</td>
				<td>
					&nbsp;
				</td>
				<td>
					<?php
					echo $this->Html->Link(
						'Edit',
						array(
							'action' => 'edit',
							$group['Group']['id']
						)
					);
					?>
				</td>
				<td>
					<?php
					echo $this->Form->postLink(
						'Delete',
						array(
							'action' => 'delete',
							$group['Group']['id']
						)
					);
					?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>