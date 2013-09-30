<div class="navigation">
	<div class="nav-bg">
		<?php foreach($headerlinks as $link): ?>
			<a href="<?php echo $link['Link']['link']; ?>" class="button-nav">
				<?php echo $link['Link']['menu']; ?>
			</a>
		<?php endforeach; ?>
	</div>
</div>
