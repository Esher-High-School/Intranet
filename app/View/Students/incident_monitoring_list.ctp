<h4>Select Year Group</h4>
<div class="pagination center">
	<ul>
		<li>
			<?php echo $this->Html->Link('Year 7', array('action' => 'incidentMonitoringList', '7')); ?>
		</li>
		<li>
			<?php echo $this->Html->Link('Year 8', array('action' => 'incidentMonitoringList', '8')); ?>
		</li>
		<li>
			<?php echo $this->Html->Link('Year 9', array('action' => 'incidentMonitoringList', '9')); ?>
		</li>
		<li>
			<?php echo $this->Html->Link('Year 10', array('action' => 'incidentMonitoringList', '10')); ?>
		</li>
		<li>
			<?php echo $this->Html->Link('Year 11', array('action' => 'incidentMonitoringList', '11')); ?>
		</li>
	</ul>
</div>
<?php if (isset($year)) { ?>
	<h4>Select Student</h4>
	<table class="table table-hover table-striped table-condensed">
		<thead>
			<th>Surname</th>
			<th>Forename</th>
			<th>Form</th>
			<th width="1%"></th>
		</thead>
		<tbody>
			<?php foreach ($students as $student): ?>
				<tr>
					<td>
						<?php 
						echo $student['Student']['surname']; ?>
					</td>
                                        <td>
                                                <?php
                                                echo $student['Student']['forename'] ?>
                                        </td>

					<td><?php echo $student['Student']['form']; ?></td>
					<td>
						<?php echo $this->Html->Link('Select', array('controller' => 'incidentMonitors', 'action' => 'add', $student['Student']['upn'])); ?>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
<?php } ?>
