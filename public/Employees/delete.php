<?php

require_once('../../private/initialize.php');
$page_title = "Delete Employee";
if(!isset($_GET['id'])) {
    redirect('/index');
}
$id = $_GET['id'];

if(is_post_request()) {
    delete_employee_by_id($id);
} else {
    // Just finding the subject
    //$subject = find_subject_by_id($id);
    $employee = find_employee_by_id($id);
    if ($employee == "fail"){
	redirect('/index');
    }
}

?>

<?php include(SHARED_PATH . '/header.php'); ?>


<html>
    <?php
    $jumbotron_title = "Remove Employee";
    $jumbotron_subtext = "Are you sure you want to remove <strong><u>" . $employee->first_name . " " . $employee->last_name . "</u> </strong>?";
    include(SHARED_PATH . '/jumbotron.php');
    ?>

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
