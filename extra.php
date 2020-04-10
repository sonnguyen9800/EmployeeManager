<?php 
session_start();
require_once 'php/google-api-php-client/vendor/autoload.php';
?>

<?php
require_once('private/initialize.php');
$page_title = "Extra";
include(SHARED_PATH. '/header.php');
$year_id = '';
$str_query_time = "';";
$all_employees = show_all_employees();

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
$projectId = 'assignment1-cloudcomputing';
$request = new Google_Service_Bigquery_QueryRequest();
// Authentication ends

//Make Query
foreach($all_employees as $i_employee){
    $request->setQuery("#standardSQL \r\n SELECT SUM(Frequency) FROM `assignment1-cloudcomputing.assignment1.baby_name` WHERE Name='"
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
    
    $i_employee->first_name_freq=$str;

    $request->setQuery("#standardSQL \r\n SELECT SUM(Frequency) FROM `assignment1-cloudcomputing.assignment1.baby_name` WHERE Name='"
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
    $i_employee->last_name_freq=$str;       	

};

?>
<html>
    <?php
    $jumbotron_title = "Welcome";
    if ($year_id != ''){
	$jumbotron_subtext = "See the frequency of the name for the year" . $year_id;
    } else {
	$jumbotron_subtext = "See the frequency of the name in all time ";

    }
    include(SHARED_PATH.'/jumbotron.php');
    ?>

    <form action="<?php echo '/extra'?>" method="POST" class="main-body container">
        <div class="form-group">
	    <label for="exampleInputEmail1">Type the year</label>
	    <input type="number" class="form-control" id="inputYear"  placeholder="Enter the year" name="inputyear" value="<?php echo $year_id ?>">
	    <small id="yearHelp" class="form-text text-muted">Enter any year, e.g: 2012. Default is all year. Keep this input blank to make it default. </small>
	</div>
	<button type="submit" class="btn btn-primary">Query</button>
    </form>

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
