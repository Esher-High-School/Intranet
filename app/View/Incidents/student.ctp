<h4>Date Range</h4>
<div class="btn-toolbar center">
	<div class="btn-group">
		<?php
			echo $this->Html->Link('1', 	array('action' => 'student', $student['Student']['upn'], '1'), 		array('class' => 'btn'));
			echo $this->Html->Link('5', 	array('action' => 'student', $student['Student']['upn'], '5'), 		array('class' => 'btn'));
			echo $this->Html->Link('10',	array('action' => 'student', $student['Student']['upn'], '10'), 	array('class' => 'btn'));
			echo $this->Html->Link('15', 	array('action' => 'student', $student['Student']['upn'], '15'),		array('class' => 'btn'));
			echo $this->Html->Link('20', 	array('action' => 'student', $student['Student']['upn'], '20'), 	array('class' => 'btn'));
			echo $this->Html->Link('25', 	array('action' => 'student', $student['Student']['upn'], '25'), 	array('class' => 'btn'));
			echo $this->Html->Link('30', 	array('action' => 'student', $student['Student']['upn'], '30'), 	array('class' => 'btn'));
			echo $this->Html->Link('All', 	array('action' => 'student', $student['Student']['upn'], 'all'), 	array('class' => 'btn'));
		?>
	</div>
</div>

<h4>Incident reports for <?php echo ($student['Student']['forename'] . ' ' . $student['Student']['surname']); ?> in the past <?php echo $days; ?> days</h4>
<table class="table table-condensed table-striped table-hover">
	<thead>
		<th>&nbsp;</th>
		<th>Date</th>
		<th>Subject</th>
		<th>User</th>
		<th>Description</th>
	</thead>
	<tbody>
		<?php foreach ($incidents as $incident): ?>
			<tr>
				<td>
					<?php echo $this->Html->Link('View', array('action' => 'view', $incident['Incident']['id']), array('class' => 'btn btn-mini btn-success')); ?>
				</td>
				<td><?php echo $incident['Incident']['date']; ?></td>
				<td><?php echo $incident['Incident']['subject']; ?></td>
				<td><?php echo $incident['Incident']['username']; ?></td>
				<td><?php echo substr($incident['Incident']['incident'], 0, 120); ?>...</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<?php
echo $this->Paginator->numbers(array(
    'before' => '<div class="pagination center"><ul>',
    'separator' => '',
    'currentClass' => 'active',
    'tag' => 'li',
    'after' => '</ul></div>'
));
?>