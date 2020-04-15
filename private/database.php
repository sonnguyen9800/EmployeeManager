<?php

$database_csv = '' // ENTER THE BUCKET CSV HERE


require('Employee.php');

define("pro", $database_csv );


// This is function used to test the connection between the app and the database
function db_test(){
    //    $file = get_csv_file();
    
    $file = fopen(pro, "r");
    while(! feof($file)){
        $line_data = fgetcsv($file);
	print_r($line_data);

    }
}

//Open csv file to read
function get_csv_file(){
    $file = fopen(pro, "r");
    return $file;
}

// Open CSV file to write (append)
function get_csv_file_towrite(){
    $file = fopen(pro, "
a");
    return $file;
}

// Create new csv file
function create_new_file(){
    $file = fopen(pro, "w"); 
    return $file;
}


// Return a list of employee (Object) from a file
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


// Return a list of employees from the predefined file
function show_all_employees(){
    $file = get_csv_file();
    return get_all_employees($file);
}


// Return employee by id
function find_employee_by_id($id){
    $file = get_csv_file();
    $all_employees = get_all_employees($file);
    // NOrmal for loop to search the employee
    foreach ($all_employees as $employee){
        if ($employee->id == $id){
            return $employee;
        }
    }
    return "fail";
}

// Edit the employee by id
function edit_employee_by_id($id, $employee_array){
    $file = get_csv_file();
    $all_employees = get_all_employees($file);

    // Make new file (overwrite) then add the header for the csv file
    $file_towrite = create_new_file();   
    $beginning = array("id", "first_name", "last_name","gender", "age", "address","phone_number");
    fputcsv($file_towrite, $beginning);

    // Push the old data to the new file, except the record whose id matched the focused one (the one that is edited)
    foreach ($all_employees as $employee){
        if ($employee->id != $id){
            $array= array("id"=> $employee->id,"first_name"=> $employee->first_name,
                          "last_name"=> $employee->last_name,"gender"=> $employee->gender,
                          "age"=> $employee->age, "address"=> $employee->address,"phone_number" => $employee->phone_number );
            fputcsv($file_towrite, $array);
        }
    }
    // Push the edited record (after finished) to the new file
    $result = fputcsv($file_towrite, $employee_array);
    fclose($file_towrite);

    // Redirect to the /index
    if ($result == FALSE){
        redirect_after_post("/index", "edit-failed");
    }else{
        redirect_after_post("/index", "edit-success");
    }
    
}

// Delete the employee by id

function delete_employee_by_id($id){
    $file = get_csv_file();
    $all_employees = get_all_employees($file);

    // Make new file and add the header to the file (overwrite mode)
    $file_towrite = create_new_file();    
    $beginning = array("id", "first_name", "last_name","gender", "age", "address","phone_number");
    fputcsv($file_towrite, $beginning);

    // Add all employees (except the selected one) to the new file
    foreach ($all_employees as $employee){
        if ($employee->id != $id){
            $array= array("id"=> $employee->id,"first_name"=> $employee->first_name,
                          "last_name"=> $employee->last_name,"gender"=> $employee->gender,
                          "age"=> $employee->age, "address"=> $employee->address,"phone_number" => $employee->phone_number );
            fputcsv($file_towrite, $array);   
        }
    }
    fclose($file_towrite);
    // Redirect to /index
    redirect_after_post("/index", "delete");
}

// Insert new employee
function insert_one_employee($employee){
    // Handler for error 1
    if ($employee['id']==''){
        redirect_after_post("/index", "failed");
    }
    // Get list of employees
    $file = get_csv_file();
    $all_employees = get_all_employees($file);
    fclose($file);

    // Search if the id of inserted employee has been existed before
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
