<?php
class Employee {
    var $id;
    var $first_name;
    var $last_name;
    var $gender;
    var $age;
    var $address;
    var $phone_number;

    public function __construct($row_csv)
    {
        $this->id = $row_csv[0] ?? NULL;
        $this->first_name = $row_csv[1] ?? null;
        $this->last_name = $row_csv[2] ?? null;
        $this->gender = $row_csv[3] ?? null;
        $this->age = $row_csv[4] ?? null;
        $this->address = $row_csv[5] ?? null;
        $this->phone_number = $row_csv[6] ?? null;
    }

    public function __toString()
    {
        try 
        {
            return "Employee id: '" . (string)$this->id . "' Name: '" .  (string) $this->first_name . "' last_name: '" . (string)$this->last_name . "' Gender: '" .  (string) $this->gender . "' Age: '" . (string)$this->age . "' Address: '" . (string)$this->address . "' Phone Number ' " . (string)$this->phone_number . "'" ;
        } 
        catch (Exception $exception) 
        {
            return '';
        }
    }
}




?>
