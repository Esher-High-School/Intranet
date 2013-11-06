<?php $IntranetAuth = new Authentication;
function role($role) {
	if($role == 2) {
		return 'Administrator';
	} elseif($role == 1) {
		return 'Publisher';
	} elseif($role == 3) {
		return 'Thought For The Day Publisher';
	}
}
 ?>
<table class="table table-striped table-hover table-condensed">
	<thead>
		<th>Username</th>
		<th>Role</th>
		<?php if ($IntranetAuth->isAdmin()) { ?>
			<th><?php echo $this->Html->Link('Add', array('action' => 'add'), array('class' => 'btn btn-primary btn-xs')); ?></th>
		<?php } ?>
	</thead>
	<tbody>
		<?php foreach($cmsusers as $cmsuser): ?>
			<tr>
				<td><?php echo $cmsuser['CmsUser']['user']; ?></td>
				<td><?php echo role($cmsuser['CmsUser']['authlevel']); ?></td>
				<td>
					<?php echo $this->Html->Link('<i class="icon-pencil black"></i>', array('action' => 'edit', $cmsuser['CmsUser']['id']), array('escape' => false)); ?>
					<?php echo $this->Form->postLink('<i class="icon-remove black"></i>', array('action' => 'delete', $cmsuser['CmsUser']['id']), array('escape' => false)); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>