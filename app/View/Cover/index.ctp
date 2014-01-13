<nav class="navbar navbar-default" role="navigation">
	<div class="navbar-header">
		<ul class="nav navbar-nav">
			<li><a href="#" class="navbar-brand"><?php echo date('F'); ?></a></li>
		</ul>
		<ul class="nav navbar-nav pull-right">
			<?php foreach ($days as $day): ?>
				<li>
					<a href="/cover/<?php echo date('dmy', strtotime($day)); ?>"><?php echo date('l jS', strtotime($day)); ?></a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</nav>
<?php
if ($date !== null): ?>
	<iframe src="/coverfiles/CV<?php echo $date; ?>.htm" style="width: 100%; height: 800px;"></iframe>
<?php else: ?>
	<p>Please select a date.</p>
<?php endif; ?>
