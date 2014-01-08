<?php 
echo Markdown($bulletin['StaffBulletin']['details']); 
$IntranetAuth = new Authentication;
if (isset($cmsuser)) {
	echo $this->Html->Link('Edit', array('action' => 'edit', $bulletin['StaffBulletin']['id'])); 
	echo ' | ';
	echo $this->Html->Link('Staff Bulletins', array('action' => 'index'));
}