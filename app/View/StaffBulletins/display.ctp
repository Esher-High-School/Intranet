<h3>Staff Noticeboard <small>Last updated: <?php echo $latestbulletin['StaffBulletin']['created']; ?></small></h3>
<div id="sbCarousel" class="carousel slide">
	<div class="carousel-inner">
		<?php foreach ($bulletins as $i => $staffbulletin):
		if ($staffbulletin['StaffBulletin']['published'] == 1) {
			if ($i == 0) { ?>
				<div class="active item">
			<?php } else { ?>
				<div class="item">
			<?php } ?>
					<table class="sbCarousel-table">
						<tr>
							<td>
								<div class="note">
									<div class="note-inner">
										<p><?php echo $staffbulletin['StaffBulletin']['summary']; ?></p>
									</div>
								</div>
							</td>
							<td>
								<div class="bulletin-text">
									<p><?php echo $this->Html->Link('Details', array('controller' => 'staffbulletins', 'action' => 'view', $staffbulletin['StaffBulletin']['id']), array('class' => 'btn btn-primary')); ?></p>
									<p><?php echo $this->Html->Link($staffbulletin['StaffBulletin']['doctitle'], $staffbulletin['StaffBulletin']['document'], array('class' => 'btn')); ?></p>
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

<h3>EHS Google Search</h3>
<div class="center">
	<p>&nbsp;</p>
	<form action="http://www.google.co.uk/search?" method="get">
		<input name="q" style="font-size: 12pt; width: 90%; height: 22px;" type="text">
		<br>
		<input class="btn btn-primary btn-large" type="submit" value="Google Search">
	</form>
</div>
	
<script type="text/javascript">
    $('#sbCarousel').carousel({
    interval: 10000
    })
	$('#sbCarousel').carousel('cycle')
</script>