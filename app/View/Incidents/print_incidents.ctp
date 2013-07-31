<?php
function pFormat($problem) {
	if ($problem == 'na') {
		return 'N/A';
	} else {
		return $problem;
	}
};
?>

<?php foreach ($incidents as $incident): ?>
<div class="incident">
	<div class="header-container">
		<div class="row">
			<div class="span1">
				<img src="/img/ehs.png" alt="Esher C of E High School">
			</div>
			<div class="span9">
				<h1>Esher C of E High School</h1>
			</div>
		</div>
	</div>
	<h5 style="font-weight: 300;">
		<strong>Student:</strong> <?php echo ($student['Student']['forename'] . ' ' . $student['Student']['surname']); ?> - <strong>Date:</strong> <?php echo $incident['Incident']['date']; ?> - <strong>Time:</strong> <?php echo $incident['Incident']['time']; ?>
	</h5>
	<table class="table table-condensed table-striped">
		<tr>
			<td>
				<strong>Reported by</strong>
			</td>
			<td colspan="3">
				<?php echo $incident['Incident']['username']; ?>
			</td>
		</tr>
		<tr>
			<td>
				<strong>Name</strong>
			</td>
			<td width="40%">
				<?php echo (
					$incident['Student']['forename'] . ' ' .
					$incident['Student']['surname']
				);
				?>
			</td>
			<td>
				<strong>Form</strong>
			</td>
			<td width="40%">
				<?php echo $incident['Student']['form']; ?>
			</td>
		</tr>
		<tr>
			<td><strong>Submitted</strong></td>
			<td><?php echo $incident['Incident']['tm']; ?></td>
			<td><strong>Date</strong></td>
			<td><?php echo $incident['Incident']['date']; ?></td>
		</tr>
		<tr>
			<td><strong>Time</strong></td>
			<td><?php echo $incident['Incident']['time']; ?></td>
			<td><strong>Subject</strong></td>
			<td><?php echo $incident['Incident']['subject']; ?></td>
		</tr>
		<tr>
			<td><strong>Location</strong></td>
			<td colspan="3"><?php echo $incident['Incident']['location']; ?></td>
		</tr>
		<tr>
			<td>
				<strong>Names of other students</strong>
			</td>
			<td colspan="3">
				<?php echo h($incident['Incident']['other']); ?>
			</td>
		</tr>
		<tr>
			<td>
				<strong>Problems</strong>
			</td>
			<td><?php echo pFormat($incident['Incident']['problems1']); ?></td>
			<td></td>
			<td><?php echo pFormat($incident['Incident']['problems2']); ?></td>
		</tr>
		<tr>
			<td></td>
			<td><?php echo pFormat($incident['Incident']['problems3']); ?></td>
			<td></td>
			<td><?php echo pFormat($incident['Incident']['problems4']); ?></td>
		</tr>
		<tr>
			<td>
				<strong>Brief Description</strong>
			</td>
			<td colspan="3">
				<?php echo h($incident['Incident']['incident']); ?>
			</td>
		</tr>
		<tr>
			<td>
				<strong>Action Taken</strong>
			</td>
			<td colspan="3">
				<?php echo $incident['Incident']['action']; ?>
			</td>
		</tr>
	</table>
	<hr>
</div>
<?php endforeach; ?>