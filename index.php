<?php
require_once('private/initialize.php');
$page_title = "Homepage";
if (!isset($_GET['status'])) {
    $_GET['status'] = "None";
}
// Include the header
include(SHARED_PATH. '/header.php');
// Get all Employees
$all_employees = show_all_employees();
?>


<html>
    <?php
    //Check params status to show alert bar after user delete, add, edit any employee
    
    if ($_GET['status'] == 'success') {
	include(SHARED_PATH.'/alert-success.php');
    }elseif($_GET['status'] == 'failed') {
	include(SHARED_PATH. '/alert-failed.php');
    }elseif($_GET['status'] == 'delete') {
	include(SHARED_PATH. '/alert-deletedone.php');
    } elseif($_GET['status'] == 'edit-failed') {
	include(SHARED_PATH. '/alert-edit-fail.php');
    } elseif($_GET['status'] == 'edit-success') {
	include(SHARED_PATH.'/alert-edit-success.php');
    }

    // Set some variables for the jumbotron
    $jumbotron_title = "Welcome";
    $jumbotron_subtext = "Be the big boss and control your army!";
    include(SHARED_PATH.'/jumbotron.php');

    // Include the filter bar to search, filter employee
    include(SHARED_PATH.'/filter.php');
    ?>
    
    <!-- List of all employees -->
    <div class = "main-body container border employee-card" id = "myUL" >
    <?php 
    foreach($all_employees as $i_employee) {
        $employee = $i_employee;
        include(SHARED_PATH.'/card.php');
    } ?>
    </div>

</html>

<script >
 // function to filter
 function filter() {
    /* get the gender*/
     if (document.getElementById('gender-default').checked) {
         gender_value = 'default';
     } else if (document.getElementById('gender-male').checked) {
         gender_value = 'Male';
     } else if (document.getElementById('gender-female').checked) {
         gender_value = 'Female'
     }
     
     //get the name input:
     var name_input, name_filter;
     name_input = document.getElementById('myInput');
     name_filter = name_input.value.toUpperCase();
     
     //get the age 
     var age_input, age_filter;
     age_input = document.getElementById('ageInput');
     age_filter = age_input.value.toUpperCase();

     //get all necessary DOM element
     var ul, li ;     
     ul = document.getElementById("myUL");
     li = ul.getElementsByClassName('employee-card');

     
     // Loop through all list items, and hide those who don't match the search query
     for (i = 0; i < li.length; i++) {
	 // Get data
         first_name_data = li[i].getElementsByTagName("strong")[1];
         last_name_data = li[i].getElementsByTagName("strong")[2];
         age_data = li[i].getElementsByTagName("strong")[4];
         gender_data = li[i].getElementsByTagName("strong")[3];

	 // Process from raw data
         nameInput = first_name_data.textContent + " " + last_name_data.textContent;
         ageInput = age_data.textContent;
	 genderInput = gender_data.textContent;
	 
         //Analyze data and make decision
         if (nameInput.toUpperCase().indexOf(name_filter) > -1 && 
	     ageInput.toUpperCase().indexOf(age_filter) > -1 &&
	     (genderInput == gender_value || gender_value == 'default')) {
             li[i].style.display = "";
         } else {
             li[i].style.display = "none";
         }
     }
 }
 
</script>


<?php include(SHARED_PATH. '/footer.php'); ?>
