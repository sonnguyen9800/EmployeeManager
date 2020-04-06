<?php
require_once('../../private/initialize.php');
$page_title = "Manager";
?>

<?php include(SHARED_PATH . '/header.php'); ?>

<?php
/* $file = fopen('/', 'r');*/
/* $s = file_get_contents('gs://assignment1-cloudcomputing.appspot.com/Employees.csv');
 * echo $s;*/
$all_employees = show_all_employees();
?>


<html>


    <?php include(SHARED_PATH . '/jumbotron.php') ; ?>

    <div class="main-body container border">
        <h1>Your Employees here</h1>
	<?php
	$count = 0;
	foreach ($all_employees as $i_employee){
	    $employee = $i_employee;
	    if ($count != 0){
		include(SHARED_PATH . '/card.php');
	    }
	    $count +=1;
	}
	?>
	

	
    </div>

</html>


<?php  include(SHARED_PATH . '/footer.php'); ?>
