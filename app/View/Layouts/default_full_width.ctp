<?php
echo $this->element('header');
?>
	<div class="row">
		<div class="col-md-9">
			<?php echo $this->Session->flash(); ?>
		
			<?php echo $content_for_layout; ?>
		</div>
		<div class="col-md-3">
			<?php echo $this->element('newmenu'); ?>
		</div>
	</div>
<?php 
echo $this->element('footer');