<?php
include("Config/connection.php");

// =========== the class that will hold all the questions here ============= //
class FamilyHealth {

    public $anxiety;
    public $depression;
    public $domestic_violence;
    public $criminal_behaviour;
    public $schizophrenia;
    public $suicide;
    public $mental_handcap;
    public $substance_use;
    public $axienty_family_member;
    public $depression_family_member;
    public $domestic_violence_family_member;
    public $criminal_behaviour_family_member;
    public $schizophrenia_family_member;
    public $suicide_family_member;
    public $mental_handcap_family_member;
    public $substance_use_family_member;
    public $voices;
    public $spying;
    public $visions;
    public $behaviour;
    public $relationship;
    public $relationship_how_long;
    public $rate_relationship;
    public $unresolved_issues;
    public $unresolved_issues_how_long;
    public $significant_life_changes;
    public $employed_studying;
    public $current_situation;
    public $anything_stressful;
    public $religion;
    public $describe_faith;
    public $feel_about;
    public $strengths;
    public $weeknesses;
    public $living_situation;
    public $accomplishment;
    public $connection;

    // ============== the public constructor for the class will be here ============= //
    public function __construct(
        $anxiety,
        $depression,
        $domestic_violence,
        $criminal_behaviour,
        $schizophrenia,
        $suicide,
        $mental_handcap,
        $substance_use,
        $axienty_family_member,
        $depression_family_member,
        $domestic_violence_family_member,
        $criminal_behaviour_family_member,
        $schizophrenia_family_member,
        $suicide_family_member,
        $mental_handcap_family_member,
        $substance_use_family_member,
        $voices,
        $spying,
        $visions,
        $behaviour,
        $relationship,
        $relationship_how_long,
        $rate_relationship,
        $unresolved_issues,
        $unresolved_issues_how_long,
        $significant_life_changes,
        $employed_studying,
        $current_situation,
        $anything_stressful,
        $religion,
        $describe_faith,
        $feel_about,
        $strengths,
        $weeknesses,
        $living_situation,
        $accomplishment
    )
    {
        $this->anxiety = $anxiety;
        $this->depression = $depression;
        $this->domestic_violence = $domestic_violence;
        $this->criminal_behaviour = $criminal_behaviour;
        $this->schizophrenia = $schizophrenia;
        $this->suicide = $suicide;
        $this->mental_handcap = $mental_handcap;
        $this->substance_use = $substance_use;
        $this->axienty_family_member = $axienty_family_member;
        $this->depression_family_member = $depression_family_member;
        $this->domestic_violence_family_member = $domestic_violence_family_member;
        $this->criminal_behaviour_family_member = $criminal_behaviour_family_member;
        $this->schizophrenia_family_member = $schizophrenia_family_member;
        $this->suicide_family_member = $suicide_family_member;
        $this->mental_handcap_family_member = $mental_handcap_family_member;
        $this->substance_use_family_member = $substance_use_family_member;
        $this->voices = $voices;
        $this->spying = $spying;
        $this->visions = $visions;
        $this->behaviour = $behaviour;
        $this->relationship = $relationship;
        $this->relationship_how_long = $relationship_how_long;
        $this->rate_relationship = $rate_relationship;
        $this->unresolved_issues = $unresolved_issues;
        $this->unresolved_issues_how_long = $unresolved_issues_how_long;
        $this->significant_life_changes = $significant_life_changes;
        $this->employed_studying = $employed_studying;
        $this->current_situation = $current_situation;
        $this->anything_stressful = $anything_stressful;
        $this->religion = $religion;
        $this->describe_faith = $describe_faith;
        $this->feel_about = $feel_about;
        $this->strengths = $strengths;
        $this->weeknesses = $weeknesses;
        $this->living_situation = $living_situation;
        $this->accomplishment = $accomplishment;
        $this->connection = new Connection("localhost", "root", "", "harmonymentalhealth");
    }

    // ================== getter for the connection here ========== //
    public function get_connection() {
        return $this->connection;
    }

    // ================= // function to save the detais here ============= //
    public function saveFamilyHealthDetails($client_name, $client_id) {
        try {
            // Establishing the connection
            $this->connection->EstablishConnection();
            $conn = $this->connection->get_connection();
    
            // Preparing the SQL statement
            $sqlCommand = $conn->prepare(
                "INSERT INTO familyhealthdetails(
                    axienty, depression, domestic_violence, criminal_behaviour, schizophrenia,
                    suicide, mental_handcap, substance_use, axienty_family_member, depression_family_member,
                    domestic_violence_family_member, criminal_behaviour_family_member,
                    schizophrenia_family_member, suicide_family_member, mental_handcap_family_member,
                    substance_use_family_member, voices, spying, visions,
                    behaviour, relationship, relationship_how_long, rate_relationship,
                    unresolved_issues, unresolved_issues_how_long, significant_life_changes,
                    employed_studying, current_situation,
                    anything_stressful, religion,
                    describe_faith, feel_about, strengths, weeknesses, living_situation, accomplishment, client_name, client_id
                ) VALUES(
                    ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?
                )"
            );
    
            // Allowing for NULL values
            $this->allowNotNull(); 
    
            // Binding the parameters
            $sqlCommand->bind_param(
                "ssssssssssssssssssssssssssssssssssssss",
                $this->anxiety,
                $this->depression,
                $this->domestic_violence,
                $this->criminal_behaviour,
                $this->schizophrenia,
                $this->suicide,
                $this->mental_handcap,
                $this->substance_use,
                $this->axienty_family_member,
                $this->depression_family_member,
                $this->domestic_violence_family_member,
                $this->criminal_behaviour_family_member,
                $this->schizophrenia_family_member,
                $this->suicide_family_member,
                $this->mental_handcap_family_member,
                $this->substance_use_family_member,
                $this->voices,
                $this->spying,
                $this->visions,
                $this->behaviour,
                $this->relationship,
                $this->relationship_how_long,
                $this->rate_relationship,
                $this->unresolved_issues,
                $this->unresolved_issues_how_long,
                $this->significant_life_changes,
                $this->employed_studying,
                $this->current_situation,
                $this->anything_stressful,
                $this->religion,
                $this->describe_faith,
                $this->feel_about,
                $this->strengths,
                $this->weeknesses,
                $this->living_situation,
                $this->accomplishment,
                $client_name,
                $client_id
            );
    
            // Executing the query
            $sqlCommand->execute();

            // print($this->anxiety);
            
        } catch (Exception $ex) {
            print($ex);
        }
    }

    // ========================== function to allwo the null values to be passed here =========== //
    private function allowNotNull() {
        try {
            $this->anxiety = $anxiety ?? "";
            $this->depression = $depression ?? "";
            $this->domestic_violence = $domestic_violence ?? "";
            $this->criminal_behaviour = $criminal_behaviour ?? "";
            $this->schizophrenia = $schizophrenia ?? "";
            $this->suicide = $suicide ?? "";
            $this->mental_handcap = $mental_handcap ?? "";
            $this->substance_use = $substance_use ?? "";
            $this->axienty_family_member = $axienty_family_member ?? "";
            $this->depression_family_member = $depression_family_member ?? "";
            $this->domestic_violence_family_member = $domestic_violence_family_member ?? "";
            $this->criminal_behaviour_family_member = $criminal_behaviour_family_member ?? "";
            $this->schizophrenia_family_member = $schizophrenia_family_member ?? "";
            $this->suicide_family_member = $suicide_family_member ?? "";
            $this->mental_handcap_family_member = $mental_handcap_family_member ?? "";
            $this->substance_use_family_member = $substance_use_family_member ?? "";
            $this->voices = $voices ?? "";
            $this->spying = $spying ?? "";
            $this->visions = $visions ?? "";
            $this->behaviour = $behaviour ?? "";
            $this->relationship = $relationship ?? "";
            $this->relationship_how_long = $relationship_how_long ?? "";
            $this->rate_relationship = $rate_relationship ?? "";
            $this->unresolved_issues = $unresolved_issues ?? "";
            $this->unresolved_issues_how_long = $unresolved_issues_how_long ?? "";
            $this->significant_life_changes = $significant_life_changes ?? "";
            $this->employed_studying = $employed_studying ?? "";
            $this->current_situation = $current_situation ?? "";
            $this->anything_stressful = $anything_stressful ?? "";
            $this->religion = $religion ?? "";
            $this->describe_faith = $describe_faith ?? "";
            $this->feel_about = $feel_about ?? "";
            $this->strengths = $strengths ?? "";
            $this->weeknesses = $weeknesses ?? "";
            $this->living_situation = $living_situation ?? "";
            $this->accomplishment = $accomplishment ?? "";

        }catch(Exception $ex) {
            print($ex);
        }
    }
}

?>