<?php 

require_once('../../private/initialize.php');

if (is_post_request()){
    /* Very simple, this file is linked from new.php. From the parameters from new.php, it will create object and insert employee into the file*/
    
    $id = $_POST['id'] ;
    $first_name = $_POST['first_name'] ;
    $last_name = $_POST['last_name'] ;
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $address = $_POST['address'] ;
    $phone_number = $_POST['phone_number'];

    
    $employee = array("id" => $id, "first_name" => $first_name,"last_name" => $last_name,
                      "gender"=> $gender, "age" => $age, "address" => $address,  "phone_number"=> $phone_number);

    $result = insert_one_employee($employee);

}

?>
