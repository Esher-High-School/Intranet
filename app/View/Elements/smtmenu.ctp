<div class="navigation nav-sub">
	<div class="container condensed">
		<?php 
		echo (
			$this->Html->Link('SMT Home', array('controller' => 'incidents', 'action' => 'smthome'), array('class' => 'button-secondary-nav')) . ' ' .
			$this->Html->Link('Incident List', array('controller' => 'incidents', 'action' => 'index'), array('class' => 'button-secondary-nav')) . ' ' .
			$this->Html->Link('Year Groups', array('controller' => 'incidents', 'action' => 'years'), array('class' => 'button-secondary-nav')) . ' ' .
			$this->Html->Link('Tutor Groups', array('controller' => 'incidents', 'action' => 'formList'), array('class' => 'button-secondary-nav')) . ' ' . 
			$this->Html->Link('Departments', array('controller' => 'incidents', 'action' => 'departments'), array('class' => 'button-secondary-nav')) . ' ' .
			$this->Html->Link('Users', array('controller' => 'incidents', 'action' => 'users'), array('class' => 'button-secondary-nav'))
		);
		?>
	</div>
</div>
