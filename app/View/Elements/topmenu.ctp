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
									'controller' => 'Pages',
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
					<li>
						<?php echo $this->Html->Link('Accident Reporting', ' https://surreycc-safety.net/scc/login/default.aspx'); ?>
					</li>
					<li>
						<?php echo $this->Html->Link('Lesson Tracker System', 'http://esher.lessontrackersystem.com'); ?>
					</li>
					<li>
						<?php echo $this->Html->Link('Surrey CC Intranet', ' http://snet.surreycc.gov.uk/'); ?>
					</li>
					<li>
						<?php echo $this->Html->Link('Webmail', 'https://webmail.esherhigh.surrey.sch.uk'); ?>
					</li>
					<li>
						<?php echo $this->Html->Link('Website', 'http://www.esherhigh.surrey.sch.uk'); ?>
					</li>
					<li>
						<?php echo $this->Html->Link('VLE', 'https://elm.itslearning.com'); ?>
					</li>
						</ul>
					</li>
			<li>
				
				<?php echo $this->Html->Link('Cover', '/cover'); ?>
			</li>
			<li>
				<?php echo $this->Html->Link('Handbook', '/handbook'); ?>
			</li>
			<li>
				<?php echo $this->Html->Link('Helpdesk', 'http://10.18.56.36/SupportDeskSSP/Main.aspx'); ?>
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
					<?php if(isset($learningmentor['LearningMentor']['id'])): ?>
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
					if(isset($smt['Smt']['id'])): ?>
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
					if (isset($tutors['Tutors']['id'])): ?>
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
					if (isset($incidentuser['IncidentUser'])):
						if($incidentuser['IncidentUser']['monitoring'] == 1):
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
						<?php endif;
						if ($incidentuser['IncidentUser']['printing'] == 1): ?>
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
						endif;
					endif; ?>
				</ul>
			</li>
			<li>
				<?php echo $this->Html->Link('Phone Extensions',
					array(
						'controller' => 'PhoneExtensions',
						'action' => 'index'
					)
				);
				?>
			</li>
		</ul>
	</div>
</nav>