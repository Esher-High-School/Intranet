<h3>Tutors</h3>

<?php foreach ($tutors as $tutors2): ?>
<h4>Year <?php echo $tutors2['Year']; ?> Tutors</h4>
<table class="table table-striped table-hover table-condensed">
        <thead>
                <th>Name</th>
                <th>Form</th>
                <th>Username</th>
                <th>
                        <?php echo $this->Html->Link('Add', array('action' => 'add'), array('class' => 'btn btn-primary btn-mini')); ?>
                </th>
        </thead>
        <tbody>
                <?php foreach ($tutors2 as $tutor): ?>
                        <tr>
                                <td width="60%"><?php echo $tutor['Tutor']['name']; ?></td>
                                <td width="10%"><?php echo $this->Html->Link($tutor['Tutor']['form'], array('action' => 'group', $tutor['Tutor']['id'])); ?></td>
                                <td width="20%"><?php echo $tutor['Tutor']['username']; ?></td>
                                <td>
                                        <?php
                                        echo $this->Html->Link('<i class="icon-pencil black"></i>', array('action' => 'edit', $tutor['Tutor']['id']), array('escape' => false));
                                        echo $this->Form->postLink('<i class="icon-remove black"></i>', array('action' => 'delete', $tutor['Tutor']['id']), array('escape' => false), 'Are you sure you want to delete ' . $tutor['Tutor']['name'] . '?');
                                        ?>
                                </td>
                        </tr>
                <?php endforeach; ?>
        </tbody>
</table>
<?php endforeach; ?>
