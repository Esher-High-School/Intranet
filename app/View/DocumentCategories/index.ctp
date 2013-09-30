<h3>Document Categories</h3>
<table class="table table-striped table-hover table-condensed">
	<thead>
		<th>Name</th>
		<th>
			<?php if (isset($cmsuser['CmsUser'])) {
				echo $this->Html->Link('Add', array('action' => 'add')); 
			}
			?>
		</th>
		<th>&nbsp;</th>
	</thead>
	<tbody>
		<?php foreach($categories as $category): ?>
		<tr>
			<td>
				<?php echo $this->Html->Link($category['DocumentCategory']['name'], array('action' => 'view', $category['DocumentCategory']['id'])); ?>
			</td>
			<td>
				<?php if(isset($cmsuser['CmsUser'])) {
					echo $this->Html->Link('Edit', array('action' => 'edit'));
				} ?>
			</td>
			<td>
				<?php if (isset($cmsuser['CmsUser'])) {
					echo $this->Form->postLink('Delete', array('action' => 'delete', $category['DocumentCategory']['id']), array('Are you sure you want to delete this category?'));
				} ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
