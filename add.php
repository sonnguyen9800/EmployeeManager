<h1>Hello the world</h1>

<h1>Test hereg</h1>
<?php

$row = 1;
$handle = fopen("gs://assignment1-rmit-cloudcomputing/Employees.csv", "w+");
if ($handle !== FALSE) {
    
    fclose($handle);
}

if ($handle == FALSE) {
    echo "false";
        }else{
    echo "true;";
}

?>

<h1>End of database</h1>

