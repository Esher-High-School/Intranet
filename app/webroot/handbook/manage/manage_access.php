<?php
include "../connect.php";
include "../access.php";
require_admin();
include "header.php"; 

if ($_GET['action']=="") {
	
} elseif ($_GET['action']=="add") {
	$name=mysql_real_escape_string($_POST['addname']);
	$type=mysql_real_escape_string($_POST['type']);
	mysql_query("INSERT INTO `access` (`user`,`type`) VALUES ('".$name."','".$type."')");
	echo '<script>alert("User was given access!");</script>';
} elseif ($_GET['action']=="del") {
	mysql_query("DELETE FROM `access` WHERE `user`='".mysql_real_escape_string($_POST['delname'])."'");
	echo '<script>alert("Users access was deleted!");</script>';
}

?>
<h3>Manage User Access</h3>
  <FIELDSET>
    <legend ACCESSKEY=I>Add User</legend>
    <table>
      <tr>
       	 <td>
         		<LABEL>Name:</LABEL>
       	 </td>
       	 <td>
			<form action="manage_access.php?action=add" method="POST"><input type="text" name="addname">
       	 </td>
      </tr>
      <tr>
		<td>
			<LABEL>User Type:</LABEL>
		</td>
		<td>
			<select name="type"><option value="1">Publisher</option><option value="2">Administrator</option></select>
		</td>
      </tr>
      <tr>
		<td colspan="2">
			<input type="submit" value="Add"></form>
		</td>
      </tr>
     </table>
  </FIELDSET>
  <FIELDSET>
    <legend ACCESSKEY=I>User Access</legend>
	<div align="center">
		<table border="1" style="border-collapse:collapse;border-color:#000000;" width="300">
		<tr><td align="center"><b>Username</b></td><td align="center"><b>Type</b></td><td align="center"><b>Delete</b></td></tr>
    	       <?php
		  $query=mysql_query("SELECT * FROM `access`");
		   while ($row=mysql_fetch_array($query,MYSQL_ASSOC)) {
			if ($row['type']=="1") { $type="Publisher"; }
			if ($row['type']=="2") { $type="Administrator"; }
			echo '<tr><td align="center">'.$row['user'].'</td><td align="center">'.$type.'</td><td align="center"><form action="manage_access.php?action=del" method="POST" style="display: inline;"><input type="hidden" name="delname" value="'.$row['user'].'"><input type="submit" value="X"></form></td></tr>';
		   }
		?>
		</table>
	</div>
  </FIELDSET>
 <?php include "footer.php"; ?>