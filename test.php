<h1>Hello the world</h1>

<h1>Test hereg</h1>
<?php

$row = 1;
$handle = fopen("gs://assignment1-rmit-cloudcomputing/Employees.csv", "r");
if ($handle !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        echo "<p> $num fields in line $row: <br /></p>\n";
        $row++;
        for ($c=0; $c < $num; $c++) {
            echo $data[$c] . "<br />\n";
        }
    }
    fclose($handle);
}

if ($handle == FALSE) {
    echo "false";
        }else{
    echo "true;";
}

?>

<h1>End of database</h1>
