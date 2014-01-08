<div class="row">
	<div class="col-md-4">
		<h4>All Tutors</h4>
	</div>
	<div class="col-md-3 right">
	</div>
</div>
<table class="table table-striped table-hover table-condensed">
	<thead>
		<th>&nbsp;</th>
		<th>Form</th>
		<th>Tutor Name</th>
	</thead>
	<tbody>
		<?php foreach ($tutors as $tutor): ?>
			<tr>
				<td width="17%"><?php echo $this->Html->Link('View Incidents', array('controller' => 'incidents', 'action' => 'form', $tutor['Tutor']['form']), array('class' => 'btn btn-xs btn-success')); ?></td>
				<td width="10%"><?php echo $tutor['Tutor']['form']; ?></td>
				<td><?php echo $tutor['Tutor']['name']; ?></td> 
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
