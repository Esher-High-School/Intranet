<h3>Settings</h3>
<table class="table table-striped table-hover table-condensed">
	<thead>
		<th>Name</th>
		<th>Value</th>
		<th>
		
		</th>
	</thead>
	<tbody>
		<?php foreach($settings as $setting): ?>
			<tr>
				<td>
					<?php echo $setting['Setting']['name']; ?>
				</td>
				<td>
					<?php echo $setting['Setting']['value']; ?>
				</td>
				<td>
					<?php echo $this->Html->Link('Edit', array('action' => 'edit', $setting['Setting']['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<p>
	<?php echo $this->Html->Link('Add Setting', array('action' => 'add')); ?>
</p>