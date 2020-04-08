<h1>Hello the world</h1>

<h1>Test hereg</h1>
<?php

$row = 1;
$handle = fopen("gs://assignment1-rmit-cloudcomputing/text.txt", "w");

if ($handle !== FALSE) {
    fwrite($handle, "Hello the world");
    
}

if ($handle == FALSE) {
    echo "false";
}else{
    echo "true;";
}

fclose($handle);

?>

<h1>End of database</h1>

