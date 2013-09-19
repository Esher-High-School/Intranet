<?php
include "../connect.php";
include "../access.php";
require_pub_or_admin();
include "header.php"; 
?>

<h3>View Statistics</h3>
<div align="center">
<table width="600" border="1" style="border-collapse:collapse;border-color:#000000;">
<tr><td align="center"><b>Document</b></td><td align="center"><b>Hits</b></td></tr>
<?php

$query=mysql_query("SELECT * FROM `categories`");
while($row=mysql_fetch_array($query,MYSQL_ASSOC)) {
	echo '<tr><td align="left" colspan="2"><b>'.$row['name'].'</b></td></tr>';
	$dquery=mysql_query("SELECT * FROM `documents` WHERE `parent`='".$row['id']."' ORDER BY `downloads` DESC");
	while ($d_row=mysql_fetch_array($dquery,MYSQL_ASSOC)) {
		echo '<tr><td  align="left">'.$d_row['name'].'</td><td align="center">'.$d_row['downloads'].'</td></tr>';
	}
}

?>

</table>
</div>
<?php include "footer.php"; ?>