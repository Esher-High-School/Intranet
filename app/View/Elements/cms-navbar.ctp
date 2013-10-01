<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<a href="/" class="brand">Staff Intranet</a>
			<ul class="nav navbar-nav pull-right">
				<?php if (isset($cmsuser['CmsUser']['id'])): ?>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							Content
							<b class="caret"></b>
						</a>

						<ul class="dropdown-menu">
							<?php if ($cmsuser['CmsUser']['authlevel'] == 2): ?>
								<li>
									<?php echo $this->Html->Link('Links', array('controller' => 'links', 'action' => 'index')); ?>
								</li>
								<li class="divider"></li>
							<?php endif; ?>
							<?php if ($cmsuser['CmsUser']['authlevel'] == 2 or $cmsuser['CmsUser']['authlevel'] == 1): ?>
								<li>
									<?php echo $this->Html->Link('Documents', array('controller' => 'documentCategories', 'action' => 'index')); ?>
								</li>
								<li>
									<?php echo $this->Html->Link('Pages', array('controller' => 'pages', 'action' => 'index')); ?>
								</li>
								<li>
									<?php echo $this->Html->Link('Staff Bulletin', array('controller' => 'staffbulletins', 'action' => 'index')); ?>
								</li>
							<?php endif; ?>
							<?php if ($cmsuser['CmsUser']['authlevel'] >= 2): ?>
								<li>
									<?php echo $this->Html->Link('Thought For The Day', 'http://web.esherhigh.surrey.sch.uk/tfd_upload.php'); ?>
								</li>
							<?php endif; ?>
							<?php if ($cmsuser['CmsUser']['authlevel'] == 2 or $cmsuser['CmsUser']['authlevel'] == 4): ?>
								<li>
									<?php echo $this->Html->Link('Staff Handbook', array('controller' => 'HandbookCategories', 'action' => 'index')); ?>
								</li>
							<?php endif; ?>
							<?php if($cmsuser['CmsUser']['authlevel'] == 2): ?>
								<li class="divider"></li>
								<li>
									<?php echo $this->Html->Link('Subjects', array('controller' => 'Subjects', 'action' => 'index')); ?>
								</li>
								<li>
									<?php echo $this->Html->Link('Rooms', array('controller' => 'Rooms', 'action' => 'index')); ?>
								</li>
							<?php endif; ?>
							<?php if($cmsuser['CmsUser']['authlevel'] == 2 or $cmsuser['CmsUser']['authlevel'] == 1): ?>
								<li class="divider"></li>
								<li>
									<?php echo $this->Html->link('Files', array('controller' => 'files', 'action' => 'index')); ?>
								</li>
							<?php endif; ?>
						</ul>
					</li>
				<?php endif; ?>

				<?php if ($cmsuser['CmsUser']['authlevel'] == 2): ?>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							Users
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu">
							<li>
                                                                <?php echo $this->Html->Link('CMS Users', array('controller' => 'cmsUsers', 'action' => 'index')); ?>
                                                        </li>
							<li class="divider"></li>
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
								<?php echo $this->Html->Link('Incident Users', array('controller' => 'IncidentUsers', 'action' => 'index')); ?>
							</li>
							<li>
								<?php echo $this->Html->Link('Learning Mentors', array('controller' => 'LearningMentors', 'action' => 'index')); ?>
							</li>
							<li>
								<?php echo $this->Html->Link('SMT Staff', array('controller' => 'smts', 'action' => 'index')); ?>
							</li>
						</ul>
					</li>
				<?php endif; ?>

				<?php if($cmsuser['CmsUser']['authlevel'] == 2): ?>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							Admin
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu">
							<li>
								<?php echo $this->Html->Link('Global Settings', array('controller' => 'settings', 'action' => 'index')); ?>
							</li>
							<li class="divider">

							</li>
							<li>
								<?php echo $this->Html->Link('Classlink 11', 'https://eh-cl11.esherhigh.surrey.sch.uk'); ?>
							</li>
							<li>
								<?php echo $this->Html->Link('Censornet', 'http://10.18.56.9'); ?>
							</li>
							<li class="divider">

							</li>
							<li>
								<?php echo $this->Html->Link('phpMyAdmin', 'http://admin.web.esherhigh.surrey.sch.uk/phpMyAdmin/'); ?>
							</li>
							<li>
								<?php echo $this->Html->Link('phpSysInfo', 'http://admin.web.esherhigh.surrey.sch.uk/phpSysInfo/'); ?>
							</li>
						</ul>
					</li>
				<?php endif; ?>
			</ul>
		</div>
	</div>
</div>
