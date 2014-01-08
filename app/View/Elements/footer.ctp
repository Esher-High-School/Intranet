			</div>
		</div>
		<footer>
			<div class="container">	
				<div class="row">
					<div class="col-lg-6 left">
						<span class="heading">
							<?php echo $this->Html->Link($global_settings['School Name'], '/'); ?>
						</span>
					</div>
					<div class="col-lg-6 right">
						<span class="subheading">
							<?php echo $this->Html->Link('Staff Intranet', '/'); ?>
						</span>
					</div>
				</div>
			</div>
		</footer>
		<nav class="footer">
			<div class="container">
				<div class="row">
					<div class="col-lg-3">
						<?php 
						echo $this->Html->Link('Pages', array(
								'controller' => 'Pages',
								'action' => 'index'
							)
						);
						?>
					</div>
				</div>
			</div>
		</nav>
	</body>
</html>