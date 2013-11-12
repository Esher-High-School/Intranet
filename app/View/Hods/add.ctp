<?php echo $this->Form->create('Hod', array('class' => 'form-horizontal', 'action' => 'add')); ?>
	<div class="form-group">
		<label class="col-lg-3 control-label" for="Username">
			Username
		</label>
		<div class="col-lg-9">
			<?php echo $this->Form->input('username',
				array(
					'label' => false,
					'class' => 'form-control'
				)
			); ?>
		</div>
	</div>

	<div class="form-group">
		<label class="col-lg-3 control-label" for="Department">
			Department
		</label>
		<div class="col-lg-9">
			<select name="data[Hod][dept]" class="form-control">
				<?php foreach($subjects as $subject): ?>
					<option value="<?php echo $subject['Subject']['name']; ?>">
						<?php echo $subject['Subject']['name']; ?>
					</option>
				<?php endforeach; ?>
			</select>
		</div>
	</div>

	<div class="form-group">
		<div class="col-lg-9 col-lg-offset-3">
			<?php echo $this->Form->button('Save HoD', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>
		</div>
	</div>
<?php echo $this->Form->end(); ?>