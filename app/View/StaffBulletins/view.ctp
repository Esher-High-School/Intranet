<?php 
echo ('<h3>' . h($bulletin['StaffBulletin']['title']) . '</h3>');
echo $bulletin['StaffBulletin']['details']; 
$IntranetAuth = new Authentication;
if ($IntranetAuth->isAdmin()) {
	echo $this->Html->Link('Edit', array('action' => 'edit', $bulletin['StaffBulletin']['id'])); 
}