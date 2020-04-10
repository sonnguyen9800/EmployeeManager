<?php 
session_start();
require_once 'php/google-api-php-client/vendor/autoload.php';
use Google\Cloud\BigQuery\BigQueryClient;

?>
<!DOCTYPE html>
<html>
    <head>
	<title>Big Query Test</title>
	<meta charset='UTF-8'>
	
	<link href='https://fonts.googleapis.com/css?family=Cabin' rel='stylesheet' type='text/css'>
	<link rel='stylesheet' type='text/css' href='/stylesheets'>
    </head>
    <body>
	<div id='header'>
	    Big Query Result
	</div>
	
	<div class='content'>
	    <?php
	    //Authenticate
	    $client = new Google_Client();
	    $client->useApplicationDefaultCredentials();
	    $client->addScope(Google_Service_Bigquery::BIGQUERY);
	    
	    $bigquery = new Google_Service_Bigquery($client);
	    
	    $projectId = 'assignment1-cloudcomputing';

	    $request = new Google_Service_Bigquery_QueryRequest();
	    $str = '';
	    
	    $request->setQuery("#standardSQL \r\n SELECT * FROM `assignment1-cloudcomputing.assignment1.baby_name` LIMIT 10;");
	    // $request->setQuery("SELECT * FROM 'bigquery-public-data.usa_names.usa_1910_2013' LIMIT 10");

	    $response = $bigquery->jobs->query($projectId, $request);
	    $rows = $response->getRows();

	    $str = "<table>".
		   "<tr>" .
		   "<th>Name</th>" .
		   "<th>Gender</th>" .
		   "<th>Count</th>" .
		   "<th>Year</th>" .
		   "</tr>";
	    
	    foreach ($rows as $row)
	    {
		$str .= "<tr>";

		foreach ($row['f'] as $field)
		{
		    $str .= "<td>" . $field['v'] . "</td>";
		}
		$str .= "</tr>";
	    }

	    $str .= '</table></div>';
	    echo $str;	  
	    ?>

	    
	</div>
    </body>
</html>
