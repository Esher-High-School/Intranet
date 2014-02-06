<?php echo $this->Form->create('IncidentMonitor', array('action' => 'add', 'class' => 'form-horizontal')); ?>
	<?php echo $this->Form->input('upn', array('value' => $upn, 'type' => 'hidden')); ?>
	<?php if (isset($User['User'])): ?>
		<div class="form-group">
			<label class="col-md-2 control-label" for="inputUsername">Username</label>
			<div class="col-md-10">
				<?php 
				echo $this->Form->input('username', array('label' => false, 'value' => $username, 'class' => 'form-control')); 
				?>
			</div>
		</div>
	<?php else: ?>
		<?php echo $this->Form->input('username', array('type' => 'hidden', 'value' => $username)); ?>
	<?php endif; ?>
	<div class="form-group">
		<label class="col-md-2 control-label" for="inputStudent">Student Name</label>
		<div class="col-md-10">
			<input type="text" id="inputStudent" class="form-control" value="<?php echo ($student['Student']['forename'] . ' ' . $student['Student']['surname']); ?>" disabled></input> 
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-2 control-label" for="inputForm">Student Form</label>
		<div class="col-md-10">
			<input type="text" id="inputForm" class="form-control" value="<?php echo $student['Student']['form']; ?>" disabled></input>
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-2 control-label" for="inputStartDate">Start Date</label>
		<div class="col-md-10">
			<?php
			echo $this->Form->input('dateadded', array('label' => false, 'class' => 'form-control', 'value' => date('Y-m-d'), 'id' => 'inputStartDate')); ?>
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-2 control-label" for="inputEndDate">End Date</label>
		<div class="col-md-10">
			<?php
			$date = strtotime("+14 day", strtotime(date('Y-m-d')));
			echo $this->Form->input('enddate', array('label' => false, 'class' => 'form-control', 'value' => date('Y-m-d', $date), 'id' => 'inputEndDate'));
			?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-10 col-md-offset-2">
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
	</div>
<?php echo $this->Form->end(); ?>