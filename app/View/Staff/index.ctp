<h3>Staff List</h3>
<h4>Teaching Staff</h4>
<div class="row">
	<div class="span8 stafflist">
		<div class="row">
			<?php foreach($staff[0] as $staff): ?>
				<div class="span2 staff">
					<div class="thumb">
						?
					</div>
					<h5>
						<a href="#">
							<?php echo $staff['Staff']['forename']; ?>
							<?php echo $staff['Staff']['surname']; ?>
						</a>
						<br>
						<small>
							<?php echo $staff['Staff']['title']; ?>
						</small>
					</h5>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>

<h4>Support Staff</h4>
<div class="row">
	<div class="span8 stafflist">
		<div class="row">
			<?php foreach($staff[1] as $staff): ?>
				<div class="span2 staff">
					<div class="thumb">
						?
					</div>
					<h5>
						<a href="#">
							<?php echo $staff['Staff']['forename']; ?>
							<?php echo $staff['Staff']['surname']; ?>
						</a>
						<br>
						<small>
							<?php echo $staff['Staff']['title']; ?>
						</small>
					</h5>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>