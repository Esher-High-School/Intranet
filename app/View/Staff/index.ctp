<h3>Staff List</h3>
<h4>Teaching Staff</h4>
<?php foreach($groups[0] as $group): ?>
	<h5><?php echo $group['StaffGroup']['name']; ?></h5>
	<div class="row">
		<div class="span8 stafflist">
			<div class="row">
				<?php foreach($group['Staff'] as $staff): ?>
					<div class="span2 staff">
						<div class="thumb">
							?
						</div>
						<h5>
							<a href="#">
								<?php echo $staff['forename']; ?>
								<?php echo $staff['surname']; ?>
							</a>
							<br>
							<small>
								<?php echo $staff['title']; ?>
							</small>
						</h5>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
<?php endforeach; ?>

<h4>Support Staff</h4>
<?php foreach($groups[1] as $group): ?>
	<h5><?php echo $group['StaffGroup']['name']; ?></h5>
	<div class="row">
		<div class="span8 stafflist">
			<div class="row">
				<?php foreach($group['Staff'] as $staff): ?>
					<div class="span2 staff">
						<div class="thumb">
							<?php echo $this->Html->Link(
								'?',
								array(
									'action' => 'view',
									$staff['id']
								)
							);
							?>
						</div>
						<h5>
							<?php echo $this->Html->Link(
								$staff['forename'] . ' ' .
								$staff['surname'],
								array(
									'action' => 'view',
									$staff['id']
								)
							);
							?>
							
							<br>
							<small>
								<?php echo $staff['title']; ?>
							</small>
						</h5>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
<?php endforeach; ?>

<?php if (isset($cmsuser['CmsUser']['user'])): ?>
	<?php if ($cmsuser['CmsUser']['authlevel'] == 2): ?>
		<p>
			<?php echo $this->Html->Link('Add Staff', array('action' => 'add')); ?>
			&nbsp;-&nbsp;
			<?php echo $this->Html->Link('Manage Groups', array('controller' => 'StaffGroups', 'action' => 'index')); ?>
		</p>
	<?php endif; ?>
<?php endif; ?>