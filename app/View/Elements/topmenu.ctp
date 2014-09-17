<nav class="navbar navbar-default navbar-static-top" role="navigation">
	<div class="container">
		<ul class="nav navbar-nav">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					Pages <b class="caret"></b>
				</a>
				<ul class="dropdown-menu">
					<?php foreach($pages as $page): ?>
						<li>
							<?php
							echo $this->Html->Link($page['Page']['name'],
								array(
									'controller' => 'pages',
									'action' => 'view',
									$page['Page']['id']
								)
							);

							?>
						</li>
					<?php endforeach; ?>
				</ul>
			</li>


			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					Links <b class="caret"></b>
				</a>
				<ul class="dropdown-menu">
					<?php foreach($headerlinks as $link): ?>
						<li>
							<?php
							echo $this->Html->Link(
								$link['Link']['menu'],
								$link['Link']['link']
							);
							?>
						</li>
					<?php endforeach; ?>
				</ul>
			<li>

				<?php echo $this->Html->Link('Cover', '/coverfiles'); ?>
			</li>
			<li>
				<?php echo $this->Html->Link('Handbook', '/handbook'); ?>
			</li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					Helpdesk <b class="caret"></b>
				</a>
				<ul class="dropdown-menu">
					<li>
					   <a href="#" data-toggle="modal" data-target="#myModal">ICT Support</a>
					</li>
					<li>
						<?php echo $this->Html->Link('Premises', 'http://10.18.56.38/supportdeskssp/Main.aspx'); ?>
					</li>
				</ul>
			</li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					Incident Reporting <b class="caret"></b>
				</a>
				<ul class="dropdown-menu">
					<li>
						<?php
						echo $this->Html->Link('Incident Form',
							array(
								'controller' => 'students',
								'action' => 'incidentFormList'
							)
						);
						?>
					</li>
					<?php if(isset($ugroups['Learning Mentors'])): ?>
						<li>
							<?php
							echo $this->Html->Link('Learning Mentor Incidents',
								array(
									'controller' => 'incidents',
									'action' => 'learningmentorhome'
								)
							);
							?>
						</li>
					<?php endif;
					if(isset($ugroups['SMT'])): ?>
						<li>
							<?php
							echo $this->Html->Link('SMT Incident Reporting',
								array(
									'controller' => 'incidents',
									'action' => 'smthome'
								)
							);
							?>
						</li>
					<?php endif;
					if (isset($hoy[0])): ?>
						<li>
							<?php
							echo $this->Html->Link('My Year Group',
								array(
									'controller' => 'incidents',
									'action' => 'hoyHome'
								)
							);
							?>
						</li>
					<?php endif;
					if (isset($tutor['Tutors']['id'])): ?>
					?>
						<li>
							<?php
							echo $this->Html->Link('My Tutor Group',
								array(
									'controller' => 'incidents',
								)
							);
							?>
						</li>
					<?php endif;
					if (isset($hod[0])):
					?>
						<li>
							<?php
							echo $this->Html->Link('My Department',
								array(
									'controller' => 'incidents',
									'action' => 'hodHome'
								)
							);
							?>
						</li>
					<?php
					endif;
					if (isset($ugroups['Incident Monitoring'])):
					?>
							<li>
								<?php echo $this->Html->Link('Monitor Students',
									array(
										'controller' => 'students',
										'action' => 'incidentMonitoringList'
									)
								);
								?>
							</li>
					<?php
					endif;
					if (isset($ugroups['Incident Printing'])): ?>
						<li>
							<?php
							echo $this->Html->Link('Incident Report Printout',
								array(
									'controller' => 'students',
									'action' => 'incidentPrintList'
								)
							);
							?>
						</li>
					<?php
					endif; ?>
				</ul>
			</li>
			<li>
				<?php echo $this->Html->Link('Phone Extensions',
					array(
						'controller' => 'phoneExtensions',
						'action' => 'index'
					)
				);
				?>
			</li>
			<li>
				<?php echo $this->Html->Link('PARS', 'http://pars.esherhigh.surrey.sch.uk'); ?>
			</li>
		</ul>
	</div>
</nav>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">ICT Support Helpdesk</h4>
			</div>
			<div class="modal-body">
				<p>
					There is currently an issue with the Richmond Helpdesk software that prevents the helpdesk from working correctly using Google Chrome.
				</p>
				<p>
					<strong>Please use Internet Explorer to access the helpdesk for the time being</strong>.
				</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<a href="http://10.18.56.36/RSDPortal/" class="btn btn-primary">Continue to Helpdesk</a>
			</div>
		</div>
	</div>
</div>
