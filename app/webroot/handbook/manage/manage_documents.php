<?php
include "../connect.php";
include "../access.php";
require_pub_or_admin();
include "header.php"; 

if ($_GET['action']=="") {
} elseif ($_GET['action']=="add") {
	if ($_FILES["fileupload"]["error"]==UPLOAD_ERR_OK) {
		// FILE STUFF
		$filename=time().".pdf";
		rename($_FILES['fileupload']['tmp_name'],"D:/web.esherhigh.surrey.sch.uk/handbook/store/".$filename);

		// DB STUFF
		$parent=mysql_real_escape_string($_POST['parent']);
		$name=mysql_real_escape_string($_POST['name']);

		$upload_date=time();
		$temp=explode("-",$_POST['reviewdate']);
		$review=mktime(0,0,0,$temp['1'],$temp['0'],$temp['2']);
		$owner=mysql_real_escape_string($_SERVER['REMOTE_USER']);

		mysql_query("INSERT INTO `documents` (`id`, `parent`, `name`, `path`, `upload_date`, `review_date`, `owner`) VALUES (NULL, '$parent', '$name', '$filename', '$upload_date', '$review', '$owner');");
	
		echo '<script>alert("Your document was added. Please note it will not be visible to all staff untill a reviewer approves the document."); parent.tree.location.reload();</script>';
	} else {
		echo '<script>alert("Document upload fail! (ERROR CODE = '.$_FILES["fileupload"]["error"].' )");</script>';
	}
} elseif ($_GET['action']=="del") {
	$docid=mysql_real_escape_string($_POST['del_doc']);
	$info=mysql_fetch_array(mysql_query("SELECT * FROM `documents` WHERE `id`='$docid'"),MYSQL_ASSOC);
	if ($info['owner']==$_SERVER["REMOTE_USER"] or is_admin()=="1") {
		unlink('D:/web.esherhigh.surrey.sch.uk/handbook/store/'.$info['path']);
		mysql_query("DELETE FROM `documents` WHERE `id`='".mysql_real_escape_string($_POST['del_doc'])."'");
		echo '<script>alert("Document was deleted"); parent.tree.location.reload();</script>';
	} else {
		echo '<script>alert("Sorry but only `'.$info['owner'].'` or an administrator can delete the document."); </script>';
	}
}
?>


<h3>Manage Documents</h3>
   <FIELDSET>
    <legend ACCESSKEY=I>Add Document</legend>
    <table>
       <tr>
         <td>
            <LABEL>Category:</LABEL>
         </td>
	  <td>
	<form action="manage_documents.php?action=add" method="POST" name="adddoc" enctype="multipart/form-data">
	    <select name="parent">
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
            <LABEL>Document Name:</LABEL>
         </td>
          <td>
            <input type="text" name="name">
          </td>
	</tr>
	<tr>
         <td>
            <LABEL>File Upload:</LABEL>
         </td>
          <td>
	     <input type="hidden" name="MAX_FILE_SIZE" value="100000000">
            <input type="file" name="fileupload">
          </td>
	</tr>
	<tr>
         <td>
            <LABEL>Owner:</LABEL>
         </td>
          <td>
            <input type="text" name="owner" value="<? echo $_SERVER['REMOTE_USER']; ?>" disabled>
          </td>
	</tr>
	<tr>
         <td>
            <LABEL>Upload Date:</LABEL>
         </td>
          <td>
            <input type="text" name="date" value="<? echo date("d-m-Y"); ?>" disabled>
          </td>
	</tr>
	<tr>
         <td>
            <LABEL>Review Date:</LABEL>
         </td>
          <td>
            <input type="text" name="reviewdate" value="<? echo date("d-m-").(date("Y")+1); ?>" readonly>&nbsp;<A HREF="#" onClick="cal.select(document.forms['adddoc'].reviewdate,'anchor1','dd-MM-yyyy'); return false;" NAME="anchor1" ID="anchor1">Select</A>

          </td>
	</tr>
	<tr>
	  <td colspan="2"><input type="button" value="Add Document" onClick="javascript:verifyNewDoc()"></form></td>
       </tr>
     </table>
  </FIELDSET>
  <FIELDSET>
    <legend ACCESSKEY=I>Delete Document</legend>
    <table>
       <tr>
         <td>
            <LABEL>Category:</LABEL>
         </td>
	  <td>
	   <form action="manage_documents.php?action=del" method="POST">
	    <select name="del_doc">
	      <?php
		  $query=mysql_query("SELECT * FROM `categories`");
		   while ($row=mysql_fetch_array($query,MYSQL_ASSOC)) {
			$dquery=mysql_query("SELECT * FROM `documents` WHERE `parent`='".$row['id']."'");
			while ($d_row=mysql_fetch_array($dquery,MYSQL_ASSOC)) {
				echo '<option value="'.$d_row['id'].'">'.$row['name']." / ".$d_row['name'].'</option>';
			}
		   }
		?>
	    </select><input type="submit" value="Delete"></form>
	  </td>
	</tr>
     </table>
  </FIELDSET>
<?php include "footer.php"; ?>