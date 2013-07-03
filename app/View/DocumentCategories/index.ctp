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
	</thead>
	<tbody>
		<?php foreach($categories as $category): ?>
		<tr>
			<td><?php echo $category['DocumentCategory']['name']; ?></td>
			<td>
				<?php if(isset($cmsuser['CmsUser'])) {
					echo $this->Html->Link('Edit', array('action' => 'edit'));
				} ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>