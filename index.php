<?php
require_once('private/initialize.php');
$page_title = "Homepage";
if (!isset($_GET['status'])){
    $_GET['status'] = "None";
}
?>

<?php include(SHARED_PATH . '/header.php'); ?>

<?php
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
    }elseif($_GET['status'] == 'edit-failed'){
	include(SHARED_PATH . '/alert-edit-fail.php');
    }elseif($_GET['status'] == 'edit-success'){
	include(SHARED_PATH . '/alert-edit-success.php');
    }


    
    $jumbotron_title = "Welcome";
    $jumbotron_subtext = "Be the big boss and control your army!";
    include(SHARED_PATH . '/jumbotron.php') ; ?>

    
    <div class="container block ">
        <div class="h-10 row">
	    <!-- Search bar -->
            <div class="col-8" >
		<input  type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">	    
	    </div>
	    <!-- Gender selector -->
	    <div class="btn-toolbar col-4 justify-content-center align-items-center " data-toggle="buttons">
		<label class="btn btn-primary ml-1 "><input checked="checked" onclick="genderFilter()" type="radio" name="options" id="gender-default">Default</label>
				
		<label class="btn btn-primary ml-1 "><input onclick="genderFilter()"  type="radio" name="options" id="gender-male">Male</label>
		
		<label class="btn btn-primary ml-1 "> <input onclick="genderFilter()"  type="radio" name="options" id="gender-female">Female</label>
	    </div>
	</div>
    </div>
    
    <div class="main-body container border employee-card" id="myUL">
	<?php
	foreach ($all_employees as $i_employee){
	    $employee = $i_employee;
	    include(SHARED_PATH . '/card.php');	    
	}
	?>
    </div>
    
</html>

<script>
 function myFunction() {
     // Declare variables
     var input, filter, ul, li, a, i, txtValue;
     input = document.getElementById('myInput');
     filter = input.value.toUpperCase();     
     ul = document.getElementById("myUL");
     li = ul.getElementsByClassName('employee-card');
     /* console.log(li);*/
     // Loop through all list items, and hide those who don't match the search query
     for (i = 0; i < li.length; i++) {
	 console.log(li[i].getElementsByClassName("card-title"));
	 
	 a = li[i].getElementsByTagName("strong")[1];
	 b = li[i].getElementsByTagName("strong")[2];
	 /* a = li[i].getElementById("demo")*/
	 
	 // txtValue = a.textContent || a.innerText;
	 
	 txtValue = a.textContent + " "+ b.textContent;
	 console.log(txtValue);
	 
	 if (txtValue.toUpperCase().indexOf(filter) > -1) {
	     li[i].style.display = "";
	 } else {
	     li[i].style.display = "none";
	 }
     }
 }

 function genderFilter(){
     if (document.getElementById('gender-default').checked) {
	 gender_value = 'default';
     } else if (document.getElementById('gender-male').checked){
	 gender_value = 'Male';
     } else if (document.getElementById('gender-female').checked){
	 gender_value = 'Female' 
     }
     
     ul = document.getElementById("myUL");
     li = ul.getElementsByClassName('employee-card');
     /* console.log(li);*/
     // Loop through all list items, and hide those who don't match the search query
     for (i = 0; i < li.length; i++) {
//	 console.log(li[i].getElementsByClassName("card-title"));
	 
	 a = li[i].getElementsByTagName("strong")[3];	 
	 txtValue = a.textContent || a.innerText;
	 console.log("Txtvalue: " + txtValue);
	 
	 if (txtValue == gender_value || gender_value == 'default' ) {
	     li[i].style.display = "";
	 } else {
	     li[i].style.display = "none";
	 }
     }

 }
</script>


<?php  include(SHARED_PATH . '/footer.php'); ?>


