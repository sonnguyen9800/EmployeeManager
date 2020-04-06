<?php
require_once('private/initialize.php');
$page_title = "Homepage";
if (!isset($_GET['status'])){
    $_GET['status'] = "None";
}
?>

<?php include(SHARED_PATH . '/header.php'); ?>

<?php
/* $file = fopen('/', 'r');*/
/* $s = file_get_contents('gs://assignment1-cloudcomputing.appspot.com/Employees.csv');
 * echo $s;*/


$all_employees = show_all_employees();
?>


<html>
    <?php
    if( $_GET['status'] == 'success'){
        include(SHARED_PATH . '/alert-success.php');
    }elseif($_GET['status'] == 'failed'){
        include(SHARED_PATH . '/alert-failed.php');
    }elseif($_GET['status'] == 'delete'){
        include(SHARED_PATH . '/alert-deletedone.php');
    }


    
    $jumbotron_title = "Welcome";
    $jumbotron_subtext = "Be the big boss and control your army!";
    include(SHARED_PATH . '/jumbotron.php') ; ?>
    
    <div class="main-body container border">
	<?php
	//$count = 0;
	foreach ($all_employees as $i_employee){
	    $employee = $i_employee;
	    include(SHARED_PATH . '/card.php');
	    
	}
	?>



    </div>
</html>


<?php  include(SHARED_PATH . '/footer.php'); ?>


