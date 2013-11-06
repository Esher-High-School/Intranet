<?php echo $page['Page']['page']; ?>
<?php
$IntranetAuth = new Authentication;
if ($IntranetAuth->isAdmin()) {
	echo $this->Html->Link('Edit', array('action' => 'edit', $page['Page']['id'])); 
}