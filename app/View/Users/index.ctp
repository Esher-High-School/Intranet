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
		<th>Role</th>
		<th><?php echo $this->Html->Link('Add', array('action' => 'add'), array('class' => 'btn btn-primary btn-xs')); ?></th>
		<th></th>
	</thead>
	<tbody>
		<?php foreach($users as $User): ?>
			<tr>
				<td><?php echo $User['User']['user']; ?></td>
				<td>
					<?php echo $User['User']['authlevel']; ?>
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