<?php 
$gi = 0;
foreach($grouptypes as $grouptype): ?>
	<h4><?php echo $grouptype; ?></h4>
	<table class="table table-striped table-hover table-condensed">
		<thead>
			<th>Name</th>
			<th>&nbsp;</th>
		</thead>
		<tbody>
			<?php foreach($groups[$gi] as $group): ?>
				<tr>
					<td>
						<?php echo $group['StaffGroup']['name']; ?>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
<?php 
$gi++;
endforeach;
if (isset($cmsuser['CmsUser']['user'])): ?>
	<?php if ($cmsuser['CmsUser']['authlevel'] == 2): ?>
		<p>
			<?php echo $this->Html->Link('Add Group', array('action' => 'add')); ?>
			&nbsp;-&nbsp;
			<?php echo $this->Html->Link('Manage Staff', array('controller' => 'Staff', 'action' => 'index')); ?>
		</p>
	<?php endif; ?>
<?php endif; ?>