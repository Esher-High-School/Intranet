<h4>Last 5 incidents</h4>
<table class="table table-striped table-hover table-condensed table-students">
	<thead>
		<th>&nbsp;</th>
		<th>Student Name</th>
		<th>Form</th>
		<th>Problem</th>
		<th>Submitted by</th>
	</thead>
	<?php foreach ($recent as $incident): ?>
	<tr class="center">
		<td width="1%"><?php echo $this->Html->Link('View', array('action' => 'view', $incident['Incident']['id']), array('class' => 'btn btn-xs btn-success')); ?></td>
		<td width="200">
			<?php echo $incident['Student']['forename']; ?>
			<?php echo $incident['Student']['surname']; ?>
		</td>
		<td width="1%"><?php echo $incident['Student']['form']; ?></td>
		<td><?php echo $incident['Incident']['problems1']; ?></td>
		<td>
			<?php 
			echo (
				strtoupper(substr($incident['Incident']['username'], 0, 1)) .
				' ' .
				ucfirst(strtolower(substr($incident['Incident']['username'], 1)))
			);
			?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>
<?php echo $this->Html->Link('View more', array('action' => 'index')); ?>
<h4>Students with most incidents across the whole school</h4>
<table class="table table-striped table-hover table-condensed table-students">
	<thead>
		<th>&nbsp;</th>
		<th>Student Name</th>
		<th>Form</th>
		<th class="center">Number of incidents</th>
	</thead>
	<?php foreach ($top5 as $students): ?>
	<tr class="center">
		<td width="1%"><?php echo $this->Html->Link('View', array('controller' => 'incidents', 'action' => 'student', $students['incident']['upn']), array('class' => 'btn btn-xs btn-success')); ?></td>
		<td width="60%">
			<?php echo $students['students']['forename']; ?> 
			<?php echo $students['students']['surname']; ?>
		</td>
		<td width="1%"><?php echo $students['students']['form']; ?></td>
		<td class="center"><?php echo $students[0]['Number']; ?></td>
	</tr>
	<?php endforeach; ?>
</table>

<?php
$i = 7;
foreach ($yr as $year) { ?>
	<h4>Students with most incidents in Year <?php echo $i; ?></h4>
	<table class="table table-striped table-hover table-condensed table-students">
		<thead>
			<th>&nbsp;</th>
			<th>Student Name</th>
			<th>Form</th>
			<th class="center">Number of incidents</th>
		</thead>
		<?php foreach ($year as $students): ?>
		<tr class="center">
			<td width="1%"><?php echo $this->Html->Link('View', array('controller' => 'incidents', 'action' => 'student', $students['incident']['upn']), array('class' => 'btn btn-xs btn-success')); ?></td>
			<td width="60%">
				<?php echo $students['students']['forename']; ?> 
				<?php echo $students['students']['surname']; ?>
			</td>
			<td width="1%"><?php echo $students['students']['form']; ?></td>
			<td class="center"><?php echo $students[0]['Number']; ?></td>
		</tr>
		<?php endforeach; ?>
	</table>
<?php
$i++;
}
?>