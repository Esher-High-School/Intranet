<?php
include "../connect.php";
include "../access.php";
require_admin();
include "header.php"; 


if ($_GET['action']=="ren") {
	mysql_query("UPDATE `categories` SET `name` = '".mysql_real_escape_string($_POST['catnamenew'])."' WHERE `id`='".mysql_real_escape_string($_POST['catname'])."' LIMIT 1 ;");
	echo '<script>alert("Category was renamed"); parent.tree.location.reload();</script>';
} elseif ($_GET['action']=="add") {
	$cat=mysql_real_escape_string($_POST['catname']);
	mysql_query("INSERT INTO `categories` (`name`,`id`) VALUES ('".$cat."',NULL)");
	echo '<script>alert("Category was added"); parent.tree.location.reload();</script>';
} elseif ($_GET['action']=="del") {
	mysql_query("DELETE FROM `categories` WHERE `id`='".mysql_real_escape_string($_POST['catname'])."'");
	echo '<script>alert("Category was deleted"); parent.tree.location.reload();</script>';
}

?>
<h3>Manage Categories</h3>
  <FIELDSET>
    <legend ACCESSKEY=I>Add Category</legend>
    <table>
      <tr>
        <td>
          <LABEL>Name:</LABEL>
        </td>
        <td>
		<form action="manage_categories.php?action=add" method="POST">
          		<input type="text" name="catname">
	  		<input type="submit" value="Add">
		</form>
        </td>
      </tr>
     </table>
  </FIELDSET>
  <FIELDSET>
    <legend ACCESSKEY=I>Rename Category</legend>
    <table>
       <tr>
         <td>
            <LABEL>Category:</LABEL>
         </td>
	  <td>
	<form action="manage_categories.php?action=ren" method="POST">
	    <select name="catname">
	      <?php
		  $query=mysql_query("SELECT * FROM `categories`");
		   while ($row=mysql_fetch_array($query,MYSQL_ASSOC)) {
			echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
		   }
		?>
	    </select>
	
	  </td>
	</tr>
	<tr>
         <td>
            <LABEL>New Name:</LABEL>
         </td>
          <td>
            <input type="text" name="catnamenew">
          </td>
	</tr>
	<tr>
	  <td colspan="2"><input type="submit" value="Save Changes"></form></td>
       </tr>
     </table>
  </FIELDSET>
  <FIELDSET>
    <legend ACCESSKEY=I>Delete Category</legend>
    <table>
       <tr>
         <td>
            <LABEL>Category:</LABEL>
         </td>
	  <td>
	   <form action="manage_categories.php?action=del" method="POST">
	    <select name="catname">
	      <?php
		  $query=mysql_query("SELECT * FROM `categories`");
		   while ($row=mysql_fetch_array($query,MYSQL_ASSOC)) {
			echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
		   }
		?>
	    </select><input type="submit" value="Delete">
	   </form>
	  </td>
	</tr>
     </table>
  </FIELDSET>
<?php include "footer.php"; ?>