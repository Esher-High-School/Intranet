<?php
$disabledDate = strtotime('24 May 2014');
if (date('y-m-d') > date('y-m-d', $disabledDate)):
?>
	<div class="alert alert-danger">
		<h4>Incident Reporting Disabled</h4>
		<p>
			Incident reporting via the staff intranet has now been disabled. From now on, please report behaviour incidents via PARS.
		</p>
		<p>
			If you have any issues accessing PARS, please contact ICT support via the helpdesk.
		</p>
	</div>
<?php
else:
?>
<div class="alert alert-danger">
	<strong>Reminder:</strong> From the 2nd of June, all new bevahiour incidents must be logged using PARS instead of the intranet. Incident logging will be disabled on the staff intranet at the end of this week.
</div>
<p>Before you submit an incident report, keep in mind:</p>
<p>An individual report must be completed for each student with unacceptable behaviour.</p>
<p>Information on this form must be factual and describe the incident and/or action taken. This is not the place to express opinions.</p>
<p>When filling out an incident form it is essential that you select the correct subject and the correct class room.</p>

<h4>Select Year Group</h4>
<div class="pagination center">
	<ul>
		<li>
			<?php echo $this->Html->Link('Year 7', array('action' => 'incidentFormList', '7')); ?>
		</li>
		<li>
			<?php echo $this->Html->Link('Year 8', array('action' => 'incidentFormList', '8')); ?>
		</li>
		<li>
			<?php echo $this->Html->Link('Year 9', array('action' => 'incidentFormList', '9')); ?>
		</li>
		<li>
			<?php echo $this->Html->Link('Year 10', array('action' => 'incidentFormList', '10')); ?>
		</li>
		<li>
			<?php echo $this->Html->Link('Year 11', array('action' => 'incidentFormList', '11')); ?>
		</li>
	</ul>
</div>
<?php if (isset($year)): ?>
	<h4>Select Student</h4>
	<table class="table table-striped table-condensed table-hover">
		<thead>
			<th>Name</th>
			<th>Form</th>
			<th width="1%"></th>
		</thead>
		<tbody>
			<?php foreach ($students as $student): ?>
				<tr>
					<td>
						<?php
						$name = ($student['Student']['surname'] . ', ' . $student['Student']['forename']);
						echo $this->Html->Link($name, array('controller' => 'incidents', 'action' => 'report', $student['Student']['upn'])); ?>
					</td>
					<td><?php echo $student['Student']['form']; ?></td>
					<td>
						<?php echo $this->Html->Link('Select', array('controller' => 'incidents', 'action' => 'report', $student['Student']['upn']), array('class' => 'btn btn-success btn-xs')); ?>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
<?php endif;
endif; ?>
