<h4>Select Year Group</h4>
<form method="post" class="form-horizontal">
        <div class="form-group">
                <label class="col-lg-3 control-label" for="inputStartdate">Start Date</label>
                <div class="col-lg-9">
                        <input type="text" name="startDate" id="inputStartdate" value="<?php echo $startdate; ?>">
                </div>
        </div>
        <div class="form-group">
                <label class="col-lg-3 control-label" for="inputEnddate">End Date</label>
                <div class="col-lg-9">
                        <input type="text" name="endDate" id="inputEnddate" value="<?php echo $enddate; ?>">
                </div>
        </div>
        <div class="form-group">
                <label class="col-lg-3 control-label" for="inputYear">Year Group</label>
                <div class="col-lg-9">
                        <select name="yearGroup">
                                <?php if ($posted == true) { ?>
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
                                <?php } ?>
                                <option value="any">All Years</option>
                                <option value="7">Year 7</option>
                                <option value="8">Year 8</option>
                                <option value="9">Year 9</option>
                                <option value="10">Year 10</option>
                                <option value="11">Year 11</option>
                        </select>
                </div>
        </div>
        <div class="form-group">
                <div class="col-lg-9">
                        <button type="submit" class="btn btn-primary">Filter</button>
                </div>
        </div>
</form>


<h4>Year <?php echo $year; ?></h4>
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
