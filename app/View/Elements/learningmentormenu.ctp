<p>&nbsp;</p>
<div class="navigation nav-smt">
	<div class="container condensed">
		<?php 
		echo (
			$this->Html->Link('Learning Mentor Home', array('controller' => 'incidents', 'action' => 'learningmentorhome'), array('class' => 'button-secondary-nav')) . ' ' .
			$this->Html->Link('Incident List', array('controller' => 'incidents', 'action' => 'index'), array('class' => 'button-secondary-nav')) . ' ' .
			$this->Html->Link('Year Groups', array('controller' => 'incidents', 'action' => 'years'), array('class' => 'button-secondary-nav')) . ' ' .
			$this->Html->Link('Tutor Groups', array('controller' => 'incidents', 'action' => 'formList'), array('class' => 'button-secondary-nav'))
		);
		?>
	</div>
</div>