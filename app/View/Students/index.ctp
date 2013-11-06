<?php 
function onRoll($onroll) {
	if (strtoupper($onroll) == 'Y') {
		echo ('<i class="icon-ok-sign mi"></i>');
	} elseif(strtoupper($onroll) == 'N') {
		echo ('<i class="icon-remove-sign mi"></i>');
	}
}

function Sen($sen) {
	if ($sen == "No Special Educational Need") {
		echo ('N/A');
	} elseif ($sen == '') {
		echo ('N/A');
	} else {
		echo ($sen);
	}
}
?>
<table class="table table-striped table-hover table-condensed table-students">
	<thead>
		<th>Surname</th>
		<th>Forename</th>
		<th>UPN</th>
		<th>Form</th>
		<th>
			<?php echo $this->Html->Link('New Student', array('action' => 'add'), array('class' => 'btn btn-primary btn-xs')); ?>
		</th>
	</thead>
	<?php foreach ($students as $student): ?>
	<tr class="center">
		<td><?php echo $student['Student']['surname']; ?></td>
		<td><?php echo $student['Student']['forename']; ?></td>
		<td><?php echo $student['Student']['upn']; ?></td>
		<td><?php echo $student['Student']['form']; ?></td>
		<td><?php echo $this->Html->Link('<i class="icon-pencil black"></i>', array('action' => 'edit', $student['Student']['upn']), array('escape' => false)); ?></td>
	</tr>
	<?php endforeach; ?>
</table>