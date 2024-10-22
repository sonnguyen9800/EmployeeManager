<?php
// Standard initialize

require_once('../../private/initialize.php');
$page_title = "New Employee";
include(SHARED_PATH . '/header.php'); ?>


<html>
    <?php
    // Setting the jumbotron
    $jumbotron_title = "New Employee";
    $jumbotron_subtext = "Make a new Employee in simple way!";
    include(SHARED_PATH . '/jumbotron.php');
    ?>


    <!-- A form to create new employee -->
    <div class="main-body container">

	<?php // echo "/Assignment1/public/Employees/create.php"?>
	
	<form action= "<?php echo "/Employees/create"?>" method="POST" >
	    <div class="form-group">
		<label for="id">Identification Number (ID)</label>
		<input name="id" type="number" class="form-control" id="id">
	    </div>
	    
	    <div class="form-group">
		<label for="first_name">First Name</label>
		<input name="first_name" type="text" class="form-control" id="first_name">
	    </div>

	    
	    <div class="form-group">
		<label for="last_name">Last Name</label>
		<input name="last_name" type="text" class="form-control" id="last_name">
	    </div>

            <div class="row">
		<div class="form-group col-md-2">
		    <label for="gender">Gender</label>
		    <select name="gender"  class="form-control" id="gender">
			<option>Male</option>
			<option>Female</option>
		    </select>
		</div>


		<div class="form-group col-md-2">
		    <label for="age">Age</label>
		    <input type="number" name="age" class="form-control" id="age">
		</div>

		<div class="form-group col-md-5">
		    <label for="address">Address</label>
		    <input type="text" name="address" class="form-control" id="address">
		</div>
		
		<div class="form-group col-md-3">
		    <label for="phone_number">Phone Number</label>
		    <input type="text" name="phone_number" class="form-control" id="phone_number">
		</div>
	    </div>
	    
	    <button type="submit" class="btn btn-primary btn-block">Submit</button>
	</form>

    </div>
</html>

<?php  include(SHARED_PATH . '/footer.php'); ?>

