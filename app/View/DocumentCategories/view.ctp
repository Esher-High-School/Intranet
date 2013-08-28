<h3><?php echo $category['DocumentCategory']['name']; ?></h3>
<p><?php echo $category['DocumentCategory']['description']; ?></p>

<table class="table table-striped table-hover table-condensed">
	<thead>
		<th>Name</th>
		<th>&nbsp;</th>
	</thead>
	<tbody>
		<?php foreach($category['Document'] as $document): ?>
			<tr>
				<td>
					<a href="/files/<?php echo ($category['DocumentCategory']['id'] . '/' . $document['document']); ?>"><?php echo $document['name']; ?></a>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
