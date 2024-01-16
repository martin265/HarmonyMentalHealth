<?php
// ========== the connection with the database will be here
class Connection{
    public $servername;
    public $username;
    public $password;
    public $database;
    public $connection;

    // ========== the constructor for the class here
    public function __construct($servername, $username, $password, $database)
    {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
        // ======== connection here ========== //
        $this->connection = mysqli_connect($servername, $username, $password, $database);
    }
    // ======== getters for the attributes here ============//
    public function get_servername() {
        return $this->servername;
    }
    // ===============// ============//
    public function get_username() {
        return $this->username;
    }
    // ================ // ============//
    public function get_password() {
        return $this->password;
    }
    //  =================// ============//
    public function get_database() {
        return $this->database;
    }
    // ===============// =============//
    public function get_connection() {
        return $this->connection;
    }
    // =========== function to establish the connection here ========//
    public function EstablishConnection() {
        try {
            if ($this->connection) {
            }
            else {
                print("failed to connect to the database");
            }
        }catch(Exception $ex) {
            print($ex);
        }
    }

    // =============== function to create the databse tables here =======//
    public function CreateStaffTable() {
        try {
            $sqlCommand = "CREATE TABLE Staff(
                staff_id INTEGER UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                first_name VARCHAR(50) NOT NULL,
                last_name VARCHAR(50) NOT NULL,
                phone_number VARCHAR(50) NOT NULL,
                email VARCHAR(50) NOT NULL,
                location VARCHAR(50) NOT NULL,
                department VARCHAR(50) NOT NULL,
                create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";
            $results = mysqli_query($this->connection, $sqlCommand);
            if ($results) {

            }else {
                print("failed to create the table");
            }

        }catch(Exception $ex) {

        }
    }

    // ============= function to create patient details table ============ //
    public function CreatePatientTable() {
        try {
            $sqlCommand = "CREATE TABLE PatientDetails(
                patinet_id INTEGER UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                first_name VARCHAR(50) NOT NULL,
                last_name VARCHAR(50) NOT NULL,
                guardian VARCHAR(50) NOT NULL,
                address VARCHAR(50) NOT NULL,
                cell_phone VARCHAR(50) NOT NULL,
                other_phone VARCHAR(50) NOT NULL,
                email VARCHAR(50) NOT NULL,
                emergency_contact VARCHAR(50) NOT NULL,
                telephone_number VARCHAR(50) NOT NULL,
                date_birth VARCHAR(50) NOT NULL,
                age VARCHAR(50) NOT NULL,
                gender VARCHAR(50) NOT NULL,
                marital_status VARCHAR(50) NOT NULL,
                residence VARCHAR(50) NOT NULL,
                referred_by VARCHAR(50) NOT NULL,
                primary_care VARCHAR(50) NOT NULL,
                work_place VARCHAR(50) NOT NULL,
                current_occupation VARCHAR(50) NOT NULL,
                present_position VARCHAR(50) NOT NULL,
                current_school VARCHAR(50) NOT NULL,
                college_year VARCHAR(50) NOT NULL,
                previous_therapist VARCHAR(50) NOT NULL,
                heard_about_us VARCHAR(100) NOT NULL,
                payment_method VARCHAR(50) NOT NULL,
                signature VARCHAR(50) NOT NULL,
                signature_date VARCHAR(50) NOT NULL,
                guardian_signature VARCHAR(50) NOT NULL,
                guardian_signature_date VARCHAR(50) NOT NULL,
                reviewed_by_signature VARCHAR(50) NOT NULL,
                reviewed_by_signature_date VARCHAR(50) NOT NULL,
                registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP

            )";
            $results = mysqli_query($this->connection, $sqlCommand);
            if ($results) {
                print("table created successfully");
            }
            else {
                print("failed to create table" . mysqli_errno($this->connection));
            }
        }catch(Exception $ex) {
            print("failed to create table". mysqli_error($this->connection));
        }
    }
}
// calling the object class here
// $conn = new Connection("localhost", "root", "", "harmonymentalhealth");
// $conn->EstablishConnection();

// // calling the create table function here
// $conn->CreatePatientTable();
?>