<?php

require('db_credentials.php');
require('Employee.php');

function db_test(){
    //    $file = get_csv_file();

}

function get_csv_file(){
    $file = fopen(PRIVATE_PATH ."/Employees.csv","r");
    return $file;
}

function get_csv_file_towrite(){
    $file = fopen(PRIVATE_PATH ."/Employees.csv", "a");
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

function delete_employee_by_id($id){
    $file = get_csv_file();
    
    $all_employees = get_all_employees($file);

    print_r($all_employees);

    // $file = get_csv_file();
    // unlink(PRIVATE_PATH . '/Employees.csv');
    
    $file_towrite = fopen(PRIVATE_PATH . '/Employees.csv', "w");
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
    redirect_after_post("/Assignment1/index.php", "delete");
}

function insert_one_employee($employee){
    if ($employee['id']==''){
        redirect_after_post("/Assignment1/index.php", "failed");
    }
    $file = get_csv_file();
    $all_employees = get_all_employees($file);
    $flag = 1;
    foreach ($all_employees as $i_employee){
        if ($i_employee->id == $employee['id']){
            $flag = 0;
            break;
        }
    }
    if ($flag == 1){
        //permit insertion
        $write_file = get_csv_file_towrite();
        fputcsv($write_file, $employee);
        fclose($write_file);
        redirect_after_post("/Assignment1/index.php", "success");
    }else {
        //deny insertion

        redirect_after_post("/Assignment1/index.php", "failed");
    }

}
?>
