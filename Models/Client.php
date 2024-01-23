<?php
include("Config/connection.php");
// ============ the class to keep the client details here
class Client {
    public $client_name;
    public $date_intake;
    public $therapist;
    public $session_1;
    public $session_2;
    public $session_3;
    public $session_4;
    public $present_problem;
    public $previous_therapy_session;
    public $diagnosis;
    public $plan;
    public $connection;

    // ================= constructor function will be here ============== //
    public function __construct($client_name, $date_intake, $therapist, $session_1, $session_2, $session_3, $session_4, $present_problem, $previous_therapy_session, $diagnosis, $plan)
    {
        $this->client_name = $client_name;
        $this->date_intake = $date_intake;
        $this->therapist = $therapist;
        $this->session_1 = $session_1;
        $this->session_2 = $session_2;
        $this->session_3 = $session_3;
        $this->session_4 = $session_4;
        $this->present_problem = $present_problem;
        $this->previous_therapy_session = $previous_therapy_session;
        $this->diagnosis = $diagnosis;
        $this->plan = $plan;
        $this->connection = mysqli_connect("localhost", "root", "", "harmonymentalhealth");
    }

    // =========== the getter for the connection object here 
    public function GetConnection() {
        return $this->connection;
    }
    // ============= function to establish the connection here
    public function EstablishConnection() {
        try {
            
        }catch(Exception $ex) {
            print("something went wrong at " . mysqli_connect_error($this->connection));
        }
    }

    // =============== function to save the to save the client details here ====== //
    
}

?>