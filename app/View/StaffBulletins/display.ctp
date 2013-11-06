<div id="sbCarousel" class="carousel slide">
	<div class="carousel-inner">
		<?php foreach ($bulletins as $i => $staffbulletin):
		if ($staffbulletin['StaffBulletin']['published'] == 1) {
			if ($i == 0) { ?>
				<div class="active item">
			<?php } else { ?>
				<div class="item">
			<?php } ?>
					<table class="sbCarousel-table" style="width: 70%; margin-left: auto; margin-right: auto;">
						<tr>
							<td width="300">
								<div class="note">
									<div class="note-inner">
										<p><?php echo $staffbulletin['StaffBulletin']['summary']; ?></p>
									</div>
								</div>
							</td>
							<td>
								<div class="bulletin-text">
									<p><?php echo $this->Html->Link('Details', array('controller' => 'StaffBulletins', 'action' => 'view', $staffbulletin['StaffBulletin']['id']), array('class' => 'btn btn-primary')); ?></p>
									<p><?php echo $this->Html->Link($staffbulletin['StaffBulletin']['doctitle'], $staffbulletin['StaffBulletin']['document'], array('class' => 'btn btn-default')); ?></p>
								</div>
							</td>
						</tr>
					</table>
				</div>
		<?php
			}
		endforeach; ?>
	</div>
				<a class="carousel-control left" href="#sbCarousel" data-slide="prev">&lsaquo;</a>
		<a class="carousel-control right" href="#sbCarousel" data-slide="next">&rsaquo;</a>
</div>
<h2 class="center"><small>(to post a message here, please email ICT support)</small></h2>

<h3>Search</h3>
<div class="searches">
	<form action="" method="post" class="search">
		<input name="query" type="text" class="form-control">
		<br>
		<label for="googleSearch" class="searchProvider">
			<input type="radio" name="sp" value="google" id="googleSearch" checked>
			Google
		</label>
		<label for="wikipediaSearch" class="searchProvider">
			<input type="radio" name="sp" value="wikipedia" id="wikipediaSearch">
			Wikipedia
		</label>
		<label for="wolframSearch" class="searchProvider">
			<input type="radio" name="sp" value="wolframalpha" id="wolframSearch">
			Wolfram Alpha
		</label>
		<br><br>
		<input class="btn btn-primary btn-large" type="submit" value="Search">
	</form>
</div>
	
<script type="text/javascript">
    $('#sbCarousel').carousel({
    interval: 10000
    })
	$('#sbCarousel').carousel('cycle')
</script>
