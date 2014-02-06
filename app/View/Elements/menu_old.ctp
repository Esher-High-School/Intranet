<?php 
$hostname_intranet = "localhost";
$database_intranet = "intranet";
$username_intranet = "root";
$password_intranet = "";
$intranet = mysql_pconnect($hostname_intranet, $username_intranet, $password_intranet) or trigger_error(mysql_error(),E_USER_ERROR); 
@mysql_select_db($database_intranet, $intranet);
if (!isset($cake)) {
	$user=$_SERVER['REMOTE_USER'];
	require('config.php');
	if (@in_array($user, $admins)) {
		if (isset($_GET['user'])) {
			$user = $_GET['user'];	
		}
	}
}
$un=$user;
$extra = null;
function menu_item($item,$link,$status) {
	$extra = null;

	if ($status==1) { $extra=' <col-md- class="label label-important">New</col-md->'; }
	if ($status==2) { $extra=' <col-md- class="label label-warning">Updated</col-md->'; }

	echo '<li><a href="'.$link.'">'.$item.'</a>'.$extra.'</li>';   
}

// Main Menu Items
$query=mysql_query("SELECT * FROM `menu` ORDER BY `menu`");

$oldfl="a";

while ( $menuitem = mysql_fetch_array($query,MYSQL_ASSOC) ) { 
	$newfl=strtolower($menuitem['menu'][0]);
	if ($oldfl<>$newfl) { echo '</ul><hr><ul>'; }
	$oldfl=strtolower($menuitem['menu'][0]);

	menu_item(stripslashes($menuitem['menu']),stripslashes($menuitem['link']),$menuitem['status']);
}

// Incident Reporting
$result = @mysql_query ("SELECT * FROM hoy WHERE username = '$un'");
$num = mysql_num_rows ($result);

if ($num > 0) {
$extra=$extra. "<li><a href=\"/hoy.php?show=home\">My Year Group</a></li>";
}		

$result = @mysql_query ("SELECT * FROM smt WHERE username = '$un'"); 
$num = mysql_num_rows ($result);

if ($num > 0) {
$extra=$extra. '<li><a href="/smt.php?show=home">SMT Incident reporting</a></li>';
}

		
$result = @mysql_query ("SELECT * FROM tutors WHERE username = '$un'"); 

if (mysql_num_rows ($result) > 0) {
$extra=$extra. "<li><a href=\"/tutor_index.php\">My Form</a></li>";
}	

$result = @mysql_query ("SELECT * FROM hod WHERE username = '$un'"); 

if (mysql_num_rows ($result) > 0) {
$extra=$extra. "<li><a href=\"/hod.php?show=home\">My Dept.</a></li>";
}		


$result = @mysql_query ("SELECT * FROM incidentaccess WHERE username = '$un'"); 

if (mysql_num_rows ($result) > 0) {
$extra=$extra. "<li><a href=\"/go.php?show=emailme&year=&ord=\">Monitor Students</a></li>";
}
if ($extra<>"") {
	echo ('
	</ul>
	<hr>
	<p><strong>Incident Reporting</strong></p>
	<ul>
	'.$extra.'
	');
}		

menu_item("Incident Form","http://web.esherhigh.surrey.sch.uk/incident.php?show=incident&ord=surname&year=",0);

$irg_access="0";
$query=mysql_query("SELECT * FROM `incident_pdf_report_access` WHERE `username`='$un'");

$row = mysql_fetch_array($query,MYSQL_ASSOC);
if ($row['username']==$un) { $irg_access="1"; }

if ($irg_access=="1" | $user == 'shill') { menu_item("Incident Report Printout","http://web.esherhigh.surrey.sch.uk/AlexReportGenerateSelect.php",0); }

// CMS MANAGE 
$access="0";
	
$query=mysql_query("SELECT * FROM `cms_users` ORDER BY `user`");
while ( $users = mysql_fetch_array($query,MYSQL_ASSOC) ) { 
	if ($users['user']==$un) { $access=$users['authlevel']; }
}


if ($access=="1" or $access=="2") {
	echo '</ul><hr>';
	echo '<p><strong>Content Management</strong></p><ul>';
	
	menu_item("Manage Links","http://web.esherhigh.surrey.sch.uk/cake/cms/links",0);
	menu_item("Manage Pages","http://web.esherhigh.surrey.sch.uk/cake/cms/pages",0);
	menu_item("Manage Staff Bulletin","http://web.esherhigh.surrey.sch.uk/cake/cms/staffbulletins",1);
	menu_item("Manage Files","http://web.esherhigh.surrey.sch.uk/cake/cms/filemanager",2);
}

if ($access=="2") {
	menu_item("Manage Students", "http://web.esherhigh.surrey.sch.uk/cake/cms/students/", 1);
	menu_item("Manage Tutors", "http://web.esherhigh.surrey.sch.uk/cake/cms/tutors/", 1);
	menu_item("Manage HoYs", "http://web.esherhigh.surrey.sch.uk/cake/admin/hoy", 1);
	menu_item("Manage SMT Staff", "http://web.esherhigh.surrey.sch.uk/cake/admin/smt", 1);
	menu_item("Manage CMS Users","http://web.esherhigh.surrey.sch.uk/cake/admin/users" , 0);
//	menu_item("Manage SNOW!","http://web.esherhigh.surrey.sch.uk/manage_snow.php",0);
}

if ($access=="3") {
	echo '</ul><hr>';
	echo '<p><strong>Content Management</strong></p><ul>';
}

if ($access=="2" or $access=="3") { 
	menu_item("Thought For The Day Upload","http://web.esherhigh.surrey.sch.uk/tfd_upload.php",0); 
}

$hl_access="0";
$query=mysql_query("SELECT * FROM homelearn.subjects");
while ($row=mysql_fetch_array($query,MYSQL_ASSOC)) {
	$users=explode(",",$row['owner']);
	foreach($users as &$user) {
		if ($user==$un) { $hl_access="1"; }
	}
}
if ($hl_access=="1" or $access=="2") { 
	// menu_item("Manage Home Learning","http://web.esherhigh.surrey.sch.uk/manage_homelearn.php",0);
}



// Administrator Links
if ($access=="2") {
	echo '</ul><hr>';
	echo '<p><strong>Administrator Links</strong></p><ul>';
//	menu_item("System Status","http://web.esherhigh.surrey.sch.uk/ServerStatus.php",0);
	menu_item("NTOP: 2KServer","http://2kserver:3000",0);
	menu_item("NTOP: EHS-CC3-002","http://ehs-cc3-002:3000",0);
	menu_item("NTOP: EHS-WEB-SERVER","http://admin.web.esherhigh.surrey.sch.uk:3000",0);
	menu_item("Censornet","http://10.18.56.9/",0);
//	menu_item("Student Proxy Bulk Ban","http://10.18.56.9/site_filters/blacklist_edit.cgi",0);
//	menu_item("Staff Proxy","http://10.18.56.199/",0);
//	menu_item("Securus","http://10.18.57.254/",0);
	menu_item("Digital Signage","https://10.18.56.35/",0);
	menu_item("phpMyAdmin","http://admin.web.esherhigh.surrey.sch.uk/phpmyadmin/",0);
	menu_item("phpSysInfo", "http://admin.web.esherhigh.surrey.sch.uk/phpSysInfo/", 1);
	//	menu_item("Intranet Statistics","http://admin.web.esherhigh.surrey.sch.uk/webalizer/",0);
	menu_item('RM Management Console','https://ehs-cc3-001', 0);
	menu_item("Lansweeper: EHS-CC3-002","http://ehs-cc3-002:8086/lansweeper/",0);
//	menu_item("Help Desk Web Interface","http://10.18.56.70/SupportDesk6/Main.asp",0);
}
?>

<?php mysql_close(); ?>