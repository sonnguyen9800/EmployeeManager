<?php 
session_start();
require_once 'php/google-api-php-client/vendor/autoload.php';
?>

<?php
require_once('private/initialize.php');
$page_title = "Extra";
?>

<?php include(SHARED_PATH. '/header.php'); ?>
<?php $all_employees = show_all_employees();

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
		      .$i_employee->first_name.
                       "' and Year=2012;");
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
		      .$i_employee->last_name.
                       "' and Year=2012;");
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
    $jumbotron_subtext = "See the frequency of the name";
    include(SHARED_PATH.'/jumbotron.php');
    ?>

<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Dropdown button
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
  </div>
</div>





    <table class="table main-body container">
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

</html>


<?php include(SHARED_PATH. '/footer.php'); ?>
