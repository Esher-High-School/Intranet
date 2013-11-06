<?php 
$i = 0;
foreach($allLinks as $links):
if ($i == 0) {
	echo ('<h4>Header Links</h4>');
} else {
	echo ('<h4>Sidebar Links</h4>');
}
?>
<table class="table table-striped table-hover table-condensed">
	<thead>
		<th>Name</th>
		<th>URL</th>
		<th width="100">
			<?php echo $this->Html->Link('New', array('controller' => 'links', 'action' => 'add'), array('class' => 'btn btn-primary btn-xs', 'escape' => false)); ?>
		</th>
	</thead>
	<tbody>
		<?php foreach ($links as $link): ?>
			<tr>
				<td>
					<?php echo $this->Html->link($link['Link']['menu'], $link['Link']['link']); ?>
				</td>
				<td>
					<?php echo $link['Link']['link']; ?>
				</td>
				<td>
					<?php echo $this->Html->link('Edit', array('action' => 'edit', $link['Link']['id'])); ?>
					<?php echo $this->Form->postLink('Delete', array('action' => 'delete', $link['Link']['id'], 'class' => 'danger'), array('Are you sure you want to delete this link?')); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<?php 
$i++;
endforeach; ?>
