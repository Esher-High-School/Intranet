<table class="table table-striped table-bordered table-condensed" style="margin-top: 10px">
	<tr>
		<td>
			<strong>Reported by</strong>
		</td>
		<td colspan="3">
			<?php 
			echo $this->Incident->usernameFormat($incident['Incident']['username']);
			if (isset($smt)):
			?>
				<small>
					<?php
					echo $this->Html->Link('(View Incidents)', array(
						'action' => 'incidentsByUser', strtolower($incident['Incident']['username'])
					));
					?>
				</small>
			<?php endif; ?>
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
			if (isset($smt)): ?>
			<small>
				<?php echo $this->Html->Link('(View Incidents)', array('action' => 'student', $incident['Student']['upn'])); ?>
			</small>
			<?php endif; ?>
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
			<?php echo nl2br(h($incident['Incident']['other'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<strong>Problems</strong>
		</td>
		<td colspan="2"><?php echo $this->Incident->problemFormat($incident['Incident']['problems1']); ?></td>
		<td><?php echo $this->Incident->problemFormat($incident['Incident']['problems2']); ?></td>
	</tr>
	<tr>
		<td></td>
		<td colspan="2"><?php echo $this->Incident->problemFormat($incident['Incident']['problems3']); ?></td>
		<td><?php echo $this->Incident->problemFormat($incident['Incident']['problems4']); ?></td>
	</tr>
	<tr>
		<td>
			<strong>Brief Description</strong>
		</td>
		<td colspan="3">
			<?php echo nl2br(h($incident['Incident']['incident'])); ?>
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
<?php
if(isset($smt)): ?>
	<div class="actions">
		<h4>Actions</h4>
		<?php
		echo $this->Form->postLink('Delete', array(
				'action' => 'delete',
				$incident['Incident']['id'], 
				'class' => 'danger'
			),
			array(
				'Are you sure you want to delete this incident?'
			)
		);
		?>
	</div>
<?php endif; ?>