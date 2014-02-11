<?php debug($user); ?>
<table class="table table-striped table-hover table-condensed">
	<thead>
		<tr>
			<th>Group</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($user['Group'] as $group): ?>
			<tr>
				<td><?php echo $group['name']; ?></td>
			</tr>
		<?php endforeach; ?>

	</tbody>
</table>