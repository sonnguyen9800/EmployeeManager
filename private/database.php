<?php

require('db_credentials.php');
require('Employee.php');

//define("pro", "gs://assignment1-rmit-cloudcomputing/Employees.csv" );
//define("dev", PRIVATE_PATH . '/Employees.csv');
define("pro", PRIVATE_PATH . '/Employees.csv' );


function db_test(){
    //    $file = get_csv_file();
    
    $file = fopen(pro, "r");
    while(! feof($file)){
        $line_data = fgetcsv($file);
	print_r($line_data);

    }
}


function get_csv_file(){
    $file = fopen(pro, "r");
    return $file;
}

function get_csv_file_towrite(){
    $file = fopen(pro, "
a");
    return $file;
}

function create_new_file(){
    $file = fopen(pro, "w"); 
    return $file;
}

function get_all_employees($file){
    $all_employees = array();
    while(! feof($file)){
        $line_data = fgetcsv($file);
        $employee = new Employee($line_data);
	if ($employee->id !='id' and $employee->id !=  null and $employee->id != NULL  ){
            $all_employees[] = $employee;	    
	}

    }
    fclose($file);
    return $all_employees;
}


function show_all_employees(){
    $file = get_csv_file();
    return get_all_employees($file);
}

function find_employee_by_id($id){
    $file = get_csv_file();
    $all_employees = get_all_employees($file);
    foreach ($all_employees as $employee){
        if ($employee->id == $id){
            return $employee;
        }
    }
    return "fail";
}

function edit_employee_by_id($id, $employee_array){
    $file = get_csv_file();
    $all_employees = get_all_employees($file);    
    $file_towrite = create_new_file();
    
    $beginning = array("id", "first_name", "last_name","gender", "age", "address","phone_number");
    fputcsv($file_towrite, $beginning);
    foreach ($all_employees as $employee){
        if ($employee->id != $id){
            $array= array("id"=> $employee->id,"first_name"=> $employee->first_name,
                          "last_name"=> $employee->last_name,"gender"=> $employee->gender,
                          "age"=> $employee->age, "address"=> $employee->address,"phone_number" => $employee->phone_number );
            fputcsv($file_towrite, $array);
        }
    }
    $result = fputcsv($file_towrite, $employee_array);
    fclose($file_towrite);
    if ($result == FALSE){
        redirect_after_post("/index", "edit-failed");
    }else{
        redirect_after_post("/index", "edit-success");
    }
    
}


function delete_employee_by_id($id){
    $file = get_csv_file();
    $all_employees = get_all_employees($file);    
    $file_towrite = create_new_file();
    
    $beginning = array("id", "first_name", "last_name","gender", "age", "address","phone_number");
    fputcsv($file_towrite, $beginning);

    foreach ($all_employees as $employee){
        if ($employee->id != $id){
            $array= array("id"=> $employee->id,"first_name"=> $employee->first_name,
                          "last_name"=> $employee->last_name,"gender"=> $employee->gender,
                          "age"=> $employee->age, "address"=> $employee->address,"phone_number" => $employee->phone_number );
            fputcsv($file_towrite, $array);   
        }
    }
    fclose($file_towrite);
    redirect_after_post("/index", "delete");
}

function insert_one_employee($employee){
    if ($employee['id']==''){
        redirect_after_post("/index", "failed");
    }

    $file = get_csv_file();
    $all_employees = get_all_employees($file);
    fclose($file);

    $flag = 1;
    foreach ($all_employees as $i_employee){
        if ($i_employee->id == $employee['id']){
            $flag = 0;
            break;
        }
    }
    if ($flag == 1){
        $file_towrite = create_new_file();
        //Add the header to csv file
        $beginning = array("id", "first_name", "last_name","gender", "age", "address","phone_number");
        fputcsv($file_towrite, $beginning);
        //Loop through and transmit data to new file:
        foreach($all_employees as $i_employee){
                $input = array("id" => $i_employee->id, "first_name" => $i_employee->first_name,
                               "last_name" => $i_employee->last_name, "gender"=> $i_employee->gender,
                               "age" => $i_employee->age, "address" => $i_employee->address,
                               "phone_number"=> $i_employee->phone_number);
                fputcsv($file_towrite, $input);
        }                
        //permit insertion - insert the new data
        fputcsv($file_towrite, $employee);
        fclose($file_towrite);
        redirect_after_post("/index", "success");
    }else {
        //deny insertion

        redirect_after_post("/index", "failed");
    }

}
?>
