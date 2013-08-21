<?php 
echo ('<h3>' . h($bulletin['StaffBulletin']['title']) . '</h3>');
echo $bulletin['StaffBulletin']['details']; 
$IntranetAuth = new Authentication;
if (isset($cmsuser)) {
	echo $this->Html->Link('Edit', array('action' => 'edit', $bulletin['StaffBulletin']['id'])); 
	echo ' | ';
	echo $this->Html->Link('Staff Bulletins', array('action' => 'index'));
}