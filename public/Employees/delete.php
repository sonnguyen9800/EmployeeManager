<?php

require_once('../../private/initialize.php');
$page_title = "Delete Employee";
if(!isset($_GET['id'])) {
    redirect('/Assignment1/index.php');
}
$id = $_GET['id'];

if(is_post_request()) {
    delete_employee_by_id($id);
    //Delete the record from csv file
    // $result = delete_subject($id);
    //redirect_to(url_for('/staff/subjects/index.php'));
} else {
    // Just finding the subject
    //$subject = find_subject_by_id($id);
    $employee = find_employee_by_id($id);
    if ($employee == "fail"){
	redirect('/Assignment1/index.php');
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
	
	<form action="<?php echo '/Assignment1/public/Employees/delete.php?id=' . h(u($employee->id)); ?>" method="post">
	    <div id="operations">
		<input class="btn btn-primary btn-block" type="submit" name="commit"
		       value="<?php echo "Remove '" . $employee->first_name . " ". $employee->last_name . "'"; ?>" />
	    </div>
	</form>
	

    </div>

</html>


<?php include(SHARED_PATH . '/footer.php'); ?>
