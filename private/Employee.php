<?php
class Employee {

    /* Employee attributes*/    
    var $id;
    var $first_name;
    var $last_name;
    var $gender;
    var $age;
    var $address;
    var $phone_number;
    var $first_name_freq;
    var $last_name_freq;

    /* Constructor from csv line*/
    public function __construct($row_csv)
    {
        $this->id = $row_csv[0] ;
        $this->first_name = $row_csv[1];
        $this->last_name = $row_csv[2] ;
        $this->gender = $row_csv[3] ;
        $this->age = $row_csv[4];
        $this->address = $row_csv[5] ;
        $this->phone_number = $row_csv[6] ;

	/* Extra for name frequency */
        $this->first_name_freq = '0';
        $this->last_name_freq = '0';
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
