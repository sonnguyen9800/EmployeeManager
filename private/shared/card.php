<?php $employee ?>

<div class="employee-card card bg-info">
    <!-- Each employee is contained in one card, this will hold all information of that employee -->

    <div class="card-header card-title text-center">
        Employment Id:
        <strong id="id"><?php echo $employee->id; ?></strong>        Name:
        <strong id="first_name"><?php echo $employee->first_name ?></strong>
        <strong id="last_name"><?php  echo $employee->last_name ?></strong> Gender:
        <strong id="gender"><?php echo $employee->gender ?></strong> Age
        <strong id="age"><?php echo $employee->age ?></strong>
    </div>
    <div class="card-body bg-light container ">
        <div class="text-center">	    
            <a href="<?php echo '/Employees/show?id=' . h(u($employee->id)) ?>"
	       class="btn btn-primary col-md-3 col-md-offset-1.5 ">Show</a>
	    <a href="<?php echo '/Employees/edit?id=' .h(u($employee->id)) ?>"
	       class="btn btn-warning col-md-3  ">Edit</a>
	    <a href="<?php echo '/Employees/delete?id=' . h(u($employee->id)); ?>"
	       class="btn btn-danger col-md-3 col-md-offset-1.5 ">Delete</a>
        </div>
    </div>
</div>
