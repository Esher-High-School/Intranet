<h4>Date Range</h4>
<div class="btn-toolbar center">
	<div class="btn-group">
		<?php
			echo $this->Html->Link('1', 	array('action' => 'form', $form, '1'), 		array('class' => 'btn btn-default'));
			echo $this->Html->Link('5', 	array('action' => 'form', $form, '5'), 		array('class' => 'btn btn-default'));
			echo $this->Html->Link('10',	array('action' => 'form', $form, '10'), 	array('class' => 'btn btn-default'));
			echo $this->Html->Link('15', 	array('action' => 'form', $form, '15'),		array('class' => 'btn btn-default'));
			echo $this->Html->Link('20', 	array('action' => 'form', $form, '20'), 	array('class' => 'btn btn-default'));
			echo $this->Html->Link('25', 	array('action' => 'form', $form, '25'), 	array('class' => 'btn btn-default'));
			echo $this->Html->Link('30', 	array('action' => 'form', $form, '30'), 	array('class' => 'btn btn-default'));
			echo $this->Html->Link('All', 	array('action' => 'form', $form, 'all'), 	array('class' => 'btn btn-default'));
		?>
	</div>
</div>
<table class="table table-striped table-hover table-bordered table-condensed table-students">
	<thead>
		<th>&nbsp;</th>
		<th>Student Name</th>
		<th class="center">Number of incidents</th>
	</thead>
	<?php foreach ($incidents as $students): ?>
	<tr class="center">
		<td width="14%"><?php echo $this->Html->Link('View Incidents', array('controller' => 'incidents', 'action' => 'student', $students['incident']['upn']), array('class' => 'btn btn-xs btn-success')); ?></td>
		<td width="200">
			<?php echo $students['students']['forename']; ?> 
			<?php echo $students['students']['surname']; ?>
		</td>
		<td class="center"><?php echo $students[0]['Number']; ?></td>
	</tr>
	<?php endforeach; ?>
</table>