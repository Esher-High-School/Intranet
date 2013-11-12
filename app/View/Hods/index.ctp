<table class="table table-striped table-hover table-condensed table-centered">
	<thead>
		<th width="42%">Name</th>
		<th width="42%">Department</th>
		<th>
			<?php 
				echo $this->Html->link('Add HoD', 
				array('action' => 'add'), 
				array('class' => 'btn btn-primary btn-xs')); 
			?>
		</th>
	</thead>
	<tbody>
		<?php foreach ($hods as $hod): ?>
			<tr>
				<td><?php echo $hod['Hod']['username']; ?></td>
				<td><?php echo $hod['Hod']['dept']; ?></td>
				<td>
					<?php
					echo $this->Html->Link('<i class="icon-pencil black"></i>', array('action' => 'edit', $hod['Hod']['id']), array('escape' => false));
					echo $this->Form->postLink('<i class="icon-remove black"></i>', array('action' => 'delete', $hod['Hod']['id']), array('escape' => false));
				 ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
