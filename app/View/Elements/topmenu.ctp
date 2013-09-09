<div class="navigation">
	<div class="container condensed">
		<?php
			echo $this->Html->Link('Ariadne', array('controller' => 'pages', 'action' => 'view', 27), array('class' => 'button-nav'));
			echo $this->Html->Link('Calendar', array('controller' => 'pages', 'action' => 'view', 26), array('class' => 'button-nav'));
			echo $this->Html->Link('Cover', 'file://10.18.56.70\everyone\Cover\COVER7.HTM', array('class' => 'button-nav'));
			echo $this->Html->Link('Phone Extensions', array('controller' => 'phoneextensions', 'action' => 'index'), array('class' => 'button-nav'));
			echo $this->Html->Link('School Development Plan', array('controller' => 'pages', 'action' => 'view', 37), array('class' => 'button-nav'));
			echo $this->Html->Link('Email', 'https://webmail.esherhigh.surrey.sch.uk/', array('class' => 'button-nav'));
			echo $this->Html->Link('Website', 'http://www.esherhigh.surrey.sch.uk/', array('class' => 'button-nav'));
			echo $this->Html->Link('Helpdesk', 'http://10.18.56.70/SupportDeskSSP/Login_AI_Edit.aspx?login=' . $user, array('class' => 'button-nav'));	
			echo $this->Html->Link('Incident Form', array('controller' => 'students', 'action' => 'incidentFormList'), array('class' => 'button-nav'));
			echo $this->Html->Link('VLE', 'https://elm.itslearning.com', array('class' => 'button-nav'));
		?>
	</div>
</div>
