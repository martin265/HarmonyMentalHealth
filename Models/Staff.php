<?php
// including the connection files here
include("Config/connection.php");
// ======== the class for the staff here
class Staff{
    public $first_name;
    public $last_name;
    public $phone_number;
    public $email;
    public $location;
    public $department;

    // =========== constructor function here ===========//
    public function __construct($first_name, $last_name, $phone_number, $email, $location, $department)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->phone_number = $phone_number;
        $this->email = $email;
        $this->location = $location;
        $this->department = $department;
    }
    // ========== getters for the class here
    public function get_first_name() {
        return $this->first_name;
    }
    // ===============// ==================//
    public function get_phone_number() {
        return $this->phone_number;
    }
    // ===============// ==================//
    public function get_email() {
        return $this->email;
    }
    // ===============// ==================//
    public function get_location() {
        return $this->location;
    }
    // ===============// ==================//
    public function get_department() {
        return $this->last_name;
    }

    // =============== function to insert the records here ===============//
    public function SaveStaffDetails() {
        try {
            
        }catch(Exception $ex) {
            print($ex);
        }
    }
}

?>
