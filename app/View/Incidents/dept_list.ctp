<h4>Date Range</h4>
<div class="btn-toolbar center">
	<div class="btn-group">
		<?php
			echo $this->Html->Link('1', 	array('action' => 'deptList', '1'), 		array('class' => 'btn'));
			echo $this->Html->Link('5', 	array('action' => 'deptList', '5'), 		array('class' => 'btn'));
			echo $this->Html->Link('10',	array('action' => 'deptList', '10'), 	array('class' => 'btn'));
			echo $this->Html->Link('15', 	array('action' => 'deptList', '15'),		array('class' => 'btn'));
			echo $this->Html->Link('20', 	array('action' => 'deptList', '20'), 	array('class' => 'btn'));
			echo $this->Html->Link('25', 	array('action' => 'deptList', '25'), 	array('class' => 'btn'));
			echo $this->Html->Link('30', 	array('action' => 'deptList', '30'), 	array('class' => 'btn'));
			echo $this->Html->Link('All', 	array('action' => 'deptList', 'all'), 	array('class' => 'btn'));
		?>
	</div>
</div>

<h4>Incident Reports by Department <small>from the past <?php echo ($day['number'] . ' ' . $day['text']); ?></small></h4>
<table class="table table-bordered table-striped table-hover table-condensed">
	<thead>
		<th>&nbsp;</th>
		<th>Department</th>
		<th>Number of Incidents</th>
	</thead>
	<tbody>
		<?php foreach($departments as $department): ?>
			<tr>
				<td width="1%">
					<?php echo $this->Html->Link('View', array('action'=> 'incidentsByDepartment', $department['incident']['subject']), array('class' => 'btn btn-mini btn-success')); ?>
				</td>
				<td width="50%">
					<?php echo $department['incident']['subject']; ?>
				</td>
				<td width="50%">
					<?php echo $department[0]['Number']; ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>