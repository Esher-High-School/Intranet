<?php
$IntranetAuth = new Authentication;
?>
<table class="table table-striped table-hover table-condensed">
	<thead>
		<th width="90%">Name</th>
		<th><?php echo $this->Html->link('Add', array('action' => 'add'), array('class' => 'btn btn-primary btn-xs')); ?></th>
	</thead>
	<tbody>
		<?php foreach ($learningmentors as $learningmentor): ?>
			<tr>
				<td><?php echo $learningmentor['LearningMentor']['username']; ?></td>
				<td>
					<?php
					if ($IntranetAuth->isAdmin()) {
						echo $this->Html->Link('<i class="icon-pencil black"></i>', array('action' => 'edit', $learningmentor['LearningMentor']['id']), array('escape' => false));
						echo $this->Form->postLink('<i class="icon-remove black"></i>', array('action' => 'delete', $learningmentor['LearningMentor']['id']), array('escape' => false));
					} ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
