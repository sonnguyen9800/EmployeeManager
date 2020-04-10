<?php
// Simple initialize
require_once('../../private/initialize.php');

if(!isset($_GET['id'])) {
    redirect('/Assignment1/index.php');
}

$id = $_GET['id'];

// Check if post request is sent to this page
if(is_post_request()) {
    // Handle form values sent by new.php
    $id = $id;
    $first_name = $_POST['first_name'] ;
    $last_name = $_POST['last_name'] ;
    $gender = $_POST['gender'] ;
    $age = $_POST['age'] ;
    $address = $_POST['address'] ;
    $phone_number = $_POST['phone_number'] ;

    $employee_array = array("id" => $id, "first_name" => $first_name,"last_name" => $last_name,
                      "gender"=> $gender, "age" => $age, "address" => $address,  "phone_number"=> $phone_number);

    edit_employee_by_id($id, $employee_array);
} else {
    $employee = find_employee_by_id($id);
}

?>

<?php
// Set page title and include the header
$page_title = 'Edit Employee'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="content">
    <?php

    // As usual, we set the parameters for the jumbotron
    $jumbotron_title = "Employee";
    $jumbotron_subtext = "Edit employee id " . $employee->id;
    include(SHARED_PATH . '/jumbotron.php');
    ?>

    <!-- A form to edit -->
    <div class="main-body container">
	<!-- "<?php// echo "/Assignment1/public/Employees/edit.php?id=" . h(u($employee->id));  ?>" -->

	<form action="<?php echo "/Employees/edit?id=" . h(u($employee->id));  ?>" method="POST" >	    
	    <div class="form-group">
		<label for="first_name">First Name</label>
		<input name="first_name" type="text" class="form-control" id="first_name" value="<?php echo $employee->first_name; ?>">
	    </div>

	    
	    <div class="form-group">
		<label for="last_name">Last Name</label>
		<input name="last_name" type="text" class="form-control" id="last_name" value="<?php echo $employee->last_name; ?>">
	    </div>

            <div class="row">
		<div class="form-group col-md-2">
		    <label for="gender">Gender</label>
		    <select name="gender"  class="form-control" id="gender" value="<?php echo $employee->gender; ?>">
			<option>Male</option>
			<option>Female</option>
		    </select>
		</div>


		<div class="form-group col-md-2">
		    <label for="age">Age</label>
		    <input type="number" name="age" class="form-control" id="age" value="<?php echo $employee->age; ?>">
		</div>

		<div class="form-group col-md-5">
		    <label for="address">Address</label>
		    <input type="text" name="address" class="form-control" id="address" value="<?php echo $employee->address; ?>">
		</div>
		
		<div class="form-group col-md-3">
		    <label for="phone_number">Phone Number</label>
		    <input type="text" name="phone_number" class="form-control" id="phone_number" value="<?php echo $employee->phone_number; ?>">
		</div>
	    </div>
	    
	    <button type="submit" class="btn btn-primary btn-block">Submit</button>
	</form>

    </div>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
