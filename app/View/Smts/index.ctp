<?php
$IntranetAuth = new Authentication;
?>
<table class="table table-striped table-hover table-condensed table-centered">
	<thead>
		<th width="90%">Name</th>
		<th>
			<?php
			if ($IntranetAuth->isAdmin()) {
				echo $this->Html->link('Add', array('action' => 'add'), array('class' => 'btn btn-primary btn-xs'));
			}
			?>
		</th>
	</thead>
	<tbody>
		<?php foreach ($smts as $smt): ?>
			<tr>
				<td><?php echo $smt['Smt']['username']; ?></td>
				<td>
					<?php
					if ($IntranetAuth->isAdmin()) {
						echo $this->Html->Link('<i class="icon-pencil black"></i>', array('action' => 'edit', $smt['Smt']['id']), array('escape' => false));
						echo $this->Form->postLink('<i class="icon-remove black"></i>', array('action' => 'delete', $smt['Smt']['id']), array('escape' => false));
					} ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>