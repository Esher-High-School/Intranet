<table class="table table-striped table-condensed">
	<thead>
		<th>Name</th>
		<th>&nbsp;</th>
	</thead>
	<tbody>
		<?php foreach ($documents as $document): ?>
			<tr>
				<td>
					<?php echo $document['HandbookDocument']['name']; ?>
				</td>
				<td>
					<?php
					echo $this->Form->postLink('Delete', array('action' => 'delete', $document['HandbookDocument']['id']));
					?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>