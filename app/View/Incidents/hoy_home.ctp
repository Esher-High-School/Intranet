<h4>Select Dates &amp; Year Group</h4>
<form method="post" class="form-horizontal">
        <div class="form-group">
                <label class="col-md-2 control-label" for="inputStartdate">Start Date</label>
                <div class="col-md-10">
                        <input type="text" name="startDate" id="inputStartdate" value="<?php echo $startdate; ?>" class="form-control">
                </div>
        </div>
        <div class="form-group">
                <label class="col-md-2 control-label" for="inputEnddate">End Date</label>
                <div class="col-md-10">
                        <input type="text" name="endDate" id="inputEnddate" value="<?php echo $enddate; ?>" class="form-control">
                </div>
        </div>
        <div class="form-group">
                <label class="col-md-2 control-label" for="inputYear">Year Group</label>
                <div class="col-md-10">
                        <select name="yearGroup" class="form-control">
                                <?php if ($posted == true): ?>
                                  <option value="<?php echo $year; ?>">
                                          <?php
                                                  if (is_numeric($year)) {
                                                          echo ('Year ' . $year);
                                                  } elseif($year == 'any') {
                                                          echo ('All Years');
                                                  } else {
                                                          echo ($year);
                                                  }
                                          ?>
                                  </option>
                                <?php endif; ?>
                                <?php if ($smt): ?>
                                  <option value="any">All Years</option>
                                  <option value="7">Year 7</option>
                                  <option value="8">Year 8</option>
                                  <option value="9">Year 9</option>
                                  <option value="10">Year 10</option>
                                  <option value="11">Year 11</option>
                                <?php else: ?>
                                    <?php foreach($hoy as $hoy): ?>
                                      <option value="<?php echo $hoy['Hoy']['year']; ?>">
                                        <?php echo $hoy['Hoy']['year']; ?>
                                      </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                        </select>
                </div>
        </div>
        <div class="form-group">
                <div class="col-md-10 col-md-offset-2">
                        <button type="submit" class="btn btn-primary">Filter</button>
                </div>
        </div>
</form>

<?php if ($year !== 'any'): ?>
        <h4>Year <?php echo $year; ?></h4>
<?php else: ?>
        <h4>Any Year</h4>
<?php endif; ?>
<table class="table table-striped table-hover table-condensed">
	<thead>
		<th>&nbsp;</th>
		<th>Student Name</th>
		<th>Form</th>
		<th>Number of incidents</th>
	</thead>
	<tbody>
		<?php foreach ($incidents as $student): ?>
			<tr>
				<td width="5%">
					<?php echo $this->Html->Link('View', array('controller' => 'incidents', 'action' => 'student', $student['incident']['upn']), array('class' => 'btn btn-xs btn-success')); ?>
				</td>
				<td width="60%">
					<?php
					echo (
						$student['students']['forename'] . ' ' .
						$student['students']['surname']
					);
					?>
				</td>
				<td width="1%">
					<?php echo $student['students']['form']; ?>
				</td>
				<td>
					<?php echo $student[0]['Number']; ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>

</table>
