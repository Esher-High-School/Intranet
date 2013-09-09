<?php
$IntranetAuth = new Authentication;
?>
<h3>All HoYs</h3>
<table class="table table-striped table-hover table-condensed">
	<thead>
		<th width="40%">Name</th>
		<th width="40%">Year</th>
		<th width="20%">
			<?php echo $this->Html->link('New HoY', array('action' => 'add'), array('class' => 'btn btn-primary btn-mini')); ?>
		</th>
	</thead>
	<tbody>
		<?php foreach ($hoys as $hoy): ?>
			<tr>
				<td><?php echo $hoy['Hoy']['username']; ?></td>
				<td><?php echo $hoy['Hoy']['year']; ?></td>
				<td>
					<?php
					if ($IntranetAuth->isAdmin()) {
						echo $this->Html->Link('<i class="icon-pencil black"></i>', array('action' => 'edit', $hoy['Hoy']['id']), array('escape' => false));
						echo $this->Form->postLink('<i class="icon-remove black"></i>', array('action' => 'delete', $hoy['Hoy']['id']), array('escape' => false));
					} ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
