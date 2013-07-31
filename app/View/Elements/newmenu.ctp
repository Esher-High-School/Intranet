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
						<?php echo $this->Html->Link('Incident Report Printout', array('controller' => 'students', 'action' => 'incidentPrintList')); ?>
					</li>
				<?php endif; ?>
			<?php endif; ?>
		</ul>
	</div>
</div> 