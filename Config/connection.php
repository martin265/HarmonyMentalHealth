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
                patient_id INTEGER UNSIGNED AUTO_INCREMENT PRIMARY KEY,
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

    // ============ function to create client table here =============== //
    public function CreateClientTable() {
        try {
            $sqlCommand = "CREATE TABLE ClientDetails (
                client_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                client_name VARCHAR(50) NOT NULL,
                date_intake VARCHAR(50) NOT NULL,
                therapist VARCHAR(50) NOT NULL,
                session_1 VARCHAR(50) NOT NULL,
                session_2 VARCHAR(50) NOT NULL,
                session_3 VARCHAR(50) NOT NULL,
                session_4 VARCHAR(50) NOT NULL,
                present_problem VARCHAR(100) NOT NULL,
                previous_therapy_history VARCHAR(100) NOT NULL,
                diagnosis VARCHAR(100) NOT NULL,
                plan VARCHAR(100) NOT NULL,
                patient_id INT UNSIGNED, -- Ensure this matches the data type of patient_id in PatientDetails
                FOREIGN KEY (patient_id) REFERENCES PatientDetails(patient_id),
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";
            
            $results = mysqli_query($this->connection, $sqlCommand);
            if ($results) {

            }else {
                print("failed to create the table");
            }
        }catch(Exception $ex) {
            print("failed to create table" . mysqli_error($this->connection));
        }
    }

    // ============ function to create client questions_table =============== //
    public function CreateGeneralMentalHealthInformation() {
        try {
            $sqlCommand = "CREATE TABLE IF NOT EXISTS GeneralMentalHealth (
                general_mental_health_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                prescription_medication VARCHAR(50) NOT NULL,
                explanation VARCHAR(50) NOT NULL,
                physical_health VARCHAR(50) NOT NULL,
                chronic_conditions VARCHAR(50) NOT NULL,
                chronic_condition_explanation VARCHAR(100) NOT NULL,
                current_health_problems VARCHAR(100) NOT NULL,
                sleeping_habits VARCHAR(100) NOT NULL,
                sleeping_problems VARCHAR(100) NOT NULL,
                recurrent_dreams VARCHAR(100) NOT NULL,
                general_exercise VARCHAR(100) NOT NULL,
                exercise_type VARCHAR(100) NOT NULL,
                overwhelming_sadness VARCHAR(100) NOT NULL,
                how_long VARCHAR(100) NOT NULL,
                client_name VARCHAR(50) NOT NULL,
                client_id INT UNSIGNED,
                FOREIGN KEY (client_id) REFERENCES ClientDetails(client_id),
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";
            
            $results = mysqli_query($this->connection, $sqlCommand);
            if (!$results) {
                print("failed to create the table");
            }
        }catch(Exception $ex) {
            print("failed to create table" . mysqli_error($this->connection));
        }
    }
}
// calling the object class here
// $conn = new Connection("localhost", "root", "", "harmonymentalhealth");
// $conn->EstablishConnection();
// $conn->CreateGeneralMentalHealthInformation();

// // calling the create table function here
// $conn->CreateClientTable();
?>