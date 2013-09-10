<?php
include "connect.php";

$id=mysql_real_escape_string($_GET['d']);

$d_row=mysql_fetch_array(mysql_query("SELECT * FROM `documents` WHERE `id`='$id'"),MYSQL_ASSOC);

$path="store/".$d_row['path'];
$downloads=$d_row['downloads']+1;

mysql_query("UPDATE `documents` SET `downloads`='$downloads' WHERE `id`='$id' LIMIT 1 ;");

header("Location: ".$path);
?>