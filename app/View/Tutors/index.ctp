<?php 
$year = 7;
foreach ($tutors as $tutors2): ?>
<h4>Year <?php echo $year; ?> Tutors</h4>
<table class="table table-striped table-hover table-condensed">
		<thead>
				<th>Name</th>
				<th>Form</th>
				<th>Username</th>
				<th>
						<?php echo $this->Html->Link('Add', array('action' => 'add'), array('class' => 'btn btn-primary btn-xs')); ?>
				</th>
		</thead>
		<tbody>
				<?php foreach ($tutors2 as $tutor): ?>
						<tr>
								<td width="60%"><?php echo $tutor['Tutor']['name']; ?></td>
								<td width="10%"><?php echo $this->Html->Link($tutor['Tutor']['form'], array('action' => 'view', $tutor['Tutor']['id'])); ?></td>
								<td width="20%"><?php echo $tutor['Tutor']['username']; ?></td>
								<td>
										<?php
										echo $this->Html->Link(
											'Edit',
											array(
												'action' => 'edit', 
												$tutor['Tutor']['id']
											)
										); ?>
										&nbsp; <?php
										echo $this->Form->postLink(
											'Delete', 
											array(
												'action' => 'delete', 
												$tutor['Tutor']['id']
											),
											array('Are you sure you want to delete ' . $tutor['Tutor']['name'] . '?')
										);
										?>
								</td>
						</tr>
				<?php endforeach; ?>
		</tbody>
</table>
<?php 
$year++;
endforeach; ?>
