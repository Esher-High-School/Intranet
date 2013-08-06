<h3>Staff Groups</h3>
<p><?php echo $this->Html->Link('Add Group', array('action' => 'add')); ?></p>
<h4>SLT Staff Groups</h4>
<table class="table table-striped table-hover table-condensed">
	<thead>
		<th>Name</th>
		<th>&nbsp;</th>
	</thead>
	<tbody>
		<?php foreach($group[2] as $group): ?>

		<?php endforeach; ?>
	</tbody>
</table>

<h4>Teaching Staff Groups</h4>
<table class="table table-striped table-hover table-condensed">
	<thead>
		<th>Name</th>
		<th>&nbsp;</th>
	</thead>
	<tbody>
		<?php foreach($group[0] as $group): ?>

		<?php endforeach; ?>
	</tbody>
</table>

<h4>Non-Teaching Staff Groups</h4>
<table class="table table-striped table-hover table-condensed">
	<thead>
		<th>Name</th>
		<th>&nbsp;</th>
	</thead>
	<tbody>
		<?php foreach($group[1] as $group): ?>

		<?php endforeach; ?>
	</tbody>
</table>