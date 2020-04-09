<?php
require_once('private/initialize.php');
$page_title = "Extra";
?>

<?php include(SHARED_PATH. '/header.php'); ?>
<?php $all_employees = show_all_employees(); ?>


<html>

    $jumbotron_title = "Welcome";
    $jumbotron_subtext = "See the frequency of employee here!";
    include(SHARED_PATH.'/jumbotron.php');
    ?>
    <div class = "main-body container border employee-card" id = "myUL" >
	<?php 
	foreach($all_employees as $i_employee) {
            $employee = $i_employee;
            include(SHARED_PATH.'/card.php');
	} ?>
    </div>

</html>

<script > 

 
</script>


<?php include(SHARED_PATH. '/footer.php'); ?>
