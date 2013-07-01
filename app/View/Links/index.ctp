<?php $IntranetAuth = new Authentication;
function linkStatus($linkStatus) {
	$status[0] = 'Normal';
	$status[1] = 'New';
	$status[2] = 'Updated';
	return $status[$linkStatus];
}
?>
<h3>Showing All Links</h3>
<table class="table table-striped table-hover table-condensed">
	<thead>
		<th width="75%">Name</th>
		<th>Status</th>
		<th width="5%">
			<?php echo $this->Html->Link('<i class="icon-plus-sign"></i>', array('controller' => 'links', 'action' => 'add'), array('escape' => false)); ?>
		</th>
	</thead>
	<tbody>
		<?php foreach ($links as $link): ?>
			<tr>
				<td>
					<?php echo $this->Html->link($link['Link']['menu'], $link['Link']['link']); ?>
				</td>
				<td>
					<?php echo linkStatus($link['Link']['status']); ?>
				</td>
				<td>
					<?php echo $this->Html->link('<i class="icon-pencil black"></i>', array('action' => 'edit', $link['Link']['id']), array('escape' => false)); ?>
					<?php echo $this->Form->postLink('<i class="icon-remove black"></i>', array('action' => 'delete', $link['Link']['id']), array('escape' => false), 'Are you sure you want to delete this link?'); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
