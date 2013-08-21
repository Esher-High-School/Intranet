<h3>All Documents</h3>
<table class="table table-striped table-hover table-condensed">
	<thead>
		<th>Name</th>
		<th>Category</th>
		<th>Download</th>
		<th>
			<?php if (isset($cmsuser['CmsUser'])) {
				echo $this->Html->Link('Add', array('action' => 'add'), array('class' => 'btn btn-primary btn-mini'));
			} ?>
		</th>
	</thead>
	<tbody>
		<?php foreach($documents as $document): ?>
			<tr>
				<td>
					<?php echo $document['Document']['name']; ?>
				</td>
				<td>
					<?php echo $document['Document']['category_id']; ?>
				</td>
				<td>
					<?php echo $document['Document']['document']; ?>
				</td>
				<td>
					<?php if (isset($cmsuser['CmsUser'])) {
						echo $this->Html->Link('Edit', array('action' => 'edit', $document['Document']['id'])); 
					} ?>
				</td>
			</tr>
		<?php endforeach; ?>
</table>