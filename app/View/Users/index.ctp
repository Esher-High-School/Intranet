<?php $IntranetAuth = new Authentication;
function role($roles, $role) {
	return $roles[$role];
}

function tf($value) {
	if ($value == 0) {
		return 'No';
	} else {
		return 'Yes';
	}
}

?>
<table class="table table-striped table-hover table-condensed table-centered">
	<thead>
		<th width="80%">Username</th>
		<th><?php echo $this->Html->Link('Add', array('action' => 'add'), array('class' => 'btn btn-primary btn-xs')); ?></th>
		<th></th>
	</thead>
	<tbody>
		<?php foreach($users as $User): ?>
			<tr>
				<td>
					<?php if (isset($User['Group'][0])): ?>
						<a class="popover-link" data-container="body" data-toggle="popover" data-original-title="Group Membership" data-trigger="hover" data-content="
						<?php
							foreach($User['Group'] as $group) {
								echo $group['name'];
								echo ", ";
							}
							?>
						" role="button">
							<?php echo $User['User']['user']; ?>
						</a>
					<?php else: ?>
						<?php echo $User['User']['user']; ?>
					<?php endif; ?>
				</td>
				<td>
					<?php echo $this->Html->Link('Edit', array('action' => 'edit', $User['User']['id']), array('escape' => false)); ?>
				</td>
				<td>
					<?php echo $this->Form->postLink('Delete', array('action' => 'delete', $User['User']['id']), array('escape' => false)); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>

<script>
	$('.popover-link').popover()
</script>
