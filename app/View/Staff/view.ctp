<h3><?php echo $staff['Staff']['forename'] . ' ' . $staff['Staff']['surname']; ?></h3>
<div class="row">
	<div class="span3 staff view">
		<div class="thumb">
			<?php echo $this->Html->Link(
				'?',
				array(
					'action' => 'view',
					$staff['Staff']['id']
				)
			);
			?>
		</div>
	</div>
	<div class="span6">
		<table class="table table-condensed">
			<tr>
				<td>Name:</td>
				<td width="70%">
					<?php echo $staff['Staff']['forename']; ?> 
					<?php echo $staff['Staff']['surname']; ?>
				</td>
			</tr>

			<tr>
				<td>Group:</td>
				<td><?php echo $staff['StaffGroup']['name']; ?></td>
			</tr>

			<tr>
				<td>Job title:</td>
				<td><?php echo $staff['Staff']['title']; ?></td>
			</tr>
			<tr>
				<td>Other information:</td>
				<td><?php echo $staff['Staff']['description']; ?></td>
			</tr>
			<tr>
				<td>Email address:</td>
				<td><?php echo $staff['Staff']['username']; ?>@esherhigh.surrey.sch.uk</td>
			</tr>
		</table>
		<?php
			if ($cmsuser['CmsUser']['authlevel'] == 2) {
				echo $this->Html->Link('Edit', array('action' => 'edit', $staff['Staff']['id']));
			}
		?>
	</div>
</div>
<p><?php echo $this->Html->Link('Back to staff list', array('action' => 'index')); ?>