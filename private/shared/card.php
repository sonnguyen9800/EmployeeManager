<?php $employee ?>

<div class="employee-card card bg-info">
    <div class="card-header card-title">
	Id:
        <strong>
	    <?php echo $employee->id; ?>
	</strong>
	Name:
	<strong>
	    <?php echo $employee->first_name . " " .$employee->last_name ?>
	</strong>
    </div>
    <div class="card-body bg-light">
	<a href="#" class="btn btn-primary">Show</a>
	<a href="#" class="btn btn-warning">Edit</a>
	<a href="<?php echo '/Assignment1/public/Employees/delete.php?id=' . h(u($employee->id)); ?>"  class="btn btn-danger">Delete</a>
    </div>
</div>
