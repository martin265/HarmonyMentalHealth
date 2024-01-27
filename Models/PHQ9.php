<?php

// ============== including the connection file here ============== //
include("Config/connection.php");

class PHQ9 {
    public $feelings;
    public $current_feeings;
    public $desire_to_kill;
    public $how_often;
    public $anything_to_stop;
    public $tried_to_kill;
    public $last_time;
    public $injurious_behaviour;
    public $panic_attacks;
    public $begin_experirnce;
    public $worries;
    public $connection;

    // ============== the constructor for the class here =============== //
    public function __construct($feelings, $current_feeings, $how_often, $desire_to_kill, $anything_to_stop, $tried_to_kill, $last_time, $injurious_behaviour, $panic_attacks, $begin_experirnce, $worries)
    {
        $this->feelings = $feelings;
        $this->current_feeings = $current_feeings;
        $this->how_often = $how_often;
        $this->desire_to_kill = $desire_to_kill;
        $this->anything_to_stop = $anything_to_stop;
        $this->tried_to_kill = $tried_to_kill;
        $this->last_time = $last_time;
        $this->injurious_behaviour = $injurious_behaviour;
        $this->panic_attacks = $panic_attacks;
        $this->begin_experirnce = $begin_experirnce;
        $this->worries = $worries;
        $this->connection = new Connection("localhost", "root", "", "harmonymentalhealth");       
    }

    // ============== function to save the details here =================== //
    public function SavePHQ9Questions($client_name, $client_id) {
        $this->connection->EstablishConnection();
        $conn = $this->connection->get_connection();
        try {
            $sqlCommand = $conn->prepare(
                "INSERT INTO PHQ9Details(
                    feelings, current_feelings, how_often, desire_to_kill, anything_to_stop,
                    tried_to_kill, last_time, injurious_behaviour, panic_attacks, begin_experience, worries,
                    client_name, client_id
                ) VALUES(
                    ?,?,?,?,?,?,?,?,?,?,?,?,?
                )"
            );
            // ============ binding the parameters here ================ //
            $sqlCommand->bind_param(
                "sssssssssssss",
                $this->feelings, $this->current_feeings, $this->how_often, $this->desire_to_kill, $this->anything_to_stop,
                $this->tried_to_kill, $this->last_time, $this->injurious_behaviour, $this->panic_attacks, 
                $this->begin_experirnce, $this->worries, $client_name, $client_id
            );
            // ============== running the query here ===============//
            $sqlCommand->execute();
        }catch(Exception $ex) {
            print($ex);
        }
    }
}

?>