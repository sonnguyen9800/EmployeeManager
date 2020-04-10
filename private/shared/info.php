<?php $employee ?>

<div class="employee-card card bg-info">
    <!-- Dont remember why i have this pieces of code. But i don't have time to check so just leave it there' -->
    <div class="card-header card-title text-center">
        Employment Id:
        <strong>
            <?php echo $employee->id; ?>
        </strong>
        Name:
        <strong>
            <?php echo $employee->first_name . " " .$employee->last_name ?>
        </strong>
    </div>
    <div class="card-body bg-light container ">
        <div class="text-center">
	    
            <a href="<?php echo '/Assignment1/public/Employees/show.php?id=' . h(u($employee->id)) ?>"
	       class="btn btn-primary col-md-3 col-md-offset-1.5 ">Show</a>
            <a href="#"
	       class="btn btn-warning col-md-3  ">Edit</a>
            <a href="<?php echo '/Assignment1/public/Employees/delete.php?id=' . h(u($employee->id)); ?>"
	       class="btn btn-danger col-md-3 col-md-offset-1.5 ">Delete</a>
        </div>
    </div>
</div>
