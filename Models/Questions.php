<?php
// ========= inclusing the connection here ============== //
include("Config/connection.php"); 
// 
class Question{
    // defining the parameters here
    public $prescription_medication;
    public $explanation;
    public $physical_health;
    public $chronic_conditions;
    public $chronic_condition_explanation;
    public $current_health_problems;
    public $sleeping_habits;
    public $sleeping_problems;
    public $recurrent_dreams;
    public $general_exercise;
    public $exercise_type;
    public $overwhelming_sadness;
    public $how_long;
    public $connection;

    // =============== the constructor function for the class will be here ========//
    public function __construct($prescription_medication, $explanation, $physical_health, $chronic_conditions,
        $chronic_condition_explanation, $current_health_problems, $sleeping_habits, $sleeping_problems, 
        $recurrent_dreams, $general_exercise, $exercise_type, $overwhelming_sadness, $how_long)
    {
        $this->prescription_medication = $prescription_medication;
        $this->explanation = $explanation;
        $this->physical_health = $physical_health;
        $this->chronic_conditions = $chronic_conditions;
        $this->chronic_condition_explanation = $chronic_condition_explanation;
        $this->current_health_problems = $current_health_problems;
        $this->sleeping_habits = $sleeping_habits;
        $this->sleeping_problems = $sleeping_problems;
        $this->recurrent_dreams = $recurrent_dreams;
        $this->general_exercise = $general_exercise;
        $this->exercise_type = $exercise_type;
        $this->overwhelming_sadness = $overwhelming_sadness;
        $this->how_long = $how_long;
        // ============== the connection will be called here
        $this->connection = new Connection("localhost", "root", "", "harmonymentalhealth");
    }
    // ============== the getter for the connection here ================== //
    public function get_connection() {
        return $this->connection;
    }

    // ================= function to establish the connection here ================= //
    public function EstablishConnection() {
        try {
            if (!$this->connection) {
                print("failed to establish connection with the database");
            }
        }catch(Exception $ex) {
            print($ex);
        }
    }

    public function SaveQuestionDetails($client_name, $client_id) {
        try {
            // ========= getting the connection here ============ //
            $this->connection->EstablishConnection();
            $conn = $this->connection->get_connection();
            
            $sqlCommand = $conn->prepare(
                "INSERT INTO GeneralMentalHealth(
                    prescription_medication,
                    explanation, physical_health, chronic_conditions,
                    chronic_condition_explanation, current_health_problems, sleeping_habits,
                    sleeping_problems, recurrent_dreams, general_exercise, exercise_type,
                    overwhelming_sadness,
                    how_long, client_name, client_id
                ) VALUES (
                    ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?
                )"
            );

            //$this->ensureNotNull();
            // ================= binding the parameters here ================== //
            $sqlCommand->bind_param(
                "sssssssssssssss",
                $this->prescription_medication, $this->explanation, $this->physical_health, $this->chronic_conditions,
                $this->chronic_condition_explanation, $this->current_health_problems, $this->sleeping_habits,
                $this->sleeping_problems, $this->recurrent_dreams, $this->general_exercise, $this->exercise_type,
                $this->overwhelming_sadness, $this->how_long, $client_name, $client_id
            );
            // ============= executing the query here ================ //
            $sqlCommand->execute();
        } catch (Exception $ex) {
            print($ex);
        }
    }
    // ============= function to ensure that we are not passing null values ================ //
    private function ensureNotNull() {
        $this->prescription_medication = $this->prescription_medication ?? "";
        $this->explanation = $this->explanation ?? "";
        $this->physical_health = $this->physical_health ?? "";
        $this->chronic_conditions = $this->chronic_conditions ?? "";
        $this->chronic_condition_explanation = $this->chronic_condition_explanation ?? "";
        $this->current_health_problems = $this->current_health_problems ?? "";
        $this->sleeping_habits = $this->sleeping_habits ?? "";
        $this->sleeping_problems = $this->sleeping_problems ?? "";
        $this->recurrent_dreams = $this->recurrent_dreams ?? "";
        $this->general_exercise = $this->general_exercise ?? "";
        $this->exercise_type = $this->exercise_type ?? "";
        $this->overwhelming_sadness = $this->overwhelming_sadness ?? "";
        $this->how_long = $this->how_long ?? "";
    }

}
?>