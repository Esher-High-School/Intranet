<?php echo $this->Form->create('Incident', array('action' => 'reportSubmit')); ?>
	<?php
		echo $this->Form->hidden('upn', array('value' => $student['Student']['upn']));
		echo $this->Form->hidden('username', array('value' => $username));
		echo $this->Form->hidden('date', array('value' => date('Y-m-d')));
		echo $this->Form->hidden('tm', array('value' => date('H:i:s')));
		echo $this->Form->hidden('yeargroup', array('value' => $student['Student']['year']));
	?>
	<table class="table table-bordered table-striped table-condensed">
		<tbody>
			<tr>
				<td>
					<strong>Name</strong>
				</td>
				<td width="40%">
					<?php echo (
								$student['Student']['forename'] . ' ' . 
								$student['Student']['surname']
					); ?>
				</td>
				<td>
					<strong>Form</strong>
				</td>
				<td width="40%">
					<?php echo $student['Student']['form']; ?>
				</td>
			</tr>
			<tr>
				<td>
					<strong>Time</strong>
				</td>
				<td>
					<select name="data[Incident][time]" style="width: 100%;">
						<?php foreach ($times as $time): ?>
							<option value="<?php echo $time; ?>"><?php echo $time; ?></option>
						<?php endforeach; ?>
					</select>
				</td>
				<td>
					<strong>Subject</strong>
				</td>
				<td>
					<select name="data[Incident][subject]" style="width: 100%;">
						<option value="N/A">N/A</option>
						<?php foreach ($subjects as $subject): ?>
							<option value="<?php echo $subject['Subject']['name']; ?>">
								<?php echo $subject['Subject']['name']; ?>
							</option>
						<?php endforeach; ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<strong>Location</strong>
				</td>
				<td colspan="3">
					<select name="data[Incident][location]" style="width: 100%">
						<option value="na">N/A</option>
						<?php foreach ($rooms as $room): ?>
							<option value="<?php echo $room['Room']['name']; ?>">
								<?php echo $room['Room']['name']; ?>
							</option>
						<?php endforeach; ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<strong>Names of other students</strong>
				</td>
				<td colspan="3">
					<?php echo $this->Form->input('other', array('label' => false, 'class' => 'form-control')); ?>
				</td>
			</tr>
			<tr>
				<td>
					<strong>Problems</strong>
				</td>
				<td>
					<select name="data[Incident][problems1]" style="width: 100%">
						<option value="na">N/A</option>
						<?php foreach ($options as $option): ?>
							<option value="<?php echo $option['IncidentOption']['name']; ?>">
								<?php echo $option['IncidentOption']['name']; ?>
							</option>
						<?php endforeach; ?>
					</select>
				</td>
				<td>
					&nbsp;
				</td>
				<td>
					<select name="data[Incident][problems2]" style="width: 100%">
						<option value="na">N/A</option>
						<?php foreach ($options as $option): ?>
							<option value="<?php echo $option['IncidentOption']['name']; ?>">
								<?php echo $option['IncidentOption']['name']; ?>
							</option>
						<?php endforeach; ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					&nbsp;
				</td>
				<td>
					<select name="data[Incident][problems3]" style="width: 100%">
						<option value="na">N/A</option>
						<?php foreach ($options as $option): ?>
							<option value="<?php echo $option['IncidentOption']['name']; ?>">
								<?php echo $option['IncidentOption']['name']; ?>
							</option>
						<?php endforeach; ?>
					</select>
				</td>
				<td>
					&nbsp;
				</td>
				<td>
					<select name="data[Incident][problems4]" style="width: 100%">
						<option value="na">N/A</option>
						<?php foreach ($options as $option): ?>
							<option value="<?php echo $option['IncidentOption']['name']; ?>">
								<?php echo $option['IncidentOption']['name']; ?>
							</option>
						<?php endforeach; ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<strong>Brief Description</strong>
				</td>
				<td colspan="3">
				
				<?php echo $this->Form->input('incident', array('label' => false, 'class' => 'form-control')); ?>
				</td>
			</tr>
			<tr>
				<td>
					<strong>Action Taken</strong>
				</td>
				<td colspan="3">
					<select name="data[Incident][action]" style="width: 100%">
						<option value="na">N/A</option>
						<?php foreach ($actions as $action): ?>
							<option value="<?php echo $action; ?>">
								<?php echo $action; ?>
							</option>
						<?php endforeach; ?>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="4" style="text-align: center;">
					<?php echo $this->Form->button('Submit incident', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>
					<?php echo $this->Html->Link('Reset', array('action' => 'report', $student['Student']['upn']), array('class' => 'btn btn-default')); ?>
				</td>
			</tr>
		</tbody>
	</table>
<?php echo $this->Form->end(); ?>