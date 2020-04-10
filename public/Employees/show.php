<?php
// Standard initialize
require_once('../../private/initialize.php');
$page_title = "Show Employee";
if(!isset($_GET['id'])) {
    redirect('/Assignment1/index.php');
}

// Find the employee by id
$id = $_GET['id'];
$employee = find_employee_by_id($id);
?>

<?php
// Include the header
include(SHARED_PATH . '/header.php'); ?>


<html>
    <?php
    // Make the jumbotron
    $jumbotron_subtext = "Employee id" . $employee->id;
    $jumbotron_title = "<strong><u>" . $employee->first_name . " " . $employee->last_name . "</u> </strong>";
    include(SHARED_PATH . '/jumbotron.php');
    ?>

    <!-- Main body showing the employee data -->

    <div class="main-body container">
	<div class="card" style="">
            <div class="card-body  ">
		<div class="row">
		    <h5 class="card-title col">First Name: <?php echo $employee->first_name;  ?></h5>
		    <h5 class="card-text col">Last Name: <?php echo $employee->last_name ?></h5>            	    
		</div>
		

		<div class="row">
		    <h5 class="card-title col">Age: <?php echo $employee->age;  ?></h5>
		    <h5 class="card-text col">Gender: <?php echo $employee->gender ?></h5>
            	    
		</div>
		<div class="row">
		    <h5 class="card-text col">Address: <?php echo $employee->address ?></h5>
		    <h5 class="card-text col">Phone Number: <?php echo $employee->phone_number ?></h5>	
	    </div>
            
            </div>
	</div>
    </div>
    
</html>


<?php include(SHARED_PATH . '/footer.php'); ?>
