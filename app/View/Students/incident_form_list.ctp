<h3>Incident Reporting</h3>
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
<?php if (isset($year)) { ?>
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
						<?php echo $this->Html->Link('Select', array('controller' => 'incidents', 'action' => 'report', $student['Student']['upn']), array('class' => 'btn btn-success btn-mini')); ?>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
<?php } ?>