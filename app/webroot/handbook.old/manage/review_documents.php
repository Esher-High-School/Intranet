<?php
include "../connect.php";
include "../access.php";
require_pub_or_admin();
include "header.php"; 

if (is_admin()=="1") {

// ACTIONS
if ($_GET['reject']<>"") {
	$reject=mysql_real_escape_string($_GET['reject']);
	$query=mysql_query("SELECT * FROM `documents` WHERE `id`='$reject'");
	while ($row=mysql_fetch_array($query)) {
		unlink("D:/web.esherhigh.surrey.sch.uk/handbook/store/".$row['path']);
	}
	mysql_query("DELETE FROM `documents` WHERE `id`='$reject'");
	echo "<script>alert('Document was rejected!'); parent.tree.location.reload();</script>";
}

if ($_GET['accept']<>"") {
	$accept=mysql_real_escape_string($_GET['accept']);
	mysql_query("UPDATE `documents` SET `review` = '1' WHERE `id`='$accept'");
	echo "<script>alert('Document was accepted!'); parent.tree.location.reload();</script>";
}
?>
<h3>Review New Documents</h3>
<table width="700" border="1" style="border-collapse:collapse;border-color:#000000;">
<tr><td align="center"><b>Documents</b></td><td align="center"><b>Owner</b></td><td align="center"><b>Publish Date</b></td><td align="center"><b>Options</b></td></tr>

<?php


$query=mysql_query("SELECT * FROM `categories`");
while($row=mysql_fetch_array($query,MYSQL_ASSOC)) {
	echo '<tr><td align="left" colspan="4"><b>'.$row['name'].'</b></td></tr>';
	$dquery=mysql_query("SELECT * FROM `documents` WHERE `review`='0' and `parent`='".$row['id']."' ORDER BY `downloads` DESC");
	while ($d_row=mysql_fetch_array($dquery,MYSQL_ASSOC)) {
		echo '<tr><td>'.$d_row['name'].'</td><td align="center">'.$d_row['owner'].'</td><td align="center">'.date("F j, Y",$d_row['upload_date']).'</td><td align="center"><a href="../store/'.$d_row['path'].'" target="_new">View</a> - <a href="#" onClick="if (confirm(\'Are you sure you want to accept the document?\')) window.location=\'http://web.esherhigh.surrey.sch.uk/handbook/manage/review_documents.php?accept='.$d_row['id'].'\'">Accept</a> - <a href="#" onClick="if (confirm(\'Are you sure you want to reject the document?\')) window.location=\'http://web.esherhigh.surrey.sch.uk/handbook/manage/review_documents.php?reject='.$d_row['id'].'\'">Reject</a></td></tr>';
	}
}
echo '</table>';
}
?>
<h3>Review Existing Documents</h3>
<div align="center">
<table width="700" border="1" style="border-collapse:collapse;border-color:#000000;">
<tr><td align="center"><b>Documents</b></td><td align="center"><b>Owner</b></td><td align="center"><b>Publish Date</b></td><td align="center"><b>Review Date</b></td></tr>
<?php

$query=mysql_query("SELECT * FROM `categories`");
while($row=mysql_fetch_array($query,MYSQL_ASSOC)) {
	echo '<tr><td align="left" colspan="4"><b>'.$row['name'].'</b></td></tr>';
	$dquery=mysql_query("SELECT * FROM `documents` WHERE `review`='1' and `parent`='".$row['id']."' ORDER BY `downloads` DESC");
	while ($d_row=mysql_fetch_array($dquery,MYSQL_ASSOC)) {
		echo '<tr><td>'.$d_row['name'].'</td><td align="center">'.$d_row['owner'].'</td><td align="center">'.date("F j, Y",$d_row['upload_date']).'</td><td align="center">'.date("F j, Y",$d_row['review_date'])." (".nicetime($d_row['review_date']).")".'</td></tr>';
	}
}

function nicetime($unix_date) {
    $periods         = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
    $lengths         = array("60","60","24","7","4.35","12","10");
   
    $now             = time();
   
       // check validity of date
    if(empty($unix_date)) {   
        return "Bad date";
    }

    // is it future date or past date
    if($now > $unix_date) {   
        $difference     = $now - $unix_date;
        $tense         = "ago";
       
    } else {
        $difference     = $unix_date - $now;
        $tense         = "from now";
    }
   
    for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
        $difference /= $lengths[$j];
    }
   
    $difference = round($difference);
   
    if($difference != 1) {
        $periods[$j].= "s";
    }
   
    return "$difference $periods[$j] {$tense}";
}
?>
</table>
</div>
<?php include "footer.php"; ?>