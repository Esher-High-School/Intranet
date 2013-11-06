<table class="table table-striped table-hover table-condensed">
	<thead>
		<th>Date</th>
		<th>Name</th>
		<th>Download</th>
	</thead>
	<?php
	foreach ($tfds as $tfd) { ?>
		<tr>
			<td>
				<?php echo date('d m Y', $tfd['Tfd']['date']); ?>
			</td>
			<td>
				<?php echo stripslashes(h($tfd['Tfd']['name'])); ?>
			</td>
			<td>
				<a href="/files/tftd/<?php echo $tfd['Tfd']['path']; ?>">Download</a>
			</td>
		</tr>	
<?php
	}
?>
</table>
