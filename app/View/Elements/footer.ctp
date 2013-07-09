			</div>
		</div>
		<footer>
			<div class="container">	
				<div class="row">
					<div class="span12 right">
						<h1>
							<?php echo $this->Html->Link('Esher C of E High School', '/'); ?>
						</h1>
						<h2>
							<?php echo $this->Html->Link('Staff Intranet', '/'); ?>
						</h2>
					</div>
				</div>
				<div class="row lower">
					<div class="span6 left">
						<p>&copy; Esher C of E High School <?php echo date('Y'); ?></p>
					</div>
					<div class="span6 right">
						<ul class="footer-nav">
							<li>
								<?php echo $this->Html->Link('Home', array('controller' => 'staffbulletins', 'action' => 'display')); ?>
							</li>
							<li>
								<?php echo $this->Html->Link('Website', 'http://www.esherhigh.surrey.sch.uk'); ?>
							</li>
							<li>
								<?php echo $this->Html->Link('Webmail', 'https://webmail.esherhigh.surrey.sch.uk'); ?>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</footer>
	</body>
</html>