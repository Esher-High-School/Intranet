<?php include "connect.php"; ?>
<?php include "access.php" ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Links</title>
<style type="text/css">
<!--
a:link {
	color: #0000FF;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #0000FF;
}
a:hover {
	text-decoration: none;
	color: #0000FF;
}
a:active {
	text-decoration: none;
	color: #0000FF;
}
-->
</style>
<script type="text/javascript" src="jquery-1.3.2.min.js"></script> 
<script type="text/javascript" src="jquery.pngFix.js"></script> 
<script type="text/javascript"> 
    $(document).ready(function(){ 
        $(document).pngFix(); 
	hide("pr1");
	hide("pr2");
	hide("pr3");
	hide("pr4");
	hide("pr5");
	hide("pr6");
	hide("pr7");
    }); 
</script> 
<script language="javascript">
  function toggle_it(itemID){
      // Toggle visibility between none and inline
      if ((document.getElementById(itemID).style.display == 'none'))
      {
        document.getElementById(itemID).style.display = 'inline';
      } else {
        document.getElementById(itemID).style.display = 'none';
      }
  }

  function hide(itemID) {
	document.getElementById(itemID).style.display = 'none';
  }
</script> 
</head>

<body>
<p align="center"><a href="welcome.htm" target="cdoc"><img src="logo.png" width="113" height="113" border="0"></a></p>
<p align="center"><strong>Esher High School Staff Handbook </strong></p>
<table width="100%" border="0">
  <tr>
    <td colspan="3"><img src="folder.png" width="16" height="15"> <a href="welcome.htm" target="cdoc">EHS Staff Handbook </a></td>
  </tr>
<?php
$query=mysql_query("SELECT * FROM `categories`");

while($row=mysql_fetch_array($query,MYSQL_ASSOC)) {
	// Draw Categories and docs
	echo '<tr><td width="25">&nbsp; </td><td colspan="2"><a href="#" onClick="toggle_it(\'pr'.$row['id'].'\')"><img src="folder.png" border="0"> '.$row['name'].'</a></td></tr>';
    	echo '<tr><td colspan="3" align="left"><table id="pr'.$row['id'].'" width="100%" align="left" style="display: none;">';
	// Documents
	$parent=$row['id'];
	$query_d=mysql_query("SELECT * FROM  `documents` WHERE `review`='1' and `parent`='$parent' or `owner`='$me' and `parent`='$parent'");
	while($d_row=mysql_fetch_array($query_d,MYSQL_ASSOC)) {
		echo '<tr><td width="50">&nbsp;</td><td align="left" nowrap><img src="file_small.png" width="16" height="18"> <a href="go.php?d='.$d_row['id'].'" target="cdoc">'.$d_row['name'].'</a></td></tr>';
	}
	// End	
	echo '</table>';
}
?>
  </td></tr>
</table>
<p align="center">&nbsp;</p>
</body>
</html>

