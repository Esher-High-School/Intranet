<?php
$smtLinks = array(
	0 => array(
		'name' => 'SMT Home',
		'action' => 'smthome'
	),
	1 => array(
		'name' => 'Incident List',
		'action' => 'index'
	),
	2 => array(
		'name' => 'Year Groups',
		'action' => 'years'
	),
	3 => array(
		'name' => 'Tutor Groups',
		'action' => 'formList'
	),
	4 => array(
		'name' => 'Departments',
		'action' => 'departments'
	),
	5 => array(
		'name' => 'Users',
		'action' => 'users'
	)
);
?>
<ul class="nav nav-tabs nav-justified">
	<?php foreach ($smtLinks as $link): ?>
		<li>
			<?php
			echo $this->Html->Link($link['name'], 
				array(
					'controller' => 'incidents',
					'action' => $link['action']
				)
			);
			?>
		</li>
	<?php endforeach; ?>
</ul>