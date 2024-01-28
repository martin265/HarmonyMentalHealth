<?php

// ============ getting the connection here ================ //
class GAD7 {
    public $short_tempered;
    public $emotions;
    public $alcohol_drinking;
    public $how_often;
    public $recreational_drugs;
    public $recreation_how_often;
    public $type_of_drugs;
    public $cage_questions;
    public $help;
    public $when;
    public $where;
    public $gamble;
    public $what_type;
    public $addicted;
    public $how_long;
    public $concentration;
    public $memory;
    public $connection;
    // ================ the constructor for the class here ========== //
    public function __construct($short_tempered, $emotions, $alcohol_drinking, $how_often, $recreational_drugs, $recreation_how_often, $type_of_drugs, $cage_questions, $help, $when, $where, $gamble, $what_type, $how_long, $addicted, $concentration, $memory)
    {
        $this->short_tempered = $short_tempered;
        $this->emotions = $emotions;
        $this->alcohol_drinking = $alcohol_drinking;
        $this->how_often = $how_often;
        $this->recreational_drugs = $recreational_drugs;
        $this->recreation_how_often = $recreation_how_often;
        $this->type_of_drugs = $type_of_drugs;
        $this->cage_questions = $cage_questions;
        $this->help = $help;
        $this->when = $when;
        $this->where = $where;
        $this->gamble = $gamble;
        $this->what_type = $what_type;
        $this->how_long = $how_long;
        $this->addicted = $addicted;
        $this->concentration = $concentration;
        $this->memory = $memory;
        $this->connection = new Connection("localhost", "root", "", "harmonymentalhealth");
    }

    // ================== getter for the connection here ========== //
    public function get_connection() {
        return $this->connection;
    }

    // =============== function to save the details here =============== //
    public function SaveGAD7Questions($client_name, $client_id) {
        try {
            // =========== inserting the records here ==========//
            $this->connection->EstablishConnection();
            $conn = $this->connection->get_connection();
            $sqlCommand = $conn->prepare(
                "INSERT INTO GAD7Details (
                    
                ) VALUES ()"
            );

        }catch(Exception $ex) {
            print($ex);
        }
    }
}

?>