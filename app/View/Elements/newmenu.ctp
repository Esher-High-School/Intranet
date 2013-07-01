<div class="side-nav">
	<div class="well">
		<?php // Primary Links ?>
		<ul class="nav nav-list">
			<?php foreach ($links as $link): ?>
				<li>
					<?php echo ('<a href="' . $link['Link']['link'] . '">' . $link['Link']['menu'] . '</a>'); ?>
				</li>
			<?php endforeach; ?>
			<li class="divider"></li>
		</ul>
		
		<?php // Incident Reporting ?>
		<ul class="nav nav-list">
			<li class="nav-header">
				Incident Reporting
			</li>
			<li>
				<?php echo $this->Html->Link('Incident Form', array('controller' => 'students', 'action' => 'incidentFormList')); ?>
			</li>
			<?php if (isset($learningmentor['LearningMentor']['id'])): ?>
				<li>
					<?php echo $this->Html->Link('Learning Mentor Incidents', array('controller' => 'incidents', 'action' => 'learningmentorhome')); ?>
				</li>
			<?php endif; ?>
			<?php if (isset($smt['Smt']['id'])): ?>
				<li>
					<?php echo $this->Html->Link('SMT Incident Reporting', array('controller' => 'incidents', 'action' => 'smthome')); ?>
				</li>
			<?php endif; ?>
			<?php if (isset($hoy[0])): ?>
				<li>
					<?php echo $this->Html->Link('My Year Group', array('controller' => 'incidents', 'action' => 'hoyHome')); ?>
				</li>
			<?php endif; ?>
			<?php if (isset($tutors['Tutors']['id'])): ?>
				<li>
					<?php echo $this->Html->Link('My Form', 'http://web.esherhigh.surrey.sch.uk/tutor_index.php'); ?>
				</li>
			<?php endif; ?>
			<?php if (isset($hod[0])): ?>
				<li>
					<?php echo $this->Html->Link('My Department', array('controller' => 'incidents', 'action' => 'hodHome')); ?>
				</li>
			<?php endif; ?>
			<?php if (isset($incidentuser['IncidentUser'])): ?>
				<?php if ($incidentuser['IncidentUser']['monitoring'] == 1): ?>
					<li><?php echo $this->Html->Link('Monitor Students', array('controller' => 'students', 'action' => 'incidentMonitoringList')); ?></li>
				<?php endif; ?>
				<?php if ($incidentuser['IncidentUser']['printing'] == 1): ?>
					<li>
						<?php echo $this->Html->Link('Incident Report Printout', 'http://web.esherhigh.surrey.sch.uk/AlexReportGenerateSelect.php'); ?>
					</li>
				<?php endif; ?>
			<?php endif; ?>
			<li class="divider"></li>
		</ul>
		
		<?php // CMS management ?>
		<?php if (isset($cmsuser['CmsUser']['id'])): ?>
			<ul class="nav nav-list">
				<li class="nav-header">
					Content Management
				</li>
				<?php if ($cmsuser['CmsUser']['authlevel'] == 2 or $cmsuser['CmsUser']['role'] == 1): ?>
					<li>
						<?php echo $this->Html->Link('Links', array('controller' => 'links', 'action' => 'index')); ?>
					</li>
					<li>
						<?php echo $this->Html->Link('Pages', array('controller' => 'pages', 'action' => 'index')); ?>
					</li>
					<li>
						<?php echo $this->Html->Link('Staff Bulletin', array('controller' => 'staffbulletins', 'action' => 'index')); ?>
					</li>
					<li>
						<?php echo $this->Html->link('Files', array('controller' => 'files', 'action' => 'index')); ?>
					</li>
				<?php endif; ?>
				<?php if ($cmsuser['CmsUser']['authlevel'] == 2): ?>
					<li>
						<?php echo $this->Html->Link('Students', array('controller' => 'students', 'action' => 'years')); ?>
					</li>
				<?php endif; ?>
				<?php if ($cmsuser['CmsUser']['authlevel'] >= 2): ?>
					<li>
						<?php echo $this->Html->Link('Thought For The Day Upload', 'http://web.esherhigh.surrey.sch.uk/tfd_upload.php'); ?>
					</li>
				<?php endif; ?>
				<li class="divider"></li>
			</ul>
		<?php endif; ?>
		
		<?php // User Management ?>
		<?php if (isset($cmsuser['CmsUser'])): ?>
			<?php if ($cmsuser['CmsUser']['authlevel'] == 2): ?>
				<ul class="nav nav-list">
					<li class="nav-header">User Management</li>
					<li>
						<?php echo $this->Html->Link('Tutors', array('controller' => 'tutors', 'action' => 'index')); ?>
					</li>
					<li>
						<?php echo $this->Html->Link('Department Heads', array('controller' => 'hods', 'action' => 'index')); ?>
					</li>
					<li>
						<?php echo $this->Html->Link('Year Heads', array('controller' => 'hoys', 'action' => 'index')); ?>
					</li>
					<li>
						<?php echo $this->Html->Link('Incident Users', array('controller' => 'IncidentUsers', 'action' => 'index')); ?>
					</li>
					<li>
						<?php echo $this->Html->Link('Learning Mentors', array('controller' => 'learningmentors', 'action' => 'index')); ?>
					</li>
					<li>
						<?php echo $this->Html->Link('SMT Staff', array('controller' => 'smts', 'action' => 'index')); ?>
					</li>
					<li>
						<?php echo $this->Html->Link('CMS Users', array('controller' => 'cmsusers', 'action' => 'index')); ?>
					</li>
					<li class="divider">
				</ul>
			<?php endif; ?>
			<?php // Administrator Links ?>
			<?php if ($cmsuser['CmsUser']['authlevel'] == 2): ?>
				<ul class="nav nav-list">
					<li class="nav-header">Administrator Links</li>
					<li>
						<?php echo $this->Html->Link('Censornet', 'http://10.18.56.9'); ?>
					</i>
					<li>
						<?php echo $this->Html->Link('Digital Signage', 'http://10.18.56.35'); ?>
					</li>
					<li>
						<?php echo $this->Html->Link('phpMyAdmin', 'http://admin.web.esherhigh.surrey.sch.uk/phpmyadmin/'); ?>
					</li>
					<li>
						<?php echo $this->Html->Link('phpSysInfo', 'http://admin.web.esherhigh.surrey.sch.uk/phpSysInfo/'); ?>
					</li>
					<li>
						<?php echo $this->Html->Link('RM Management Console', 'https://ehs-cc3-001'); ?>
					</li>
					<li>
						<?php echo $this->Html->Link('LANsweeper: 2kserver', 'http://2kserver/lansweeper/'); ?>
					</li>
				</ul>
			<?php endif; ?>
		<?php endif; ?>
	</div>
</div>