<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>EHS Staff Handbook Mangment</title>
<style type="text/css">
<!--
body {
	background-color: #82BDFF;
}
.style1 {color: #FFFFFF}
.style2 {color: #000000}

.style3:link {color: #FFFFFF; text-decoration: none; }
.style3:visited {color: #FFFFFF; text-decoration: none; }
.style3:active {color: #FFFFFF; text-decoration: none; }
.style3:hover {color: #FFFFFF; text-decoration: underline; }
-->
</style></head>
<SCRIPT LANGUAGE="JavaScript" SRC="../../includes/CalendarPopup.js"></SCRIPT>
<script>
<!-- Begin
function popUp(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=800,height=300,left = 240,top = 362');");
}

var cal = new CalendarPopup();


function verifyNewDoc()
{
	if(document.adddoc.fileupload.value == "") {
		alert("Please select a file to upload first!");
		return false;
	}
	if(document.adddoc.fileupload.value.length < 5) {
		alert("Invalid filename. Must contain proper extension.");
		return false;
	}
	if(document.adddoc.fileupload.value.search(/\.(pdf)$/) == -1) {
		alert("You are only allowed to upload PDF files!");
		return false;
	}
	if(document.adddoc.name.value == "") {
		alert("Please enter a document name!");
		return false;
	}
	if(document.adddoc.reviewdate.value == "") {
		alert("Please enter a review name!");
		return false;
	}
	document.adddoc.submit();
	return true;
}

 // End -->
</script>



<body><div align="center">
<table width="800" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="80"><a href="index.php"><img src="header.png" width="800" height="80" border="0"></a></td>
  </tr>
<?php if (is_admin()=="1" or is_pub()=="1") { ?>
  <tr>
    <td height="21" bgcolor="#FFFFFF"><table width="801" border="0">
      <tr bgcolor="#0099FF">
  <?php if (is_admin()=="1") { ?><td width="149" height="33"><div align="center" class="style1"><a href="manage_categories.php" class="style3">Manage Categories</div></td> <? } ?>
        <td width="162"><div align="center" class="style1"><a href="manage_documents.php" class="style3">Manage Documents </div></td>
        <td width="173"><div align="center" class="style1"><a href="review_documents.php" class="style3">Review Documents </div></td>
        <td width="165"><div align="center" class="style1"><a href="view_stats.php" class="style3">Statistics</div></td>
   <?php if (is_admin()=="1") { ?><td width="151"><div align="center" class="style1"><a href="manage_access.php" class="style3">Manage User Access </div></td><? } ?>
      </tr>
    </table></td>
  </tr>
<?php } ?>
  <tr>
    <td height="306" bgcolor="#FFFFFF" valign="top" align="center">
	<table width="701" align="left" valign="top"><tr  align="left"><td>