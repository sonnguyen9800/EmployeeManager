<?php
// Simple initialize
require_once('../../private/initialize.php');
$page_title = "Delete Employee";
if(!isset($_GET['id'])) {
    redirect('/index');
}
$id = $_GET['id'];

// If that is a post request-> perform the deletion
if(is_post_request()) {
    delete_employee_by_id($id);
} else {   
    // Just finding the employee if no post request is sent   
    $employee = find_employee_by_id($id);

    // redirect
    if ($employee == "fail"){
	redirect('/index');
    }
}

?>

<?php
// As usual -> one header is added
include(SHARED_PATH . '/header.php'); ?>


<html>
    <?php
    // As usual, setting attributes for the jumbotron
    $jumbotron_title = "Remove Employee";
    $jumbotron_subtext = "Are you sure you want to remove <strong><u>" . $employee->first_name . " " . $employee->last_name . "</u> </strong>?";
    include(SHARED_PATH . '/jumbotron.php');
    ?>

    <!-- Simple button to send the request.  -->
    <div class="main-body container">	
	<form action="<?php echo '/Employees/delete?id=' . h(u($employee->id)); ?>" method="post">
	    <div id="operations">
		<input class="btn btn-primary btn-block" type="submit" name="commit"
		       value="<?php echo "Remove '" . $employee->first_name . " ". $employee->last_name . "'"; ?>" />
	    </div>
	</form>	
    </div>

</html>


<?php include(SHARED_PATH . '/footer.php'); ?>
