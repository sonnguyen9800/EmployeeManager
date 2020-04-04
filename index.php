<?php
require_once('private/initialize.php');
$page_title = "Manager";
?>

<?php include(SHARED_PATH . '/header.php'); ?>

<?php
/* $file = fopen('/', 'r');*/
/* $s = file_get_contents('gs://assignment1-cloudcomputing.appspot.com/Employees.csv');
 * echo $s;*/
db_connect();
?>


<html>


    <?php include(SHARED_PATH . '/jumbotron.php') ; ?>

    <div class="main-body container border">
	<?php include(SHARED_PATH . '/card.php') ?>
	<?php include(SHARED_PATH . '/card.php') ?>
	<?php include(SHARED_PATH . '/card.php') ?>
	<?php include(SHARED_PATH . '/card.php') ?>
	
    </div>

</html>


<?php  include(SHARED_PATH . '/footer.php'); ?>
