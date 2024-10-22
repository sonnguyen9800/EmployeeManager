<?php
// Initialize important packages and function
session_start();
require_once 'php/google-api-php-client/vendor/autoload.php';
require_once('private/initialize.php');

// Set page title
$page_title = "Extra";

// Include the page name
include(SHARED_PATH. '/header.php');

// Initialize important variables
$year_id = '';
$str_query_time = "';"; // IMPORTANT String to query based on year

// Get all employees
$all_employees = show_all_employees();

// If post request -> make different query based on input by year.
//If the input is blank ('') then query by default (ALL YEAR ACCEPTED)
if(is_post_request()) {
    $year_id = $_POST['inputyear'];
    if ($year_id == ''){
        $str_query_time = "';";
    }else{
        $str_query_time = "' and Year=" . $year_id . ";";	
    }
} else {
    $str_query_time = "';";
}


// Authentication and initialize
$client = new Google_Client();
$client->useApplicationDefaultCredentials();
$client->addScope(Google_Service_Bigquery::BIGQUERY);
$bigquery = new Google_Service_Bigquery($client);


$projectId = ''; // ENTER THE PROJECT ID HERE
$tableID =''; // ENTER THE TABLE ID HERE

$request = new Google_Service_Bigquery_QueryRequest();
// Authentication ends

//Make Query
foreach($all_employees as $i_employee){
    // FIRST QUERY on FIRST NAME
    $request->setQuery("#standardSQL \r\n SELECT SUM(Frequency) FROM `". $projectId ."` WHERE Name='"
		      .$i_employee->first_name . $str_query_time );
    //Get the respone
    $response = $bigquery->jobs->query($projectId, $request);
    $rows = $response->getRows();
    $str='';

    foreach ($rows as $row){
        foreach ($row['f'] as $field){
            $str .= $field['v'] . " ";
        }        
    }
    // Assign the result to the object
    $i_employee->first_name_freq=$str;

    // SECOND QUERY ON LAST NAME
    $request->setQuery("#standardSQL \r\n SELECT SUM(Frequency) FROM `". $projectId ."` WHERE Name='"
		      .$i_employee->last_name . $str_query_time  );
    //Get the respone
    $response = $bigquery->jobs->query($projectId, $request);
    $str='';
    $rows = $response->getRows();

    foreach($rows as $row){
        foreach ($row['f'] as $field){
            $str .= $field['v'] . " "  ;
        }        
    }
    // This is a test function

    
    // Assign the result to the object
    $i_employee->last_name_freq=$str;       	

};

?>
<html>
    <?php
    // Set parameters for the jumbotron
    $jumbotron_title = "Welcome";
    if ($year_id != ''){
	$jumbotron_subtext = "See the frequency of the name for the year " . $year_id;
    } else {
	$jumbotron_subtext = "See the frequency of the name in all time ";

    }
    // Add jumbotron to the page
    include(SHARED_PATH.'/jumbotron.php');
    ?>

    <!-- // A submit form to enter the year -->
    <form action="<?php echo '/extra'?>" method="POST" class="main-body container">
        <div class="form-group">
	    <label for="exampleInputEmail1">Type the year</label>
	    <input type="number" class="form-control" id="inputYear"  placeholder="Enter the year" name="inputyear" value="<?php echo $year_id ?>">
	    <small id="yearHelp" class="form-text text-muted">Enter any year, e.g: 2012. Default is all year. Keep this input blank to make it default. </small>
	</div>
	<button type="submit" class="btn btn-primary">Query</button>
    </form>


    <!-- Main table to show frequency -->
    <div class="container">
	<table class="table main-body ">
	    <thead>
		<tr><th scope="col">ID</th>
		    <th scope="col">First Name</th>
		    <th scope="col">First Name Frequency</th>
		    <th scope="col">Last Name</th>
		    <th scope="col">Last Name Frequency</th>
		</tr>
	    </thead>
	    <tbody>
		<?php
		foreach($all_employees as $i_employee){
		    $employee = $i_employee;
		    include(SHARED_PATH. '/card-freq.php');
		}
		?>
	    </tbody>
	</table>

    </div>
    
</html>


<?php include(SHARED_PATH. '/footer.php'); ?>
