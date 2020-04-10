<?php $employee ?>

<tr>
<th scope="row"><?php echo $employee->id; ?></th>
<td><?php echo $employee->first_name ?></td>
<td><?php print_r($employee->first_name_freq) ?></td>
<td><?php echo $employee->last_name ?></td>
<td><?php print_r($employee->last_name_freq) ?></td>
</tr>
