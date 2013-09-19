<?php
function require_admin() {
	$row=mysql_fetch_array(mysql_query("SELECT * FROM `access` WHERE `user`='".mysql_real_escape_string($_SERVER["REMOTE_USER"])."'"),MYSQL_ASSOC);
	if ($row['type']<>2) { include "header.php"; echo "<h3>Access Denied!</h3>Sorry but only <b>Administrators</b> can access the page!"; include "footer.php"; die(); } 
}

function require_pub_or_admin() {
	$row=mysql_fetch_array(mysql_query("SELECT * FROM `access` WHERE `user`='".mysql_real_escape_string($_SERVER["REMOTE_USER"])."'"),MYSQL_ASSOC);
	if ($row['type']==0) { include "header.php"; echo "<h3>Access Denied!</h3>Sorry but only <b>Publishers</b> or <b>Administrators</b> can access the page!"; include "footer.php"; die(); } 
}

function is_admin() {
	$row=mysql_fetch_array(mysql_query("SELECT * FROM `access` WHERE `user`='".mysql_real_escape_string($_SERVER["REMOTE_USER"])."'"),MYSQL_ASSOC);
	if ($row['type']==2) { return "1"; } 
}

function is_pub() {
	$row=mysql_fetch_array(mysql_query("SELECT * FROM `access` WHERE `user`='".mysql_real_escape_string($_SERVER["REMOTE_USER"])."'"),MYSQL_ASSOC);
	if ($row['type']==1) { return "1"; } 
}

$me=mysql_real_escape_string($_SERVER["REMOTE_USER"]);

?>