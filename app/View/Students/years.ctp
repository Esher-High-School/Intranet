<?php /*
<h1>Search for a student</h1>
<div id="search">
	<form id="orderform" action="<?php echo $Html->url('/cake/students/search'); ?>" method="post" enctype="multipart/formdata">
		<label for="searchstudent">Search Students:</label>
		<input type="text" name="searchstudent">
		Search by:
		<input type="radio" name="searchtype" value="Student.surname" checked> Surname
		<input type="radio" name="searchtype" value="Student.forename"> Forename
		<input type="radio" name="searchtype" value="Student.upn"> UPN
		<input type="radio" name="searchtype" value="Student.adno"> Admissions Number
		<input type="radio" name="searchtype" value="Student.postcode"> Postcode
		<input type="radio" name="searchtype" value="Student.form"> Form Group
	<?php echo $form->end('Search'); ?>
</div> 

*/
?>
<p>Please select a year group for a list of students.</p>
<ul>
	<li><?php echo $this->Html->link('Year 7', array('action' => 'index', 7)); ?></li>
	<li><?php echo $this->Html->link('Year 8', array('action' => 'index', 8)); ?></li>
	<li><?php echo $this->Html->link('Year 9', array('action' => 'index', 9)); ?></li>
	<li><?php echo $this->Html->link('Year 10', array('action' => 'index', 10)); ?></li>
	<li><?php echo $this->Html->link('Year 11', array('action' => 'index', 11)); ?></li>
</ul> 