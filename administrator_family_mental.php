<?php
include("Models/FamilyHealth.php");
$connection = new Connection("localhost", "root", "", "harmonymentalhealth");
$connection->EstablishConnection();
$conn = $connection->get_connection();

// =============== the variables will be here ================ //
$client_name = "";
$voices = "";
$spying = "";
$visions = "";
$behaviour = "";
$unresolved_issues = "";
$significant_life_changes = "";
$feel_about = "";
$strengths = "";
$weaknesses = "";
$living_situation = "";


// ================ function to get the client name here ==================== //
function FetchClientName($conn) {
    try {
        // ================ using prepared statements here =============== //
        $sqlCommand = "SELECT * FROM ClientDetails";
        // ========== running the query here ========//
        $results = mysqli_query($conn, $sqlCommand);
        // ======== binding the results to the array here ============= //
        $all_results = mysqli_fetch_all($results, MYSQLI_ASSOC);
        // =========== getting the client_name  here ========= //
        return $all_results;

    }catch(Exception $ex) {
        print($ex);
    }
}

$all_results = FetchClientName($conn);
// ================ getting the current client is here ========== //
// ============== fuction to get the current client ID here ================== //
function FetchClientID($conn) {
    try {
        if (isset($_POST["save_session"])) {
            $client_name = mysqli_real_escape_string($conn, $_POST["client_name"]);
            $sqlCommand = "SELECT client_id FROM ClientDetails WHERE client_name = '$client_name'";
            $results = mysqli_query($conn, $sqlCommand);
            // =========== fetching the patient id here ==========//
            $all_results = mysqli_fetch_all($results, MYSQLI_ASSOC);
            // ========== looping through the results ============= //
            foreach($all_results as $single_result) {
                return $single_result["client_id"];
            }
        }
    } catch(Exception $ex) {
        // Handle exceptions here
        print($ex);
        return false;
    }
}

$client_id = FetchClientID($conn);

// =================== validating the inputs here ================= //
function ValidateInputs($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

// ============== array for the errors here ============ //
$all_errors = array(
    "voices"=>"", "spying"=>"", "visions"=>"", "behaviour"=>"", "unresolved_issues"=>"",
    "significant_life_changes"=>"", "feel_about"=>"", "strengths"=>"", "weaknesses"=>"",
    "living_situation"=>""
);

// ============== function to validate the input fields here ================ //
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $voices = ValidateInputs($_POST["voices"]);
    $spying = ValidateInputs($_POST["spying"]);
    $visions = ValidateInputs($_POST["visions"]);
    $behaviour = ValidateInputs($_POST["behaviour"]);
    $unresolved_issues = ValidateInputs($_POST["unresolved_issues"]);
    $significant_life_changes = ValidateInputs($_POST["significant_life_changes"]);
    $feel_about = ValidateInputs($_POST["feel_about"]);
    $strengths = ValidateInputs($_POST["strengths"]);
    $weaknesses = ValidateInputs($_POST["weaknesses"]);
    $living_situation = ValidateInputs($_POST["living_situation"]);

    // =============== checking if the fields are empty here =========== //
    if (isset($_POST["save_session"])) {

        if (empty($_POST["voices"])) {
            $all_errors["voices"] = "fill in the blanks please";
        }
        else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $voices)) {
                $all_errors["voices"] = "provide valid characters";
            }
        }

        // ====================== // GOD IS GOOD  // ============================ //
        if (empty($_POST["spying"])) {
            $all_errors["spying"] = "fill in the blanks please";
        }
        else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $spying)) {
                $all_errors["spying"] = "provide valid characters";
            }
        }

        // ====================== // GOD IS GOOD  // ============================ //
        if (empty($_POST["visions"])) {
            $all_errors["visions"] = "fill in the blanks please";
        }
        else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $visions)) {
                $all_errors["visions"] = "provide valid characters";
            }
        }

        // ====================== // GOD IS GOOD  // ============================ //
        if (empty($_POST["behaviour"])) {
            $all_errors["behaviour"] = "fill in the blanks please";
        }
        else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $behaviour)) {
                $all_errors["behaviour"] = "provide valid characters";
            }
        }

        // ====================== // GOD IS GOOD  // ============================ //
        if (empty($_POST["unresolved_issues"])) {
            $all_errors["unresolved_issues"] = "fill in the blanks please";
        }
        else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $unresolved_issues)) {
                $all_errors["unresolved_issues"] = "provide valid characters";
            }
        }

        // ====================== // GOD IS GOOD  // ============================ //
        if (empty($_POST["significant_life_changes"])) {
            $all_errors["significant_life_changes"] = "fill in the blanks please";
        }
        else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $significant_life_changes)) {
                $all_errors["significant_life_changes"] = "provide valid characters";
            }
        }

        // ====================== // GOD IS GOOD  // ============================ //
        if (empty($_POST["feel_about"])) {
            $all_errors["feel_about"] = "fill in the blanks please";
        }
        else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $feel_about)) {
                $all_errors["feel_about"] = "valid characters please";
            }
        }

        // ====================== // GOD IS GOOD  // ============================ //
        if (empty($_POST["strengths"])) {
            $all_errors["strengths"] = "fill in the blanks please";
        }
        else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $strengths)) {
                $all_errors["strengths"] = "provide valid characters";
            }
        }

        // ====================== // GOD IS GOOD  // ============================ //
        if (empty($_POST["weaknesses"])) {
            $all_errors["weaknesses"] = "fill in the blanks please";
        }
        else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $weaknesses)) {
                $all_errors["weaknesses"] = "enter valid characters only";
            }
        }

        // ====================== // GOD IS GOOD  // ============================ //
        if (empty($_POST["living_situation"])) {
            $all_errors["living_situation"] = "fill in the blanks please";
        }
        else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $living_situation)) {
                $all_errors["living_situation"] = "no numbers are allowed in these field";
            }
        }

        // ============== filtering the errors array here ================== //
        if (!filter_var($all_errors)) {
            // getting the values from the main form here =========//
            $client_name = isset($_POST["client_name"]) ? mysqli_real_escape_string($conn, $_POST["client_name"]) : "";
            $anxiety = isset($_POST["anxiety"]) ? mysqli_real_escape_string($conn, $_POST["anxiety"]): "";
            $depression = isset($_POST["depression"]) ? mysqli_real_escape_string($conn, $_POST["depression"]) : "";
            $domestic_violence = isset($_POST["domestic_violence"]) ? mysqli_real_escape_string($conn, $_POST["domestic_violence"]) : "";
            $criminal_behaviour = isset($_POST["criminal_behaviour"]) ? mysqli_real_escape_string($conn, $_POST["criminal_behaviour"]) : "";
            $schizophrenia = isset($_POST["schizophrenia"]) ? mysqli_real_escape_string($conn, $_POST["schizophrenia"]) : "";
            $suicide = isset($_POST["suicide"]) ? mysqli_real_escape_string($conn, $_POST["suicide"]) : "";
            $mental_handcap = isset($_POST["mental_handcap"]) ? mysqli_real_escape_string($conn, $_POST["mental_handcap"]) : "";
            $substance_use = isset($_POST["substance_use"]) ? mysqli_real_escape_string($conn, $_POST["substance_use"]) : "";
            $axienty_family_member = isset($_POST["anxiety_family_member"]) ? mysqli_real_escape_string($conn, $_POST["anxiety_family_member"]) : "";
            $depression_family_member = isset($_POST["depression_family_member"]) ? mysqli_real_escape_string($conn, $_POST["depression_family_member"]) : "";
            $domestic_violence_family_member = isset($_POST["domestic_violence_family_member"]) ? mysqli_real_escape_string($conn, $_POST["domestic_violence_family_member"]) : "";
            $criminal_behaviour_family_member = isset($_POST["criminal_behaviour_family_member"]) ? mysqli_real_escape_string($conn, $_POST["criminal_behaviour_family_member"]) : "";
            $schizophrenia_family_member = isset($_POST["schizophrenia_family_member"]) ? mysqli_real_escape_string($conn, $_POST["schizophrenia_family_member"]) : "";
            $suicide_family_member = isset($_POST["suicide_family_member"]) ? mysqli_real_escape_string($conn, $_POST["suicide_family_member"]) : "";
            $mental_handcap_family_member = isset($_POST["mental_handcap_family_member"]) ? mysqli_real_escape_string($conn, $_POST["mental_handcap_family_member"]) : "";
            $substance_use_family_member = isset($_POST["substance_use_family_member"]) ? mysqli_real_escape_string($conn, $_POST["substance_use_family_member"]) : "";
            $voices = isset($_POST["voices"]) ? mysqli_real_escape_string($conn, $_POST["voices"]) : "";
            $spying = isset($_POST["spying"]) ? mysqli_real_escape_string($conn, $_POST["spying"]) : "";
            $visions = isset($_POST["visions"]) ? mysqli_real_escape_string($conn, $_POST["visions"]) : "";
            $behaviour = isset($_POST["behaviour"]) ? mysqli_real_escape_string($conn, $_POST["behaviour"]) : "";
            $relationship = isset($_POST["relationship"]) ? mysqli_real_escape_string($conn, $_POST["relationship"]) : "";
            $relationship_how_long = isset($_POST["relationship_how_long"]) ? mysqli_real_escape_string($conn, $_POST["relationship_how_long"]) : "";
            $rate_relationship = isset($_POST["rate_relationship"]) ? mysqli_real_escape_string($conn, $_POST["rate_relationship"]) : "";
            $unresolved_issues = isset($_POST["unresolved_issues"]) ? mysqli_real_escape_string($conn, $_POST["unresolved_issues"]) : "";
            $unresolved_issues_how_long = isset($_POST["unresolved_issues_how_long"]) ? mysqli_real_escape_string($conn, $_POST["unresolved_issues_how_long"]) : "";
            $significant_life_changes = isset($_POST["significant_life_changes"]) ? mysqli_real_escape_string($conn, $_POST["significant_life_changes"]) : "";
            $employed_studying = isset($_POST["employed_studying"]) ? mysqli_real_escape_string($conn, $_POST["employed_studying"]) : "";
            $current_situation = isset($_POST["current_situation"]) ? mysqli_real_escape_string($conn, $_POST["current_situation"]) : "";
            $anything_stressful = isset($_POST["anything_stressful"]) ? mysqli_real_escape_string($conn, $_POST["anything_stressful"]) : "";
            $religion = isset($_POST["religion"]) ? mysqli_real_escape_string($conn, $_POST["religion"]) : "";
            $describe_faith = isset($_POST["describe_faith"]) ? mysqli_real_escape_string($conn, $_POST["describe_faith"]) : "";
            $feel_about = isset($_POST["feel_about"]) ? mysqli_real_escape_string($conn, $_POST["feel_about"]) : "";
            $strengths = isset($_POST["strengths"]) ? mysqli_real_escape_string($conn, $_POST["strengths"]) : "";
            $weeknesses = isset($_POST["weaknesses"]) ? mysqli_real_escape_string($conn, $_POST["weaknesses"]) : "";
            $living_situation = isset($_POST["living_situation"]) ? mysqli_real_escape_string($conn, $_POST["living_situation"]) : "";
            $accomplishment = isset($_POST["accomplishment"]) ? mysqli_real_escape_string($conn, $_POST["accomplishment"]) : "";

            // =============== calling the function to save the details here =================== //
            $family_planning = new FamilyHealth(
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
                $accomplishment,
            );

            // print_r($family_planning);

            // ================= calling the main function here =============== //
            $family_planning->saveFamilyHealthDetails(
                $client_name,
                $client_id
            );
            $success_message = "question details saved successfully";
        }
        else {
            $error_message = "the form has errors";
        }


        
        
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- including the side navigation bar here -->
    <div class="main-content-container">
        <div class="side-navigation-area">
            <!-- the dashboard side navigation will be here -->
            <?php include("sidebar.php"); ?>
        </div>
        
        <div class="content-area">
            <!-- the php pages will reside in here -->
            <div class="container-xxl">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="familly-mental-health-section-page shadow-sm">
                             <div class="family-mental-health-title">
                                <h1>family mental health here</h1>
                             </div>
                             <!-- ================ the section to show the success message here ===========  -->
                             <div class="success-message">
                                <?php if (isset($success_message)) : ?>
                                    <div id="successAlert" class="alert alert-success w-50" role="alert">
                                        <?php echo $success_message; ?>
                                    </div>
                                    <script>
                                        // Automatically dismiss the success alert after 5 seconds
                                        setTimeout(function() {
                                            document.getElementById("successAlert").style.display = "none";
                                        }, 5000);
                                    </script>
                                    <?php elseif (isset($error_message)) : ?>
                                        <div class="alert alert-danger w-50" role="alert" id="errorAlert">
                                            <?php echo($error_message); ?>
                                        </div>
                                        <script>
                                            // Automatically dismiss the success alert after 5 seconds
                                            setTimeout(function() {
                                                document.getElementById("errorAlert").style.display = "none";
                                            }, 5000);
                                        </script>
                                <?php endif; ?>
                            </div>
                            <!-- ============ the form section for the system will be here ========== -->
                            <div class="family-mental-health-questions">
                                <form action="" method="POST">
                                    <!-- ============== the div for the client name will be here ======== -->
                                    <div class="row mb-3 mt-3">
                                        <div class="col ms-3 me-3">
                                            <label for="Age" class="form-label-lg">
                                                <span class="fw-bold">Select client</span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                                <select name="client_name" id="" class="form-control form-control-lg">
                                                    <?php foreach($all_results as $single_record) {?>
                                                        <option value="<?php echo($single_record["client_name"]); ?>"><?php echo($single_record["client_name"]); ?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ============== the other controls will be here for the system ============= -->
                                    <div class="family-menta-health-table-1">
                                        <label for="ForQuestion" class="mt-3 ms-3">
                                            <span class="fw-bolder">
                                                Ever had a family member suffer from mental disorder ?
                                            </span>
                                        </label>
                                    </div>

                                    <div class="family-health-table">
                                        <div class="row ms-3 me-3">
                                            <div class="col">
                                                <div class="family-table-title-1">
                                                    <h1>condition</h1>
                                                </div>
                                                <div class="conditions-panel">
                                                    <p class="mt-3 lead">Anxiety</p>
                                                    <p class="mt-3 lead">Depression</p>
                                                    <p class="mt-3 lead">Domestic Violence</p>
                                                    <p class="mt-3 lead">Criminal Behaviour/Imprisonment</p>
                                                    <p class="mt-3 lead">Schizophrenia (Mental illness)</p>
                                                    <p class="mt-3 lead">Suicide</p>
                                                    <p class="mt-3 lead">Mental Handcap</p>
                                                    <p class="mt-3 lead">Substance Use</p>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="family-table-title-2">
                                                    <h1>yes/no</h1>
                                                </div>
                                                <div class="conditions-panel">
                                                    <div class="row mt-3">
                                                        <div class="col">
                                                            <!-- =============== the other radio button will be here ======== -->
                                                            <div class="form-check form-check-inline ms-3">
                                                                <input class="form-check-input" type="radio" name="anxiety" id="inlineRadio1" value="Yes">
                                                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                                                            </div>
                                                            
                                                            <!-- ============== the radio buttons will be here -->
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="anxiety" id="inlineRadio2" value="No">
                                                                <label class="form-check-label" for="inlineRadio2">No</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- ============= // =============== -->
                                                    <div class="row mt-3">
                                                        <div class="col">
                                                            <!-- =============== the other radio button will be here ======== -->
                                                            <div class="form-check form-check-inline ms-3">
                                                                <input class="form-check-input" type="radio" name="depression" id="inlineRadio1" value="Yes">
                                                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                                                            </div>
                                                            
                                                            <!-- ============== the radio buttons will be here -->
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="depression" id="inlineRadio2" value="No">
                                                                <label class="form-check-label" for="inlineRadio2">No</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- ============= // =============== -->
                                                    <div class="row mt-4">
                                                        <div class="col">
                                                            <!-- =============== the other radio button will be here ======== -->
                                                            <div class="form-check form-check-inline ms-3">
                                                                <input class="form-check-input" type="radio" name="domestic_violence" id="inlineRadio1" value="Yes">
                                                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                                                            </div>
                                                            
                                                            <!-- ============== the radio buttons will be here -->
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="domestic_violence" id="inlineRadio2" value="No">
                                                                <label class="form-check-label" for="inlineRadio2">No</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- ============= // =============== -->
                                                    <div class="row mt-4">
                                                        <div class="col">
                                                            <!-- =============== the other radio button will be here ======== -->
                                                            <div class="form-check form-check-inline ms-3">
                                                                <input class="form-check-input" type="radio" name="criminal_behaviour" id="inlineRadio1" value="Yes">
                                                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                                                            </div>
                                                            
                                                            <!-- ============== the radio buttons will be here -->
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="criminal_behaviour" id="inlineRadio2" value="No">
                                                                <label class="form-check-label" for="inlineRadio2">No</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- ============= // =============== -->
                                                    <div class="row mt-4">
                                                        <div class="col">
                                                            <!-- =============== the other radio button will be here ======== -->
                                                            <div class="form-check form-check-inline ms-3">
                                                                <input class="form-check-input" type="radio" name="schizophrenia" id="inlineRadio1" value="Yes">
                                                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                                                            </div>
                                                            
                                                            <!-- ============== the radio buttons will be here -->
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="schizophrenia" id="inlineRadio2" value="No">
                                                                <label class="form-check-label" for="inlineRadio2">No</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- ============= // =============== -->
                                                    <div class="row mt-3">
                                                        <div class="col">
                                                            <!-- =============== the other radio button will be here ======== -->
                                                            <div class="form-check form-check-inline ms-3">
                                                                <input class="form-check-input" type="radio" name="suicide" id="inlineRadio1" value="Yes">
                                                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                                                            </div>
                                                            
                                                            <!-- ============== the radio buttons will be here -->
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="suicide" id="inlineRadio2" value="No">
                                                                <label class="form-check-label" for="inlineRadio2">No</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- ============= // =============== -->
                                                    <div class="row mt-4">
                                                        <div class="col">
                                                            <!-- =============== the other radio button will be here ======== -->
                                                            <div class="form-check form-check-inline ms-3">
                                                                <input class="form-check-input" type="radio" name="mental_handcap" id="inlineRadio1" value="Yes">
                                                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                                                            </div>
                                                            
                                                            <!-- ============== the radio buttons will be here -->
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="mental_handcap" id="inlineRadio2" value="No">
                                                                <label class="form-check-label" for="inlineRadio2">No</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- ============= // =============== -->
                                                    <div class="row mt-4">
                                                        <div class="col">
                                                            <!-- =============== the other radio button will be here ======== -->
                                                            <div class="form-check form-check-inline ms-3">
                                                                <input class="form-check-input" type="radio" name="substance_use" id="inlineRadio1" value="Yes">
                                                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                                                            </div>
                                                            
                                                            <!-- ============== the radio buttons will be here -->
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="substance_use" id="inlineRadio2" value="No">
                                                                <label class="form-check-label" for="inlineRadio2">No</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="family-table-title-3">
                                                    <h1>which family member</h1>
                                                </div>
                                                <div class="input-fields">
                                                    <div class="col mb-2">
                                                        <div class="input-group">
                                                            <span class="input-group-text"><i class="bi bi-body-text"></i></span>
                                                            <input type="text" class="form-control form-control-sm" placeholder="family member..." name="anxiety_family_member">
                                                        </div>
                                                    </div>
                                                    <!-- =========== the second input-group will be here -->
                                                    <div class="col mb-2">
                                                        <div class="input-group">
                                                            <span class="input-group-text"><i class="bi bi-body-text"></i></span>
                                                            <input type="text" class="form-control form-control-sm" placeholder="family member..." name="depression_family_member">
                                                        </div>
                                                    </div>
                                                    <!-- =========== the second input-group will be here -->
                                                    <div class="col mb-2">
                                                        <div class="input-group">
                                                            <span class="input-group-text"><i class="bi bi-body-text"></i></span>
                                                            <input type="text" class="form-control form-control-sm" placeholder="family member..." name="domestic_violence_family_member">
                                                        </div>
                                                    </div>
                                                    <!-- =========== the second input-group will be here -->
                                                    <div class="col mb-2">
                                                        <div class="input-group">
                                                            <span class="input-group-text"><i class="bi bi-body-text"></i></span>
                                                            <input type="text" class="form-control form-control-sm" placeholder="family member..." name="criminal_behaviour_family_member">
                                                        </div>
                                                    </div>
                                                    <!-- =========== the second input-group will be here -->
                                                    <div class="col mb-2">
                                                        <div class="input-group">
                                                            <span class="input-group-text"><i class="bi bi-body-text"></i></span>
                                                            <input type="text" class="form-control form-control-sm" placeholder="family member..." name="schizophrenia_family_member">
                                                        </div>
                                                    </div>
                                                    <!-- =========== the second input-group will be here -->
                                                    <div class="col mt-2">
                                                        <div class="input-group">
                                                            <span class="input-group-text"><i class="bi bi-body-text"></i></span>
                                                            <input type="text" class="form-control form-control-sm" placeholder="family member..." name="suicide_family_member">
                                                        </div>
                                                    </div>
                                                    <!-- =========== the second input-group will be here -->
                                                    <div class="col mt-2">
                                                        <div class="input-group">
                                                            <span class="input-group-text"><i class="bi bi-body-text"></i></span>
                                                            <input type="text" class="form-control form-control-sm" placeholder="family member..." name="mental_handcap_family_member">
                                                        </div>
                                                    </div>
                                                    <!-- =========== the second input-group will be here -->
                                                    <div class="col mt-3">
                                                        <div class="input-group">
                                                            <span class="input-group-text"><i class="bi bi-body-text"></i></span>
                                                            <input type="text" class="form-control form-control-sm" placeholder="family member..." name="substance_family_member">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- =========== the column for the content will be here ====== -->
                                    </div>
                                    
                                    <!-- ============ the other controls will be here =========== -->
                                    <div class="row mb-3">
                                        <div class="col ms-3 me-3">
                                            <label for="ForSomethingGood">
                                                <span class="fw-bold">Have you ever heard things other people couldn't hear, such as voices in your head ?</span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-receipt"></i></span>
                                                <input type="text" name="voices" class="form-control form-control-lg">
                                            </div>
                                            <div class="error-message">
                                                <?php echo($all_errors["voices"]); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ============ the other controls will be here =========== -->
                                    <div class="row mb-3">
                                        <div class="col ms-3 me-3">
                                            <label for="ForSomethingGood">
                                                <span class="fw-bold">
                                                    Have you ever believed that people were spying on you, or that someone was 
                                                    plotting against you, or trying to hurt you ?
                                                </span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-rocket"></i></span>
                                                <input type="text" name="spying" class="form-control form-control-lg">
                                            </div>
                                            <div class="error-message">
                                                <?php echo($all_errors["spying"]); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ============ the other controls will be here =========== -->
                                    <div class="row mb-3">
                                        <div class="col ms-3 me-3">
                                            <label for="ForSomethingGood">
                                                <span class="fw-bold">
                                                    Have you ever had visions when you were awake or have you ever seen things other people couldn't see ?
                                                </span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-moon-stars"></i></span>
                                                <input type="text" name="visions" class="form-control form-control-lg">
                                            </div>
                                            <div class="error-message">
                                                <?php echo($all_errors["visions"]); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ============ the other controls will be here =========== -->
                                    <div class="row mb-3">
                                        <div class="col ms-3 me-3">
                                            <label for="ForSomethingGood">
                                                <span class="fw-bold">
                                                    In the past mont, did you do something repeatedly without being able to resist doing it ?
                                                    Examples: washing or cleaning excessively, counting or checking things over and over
                                                </span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-person-wheelchair"></i></span>
                                                <input type="text" name="behaviour" class="form-control form-control-lg">
                                            </div>
                                            <div class="error-message">
                                                <?php echo($all_errors["behaviour"]); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ============= the checkings will be will be here ========== -->
                                    <div class="row mb-3">
                                        <div class="col ms-3 me-3">
                                            <label for="Age" class="form-label-lg">
                                                <span class="fw-bold">
                                                    Are you currently in a romantic relationship/Married
                                                </span>
                                            </label>
                                            <!-- =============== the other radio button will be here ======== -->
                                            <div class="form-check form-check-inline ms-3">
                                                <input class="form-check-input" type="radio" name="relationsip" id="inlineRadio1" value="Yes">
                                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                                            </div>
                                            
                                            <!-- ============== the radio buttons will be here -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="relationsip" id="inlineRadio2" value="No">
                                                <label class="form-check-label" for="inlineRadio2">No</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col ms-3 me-3">
                                            <label for="Yes" class="form-label-lg">
                                                <span class="fw-bold">If yes, for how long ?</span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-body-text"></i></span>
                                                <textarea name="relationship_how_long" class="form-control form-control-lg text-start">

                                                </textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ============== the self rating section will be here ============= -->
                                    <div class="row mb-3">
                                        <div class="col ms-3 me-3">
                                            <label for="Yes" class="form-label-lg">
                                                <span class="fw-bold">On a scale of 1-10 (with 1 being exceptional), How wuld you rate your relationship/marriage ?</span>
                                            </label>
                                            <br>
                                            <!-- =============== the other radio button will be here ======== -->
                                            <div class="form-check form-check-inline ms-3">
                                                <input class="form-check-input" type="radio" name="rate_relationsip" id="inlineRadio1" value="1">
                                                <label class="form-check-label" for="inlineRadio1">1</label>
                                            </div>
                                            <!-- ============== the radio buttons will be here -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="rate_relationsip" id="inlineRadio2" value="2">
                                                <label class="form-check-label" for="inlineRadio2">2</label>
                                            </div>
                                            <!-- =============== the other radio button will be here ======== -->
                                            <div class="form-check form-check-inline ms-3">
                                                <input class="form-check-input" type="radio" name="rate_relationsip" id="inlineRadio1" value="3">
                                                <label class="form-check-label" for="inlineRadio1">3</label>
                                            </div>
                                            <!-- ============== the radio buttons will be here -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="rate_relationsip" id="inlineRadio2" value="4">
                                                <label class="form-check-label" for="inlineRadio2">4</label>
                                            </div>
                                            <!-- =============== the other radio button will be here ======== -->
                                            <div class="form-check form-check-inline ms-3">
                                                <input class="form-check-input" type="radio" name="rate_relationsip" id="inlineRadio1" value="5">
                                                <label class="form-check-label" for="inlineRadio1">5</label>
                                            </div>
                                            <!-- ============== the radio buttons will be here -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="rate_relationsip" id="inlineRadio2" value="6">
                                                <label class="form-check-label" for="inlineRadio2">6</label>
                                            </div>
                                            <!-- =============== the other radio button will be here ======== -->
                                            <div class="form-check form-check-inline ms-3">
                                                <input class="form-check-input" type="radio" name="rate_relationsip" id="inlineRadio1" value="7">
                                                <label class="form-check-label" for="inlineRadio1">7</label>
                                            </div>
                                            <!-- ============== the radio buttons will be here -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="rate_relationsip" id="inlineRadio2" value="8">
                                                <label class="form-check-label" for="inlineRadio2">8</label>
                                            </div>
                                            <!-- =============== the other radio button will be here ======== -->
                                            <div class="form-check form-check-inline ms-3">
                                                <input class="form-check-input" type="radio" name="rate_relationsip" id="inlineRadio1" value="9">
                                                <label class="form-check-label" for="inlineRadio1">9</label>
                                            </div>
                                            <!-- =============== the other radio button will be here ======== -->
                                            <div class="form-check form-check-inline ms-3">
                                                <input class="form-check-input" type="radio" name="rate_relationsip" id="inlineRadio1" value="10">
                                                <label class="form-check-label" for="inlineRadio1">10</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ============= the other controls will be down here =========== -->
                                    <div class="row mb-3">
                                        <div class="col ms-3 me-3">
                                            <label for="ForSomethingGood">
                                                <span class="fw-bold">
                                                    Do you still have unresolved issues from any previous relatiopship/Marriage
                                                </span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-layout-wtf"></i></span>
                                                <input type="text" name="unresolved_issues" class="form-control form-control-lg">
                                            </div>
                                            <div class="error-message">
                                                <?php echo($all_errors["unresolved_issues"]); ?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- ================== // ====================== // -->
                                    <div class="row mb-3">
                                        <div class="col ms-3 me-3">
                                            <label for="Yes" class="form-label-lg">
                                                <span class="fw-bold">If YES, what ?</span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-body-text"></i></span>
                                                <textarea name="unresolved_issues_how_long" id="" class="form-control form-control-lg"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ============= the other controls will be down here =========== -->
                                    <div class="row mb-3">
                                        <div class="col ms-3 me-3">
                                            <label for="ForSomethingGood">
                                                <span class="fw-bold">
                                                    What significant life changes or stressful events have you experienced ?
                                                </span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-life-preserver"></i></span>
                                                <input type="text" name="significant_life_changes" class="form-control form-control-lg">
                                            </div>
                                            <div class="error-message">
                                                <?php echo($all_errors["significant_life_changes"]); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ================== the other section for the page ========== -->
                                    <div class="row mb-3">
                                        <div class="col ms-3 me-3">
                                            <label for="Yes" class="form-label-lg">
                                                <span class="fw-bold">Are you employed/Studying ?</span>
                                            </label>
                                            <!-- =============== the other radio button will be here ======== -->
                                            <div class="form-check form-check-inline ms-3">
                                                <input class="form-check-input" type="radio" name="employed_studying" id="inlineRadio1" value="Yes">
                                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                                            </div>
                                            <!-- ============== the radio buttons will be here -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="employed_studying" id="inlineRadio2" value="No">
                                                <label class="form-check-label" for="inlineRadio2">No</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- =============== begining exeprience here -->
                                    <div class="row mb-3">
                                        <div class="col ms-3 me-3">
                                            <label for="Yes" class="form-label-lg">
                                                <span class="fw-bold">If YES, what is your current employment/study stituation like ?</span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-currency-dollar"></i></span>
                                                <textarea name="current_situation" id="" class="form-control form-control-lg"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- =============== begining exeprience here -->
                                    <div class="row mb-3">
                                        <div class="col ms-3 me-3">
                                            <label for="Yes" class="form-label-lg">
                                                <span class="fw-bold">Do you enjoy work/studies ? Is there anything stressful about your current work/school</span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-fire"></i></span>
                                                <textarea name="anything_stressful" id="" class="form-control form-control-lg text-start"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ================== the other section for the page ========== -->
                                    <div class="row mb-3">
                                        <div class="col ms-3 me-3">
                                            <label for="Yes" class="form-label-lg">
                                                <span class="fw-bold">Do you consider yourself religious ?</span>
                                            </label>
                                            <!-- =============== the other radio button will be here ======== -->
                                            <div class="form-check form-check-inline ms-3">
                                                <input class="form-check-input" type="radio" name="religion" id="inlineRadio1" value="Yes">
                                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                                            </div>
                                            <!-- ============== the radio buttons will be here -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="religion" id="inlineRadio2" value="No">
                                                <label class="form-check-label" for="inlineRadio2">No</label>
                                            </div>
                                        </div>
                                    </div>

                                     <!-- =============== begining exeprience here -->
                                     <div class="row mb-3">
                                        <div class="col ms-3 me-3">
                                            <label for="Yes" class="form-label-lg">
                                                <span class="fw-bold">If yes, describe your faith or belief/ involvement</span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-crosshair"></i></span>
                                                <textarea name="describe_faith" id="" class="form-control form-control-lg text-start"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ==================== // ===================== // -->
                                    <div class="row mb-3">
                                        <div class="col ms-3 me-3">
                                            <label for="ForSomethingGood">
                                                <span class="fw-bold">
                                                    How do you feel about yourself as a person on a scale of 1-10 ? 1 = don't like myself at all,
                                                    10 = like myself very much indeed
                                                </span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-calendar2-heart"></i></span>
                                                <input type="text" name="feel_about" class="form-control form-control-lg">
                                            </div>
                                            <div class="error-message">
                                                <?php echo($all_errors["feel_about"]); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ========================= // =============== // ================ // -->
                                    <div class="row mb-3">
                                        <div class="col ms-3 me-3">
                                            <label for="ForSomethingGood">
                                                <span class="fw-bold">
                                                    What do you consider to be some of your strengths ?
                                                </span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-hammer"></i></span>
                                                <input type="text" name="strengths" class="form-control form-control-lg">
                                            </div>
                                            <div class="error-message">
                                                <?php echo($all_errors["strengths"]); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ========================= // =============== // ================ // -->
                                    <div class="row mb-3">
                                        <div class="col ms-3 me-3">
                                            <label for="ForSomethingGood">
                                                <span class="fw-bold">
                                                    What do you consider to be some of your weaknesses ?
                                                </span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-moon"></i></span>
                                                <input type="text" name="weaknesses" class="form-control form-control-lg">
                                            </div>
                                            <div class="error-message">
                                                <?php echo($all_errors["weaknesses"]); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ========================= // =============== // ================ // -->
                                    <div class="row mb-3">
                                        <div class="col ms-3 me-3">
                                            <label for="ForSomethingGood">
                                                <span class="fw-bold">
                                                    What is your current living situation ? / Who else do you live with ?
                                                </span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-houses"></i></span>
                                                <input type="text" name="living_situation" class="form-control form-control-lg">
                                            </div>
                                            <div class="error-message">
                                                <?php echo($all_errors["living_situation"]); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- =============== begining exeprience here -->
                                    <div class="row mb-3">
                                        <div class="col ms-3 me-3">
                                            <label for="Yes" class="form-label-lg">
                                                <span class="fw-bold">
                                                    What would you like to accomplish out of your time in therapy ?
                                                </span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-archive"></i></span>
                                                <textarea name="accomplishment" id="" class="form-control form-control-lg text-start"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="save-session-button ms-3 mt-4">
                                        <input type="submit" class="btn btn-lg btn-success" value="save session" name="save_session">
                                    </div>
                                </form>
                                <!-- =============== the other main section will be here ============ -->

                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>