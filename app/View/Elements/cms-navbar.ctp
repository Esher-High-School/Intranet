<nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
	<div class="navbar-inner">
		<div class="container">
			<a href="/" class="navbar-brand">Staff Intranet</a>
			<ul class="nav navbar-nav pull-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						Content
						<b class="caret"></b>
					</a>

					<ul class="dropdown-menu">
						<?php if (isset($cmsuser)): ?>
							<li>
								<?php 
								echo $this->Html->Link(
									'<i class="fa fa-file-text-o"></i> Pages', 
									array(
										'controller' => 'pages', 
										'action' => 'index'
										),
									array(
										'escape' => false
									)
								); 
								?>
							</li>
							<li>
								<?php 
								echo $this->Html->Link(
									'<i class="fa fa-list-alt"></i> Staff Bulletin', 
									array(
										'controller' => 'staffBulletins', 
										'action' => 'index'
										),
									array(
										'escape' => false
									)
								); 
								?>
							</li>
						<?php endif; ?>
						<?php if (isset($cmsuser) or isset($handbookpublisher)): ?>
							<li>
								<?php 
								echo $this->Html->Link(
									'<i class="fa fa-book"></i> Staff Handbook', 
									array(
										'controller' => 'handbookCategories', 
										'action' => 'index'
									),
									array(
										'escape' => false
									)
								); ?>
							</li>
						<?php endif; ?>
						<?php if (isset($admin)): ?>
							<li>
								<?php 
								echo $this->Html->Link(
									'<i class="fa fa-link"></i> Links', 
									array(
										'controller' => 'links', 
										'action' => 'index'
									), 
									array('escape' => false)
								); 
								?>
							</li>
						<?php endif; ?>
						<?php if(isset($admin)): ?>
							<li class="divider"></li>
							<li>
								<?php 
								echo $this->Html->Link(
									'<i class="fa fa-folder"></i> Subjects', 
									array(
										'controller' => 'subjects', 
										'action' => 'index'
									),
									array(
										'escape' => false
									)
								); 
								?>
							</li>
							<li>
								<?php 
								echo $this->Html->Link(
									'<i class="fa fa-location-arrow"></i> Rooms', 
									array(
										'controller' => 'rooms', 
										'action' => 'index'
									),
									array(
										'escape' => false
									)
								); 
								?>
							</li>
							<li>
								<?php echo $this->Html->Link(
									'<i class="fa fa-list"></i> Incident Options',
									array(
										'controller' => 'incidentOptions',
										'action' => 'index'
									),
									array(
										'escape' => false
									)
								);
								?>
							</li>
							<li class="divider"></li>
							<li>
								<?php
								echo $this->Html->Link(
									'<i class="fa fa-user"></i> Users',
									array(
										'controller' => 'users',
										'action' => 'index'
									),
									array(
										'escape' => false
									)
								);
								?>
							</li>
							<li>
								<?php
								echo $this->Html->Link(
									'<i class="fa fa-users"></i> Groups',
									array(
										'controller' => 'groups',
										'action' => 'index'
									),
									array(
										'escape' => false
									)
								);
								?>
							</li>
							<li class="divider"></li>
							<li>
								<?php
								echo $this->Html->Link(
									'<i class="fa fa-cogs"></i> Global Settings', 
									array(
										'controller' => 'settings', 
										'action' => 'index'
									),
									array(
										'escape' => false
									)
								); 
								?>
							</li>
						<?php endif; ?>
					</ul>
				</li>

				<?php if (isset($admin)): ?>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							Users
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu">

							<li>
								<?php echo $this->Html->Link('Students', array('controller' => 'students', 'action' => 'years')); ?>
							</li>
							<li>
								<?php echo $this->Html->Link('Tutors', array('controller' => 'tutors', 'action' => 'index')); ?>
							</li>
							<li>
								<?php echo $this->Html->Link('Department Heads', array('controller' => 'hods', 'action' => 'index')); ?>
							</li>
							<li>
								<?php echo $this->Html->Link('Year Heads', array('controller' => 'hoys', 'action' => 'index')); ?>
							</li>
							<li class="divider"></li>
							<li>
								<?php echo $this->Html->Link('Incident Users', array('controller' => 'incidentUsers', 'action' => 'index')); ?>
							</li>
							<li>
								<?php echo $this->Html->Link('Learning Mentors', array('controller' => 'learningMentors', 'action' => 'index')); ?>
							</li>
							<li>
								<?php echo $this->Html->Link('SMT Staff', array('controller' => 'smts', 'action' => 'index')); ?>
							</li>
						</ul>
					</li>
				<?php endif; ?>
			</ul>
		</div>
	</div>
</nav>
