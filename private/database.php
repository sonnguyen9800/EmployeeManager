<?php

require('db_credentials.php');

function db_connect(){
    $file = fopen("Employees.csv","r");
    print_r(fgetcsv($file));
    fclose($file);
}

function db_disconnect($db){
    fclose($db);
}



?>
