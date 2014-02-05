<h4>Select Year Group</h4>
<div class="pagination center">
	<ul>
		<li>
			<?php echo $this->Html->Link('Year 7', array('action' => 'incidentPrintList', '7')); ?>
		</li>
		<li>
			<?php echo $this->Html->Link('Year 8', array('action' => 'incidentPrintList', '8')); ?>
		</li>
		<li>
			<?php echo $this->Html->Link('Year 9', array('action' => 'incidentPrintList', '9')); ?>
		</li>
		<li>
			<?php echo $this->Html->Link('Year 10', array('action' => 'incidentPrintList', '10')); ?>
		</li>
		<li>
			<?php echo $this->Html->Link('Year 11', array('action' => 'incidentPrintList', '11')); ?>
		</li>
	</ul>
</div>
<?php if (isset($year)): ?>
	<h4>Select Student</h4>
	<table class="table table-striped table-condensed table-centered">
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
						echo $this->Html->Link($name, array('controller' => 'incidents', 'action' => 'printIncidentsSelect', $student['Student']['upn'])); ?>
					</td>
					<td><?php echo $student['Student']['form']; ?></td>
					<td>
						<?php echo $this->Html->Link('Select', array('controller' => 'incidents', 'action' => 'printIncidentsSelect', $student['Student']['upn'])); ?>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
<?php endif ?>