<?php
// ========= including the connection here ================= //
include("Models/Questions.php");
$connection = new Connection("localhost", "root", "", "harmonymentalhealth");
$connection->EstablishConnection();
$conn = $connection->get_connection();

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

// ============ getting the values from the form here =============== //
$client_name = "";
$prescription_medication = "";
$explanation = "";
$physical_health = "";
$chronic_conditions = "";
$chronic_condition_explanation = "";
$current_health_problems = "";
$sleeping_habits = "";
$sleeping_problems = "";
$recurrent_dreams = "";
$general_exercise = "";
$exercise_type = "";
$overwhelming_sadness = "";
$how_long = "";

// ============ the array for the errors will be here =============== //
$all_errors = array(
    "client_name"=>"", "exercise_type"=>"", "general_exercise"=>""
);
// =========== validating the values here ============== //
function ValidateInputs($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

// =============== getting the inputs from the form here ===========//
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $client_name = ValidateInputs($_POST["client_name"]);
    $selectedClientName = isset($_POST["client_name"]) ? $_POST["client_name"] : "";

    if (isset($_POST["save_session"])) {
        // ============ validations here ============ //
        if (empty($_POST["client_name"])) {
            $all_errors["client_name"] = "fill in the blanks";
        }
        else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $client_name)) {
                $all_errors["client_name"] = "provide valid characters";
            }
        }
        // ================= // ===================== //
        if (empty($_POST["general_exercise"])) {
            $all_errors["general_exercise"] = "fill in the blanks";
        }
        else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $general_exercise)) {
                $all_errors["general_exercise"] = "provide valid numbers";
            }
        }
        // ===================== //===================== //
        if (empty($_POST["exercise_type"])) {
            $all_errors["exercise_type"] = "fill in the blanks";
        }
        else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $exercise_type)) {
                $all_errors["exercise_type"] = "provide valid characters";
            }
        }

        // =============== checking the form for any errors ========== //
        if (!array_filter($all_errors)) {
            // =========== getting all the values from the form here ============= //
            $client_name = mysqli_real_escape_string($conn, $_POST["client_name"]);
            $prescription_medication = mysqli_real_escape_string($conn, $_POST["prescription_medication"]);
            $explanation = mysqli_real_escape_string($conn, $_POST["explanation"]);
            $physical_health = mysqli_real_escape_string($conn, $_POST["physical_health"]);
            $chronic_conditions = mysqli_real_escape_string($conn, $_POST["chronic_conditions"]);
            $chronic_condition_explanation = mysqli_real_escape_string($conn, $_POST["chronic_condition_explanation"]);
            $current_health_problems = mysqli_real_escape_string($conn, $_POST["current_health_problems"]);
            $sleeping_habits = mysqli_real_escape_string($conn, $_POST["sleeping_habits"]);
            $sleeping_problems = mysqli_real_escape_string($conn, $_POST["sleeping_problems"]);
            $recurrent_dreams = mysqli_real_escape_string($conn, $_POST["recurrent_dreams"]);
            $general_exercise = mysqli_real_escape_string($conn, $_POST["general_exercise"]);
            $exercise_type = mysqli_real_escape_string($conn, $_POST["exercise_type"]);
            $overwhelming_sadness = mysqli_real_escape_string($conn, $_POST["overwhelming_sadness"]);
            $how_long = mysqli_real_escape_string($conn, $_POST["how_long"]);
            // ============== saving the records to the database will be here =============== //
            $question = new Question(
                $prescription_medication, $explanation, $physical_health, $chronic_conditions,
                $chronic_condition_explanation, $current_health_problems, $sleeping_habits,
                $sleeping_problems,  $recurrent_dreams, $general_exercise, $exercise_type,
                $overwhelming_sadness, $how_long
            );

            // =============== calling the function to save the details here =========== //
            $question->SaveQuestionDetails($client_name, $client_id);
            print("saved successfully");

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
            <!-- all the content will be here  -->
            <div class="container-xxl">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="general-health-question-panel shadow-sm">
                            <div class="page-title">
                                <h1>general and mental health information</h1>
                            </div>

                            
                            <!-- ============ the form for the details will be here ========= -->
                            <div class="questions-page">
                                <form action="administrator_general_mental_health.php" method="POST">
                                    <!-- ================== getting the client here for the  -->
                                    <div class="row mb-3">
                                        <div class="col ms-3 me-3">
                                            <label for="Age" class="form-label-lg">
                                                <span class="fw-bold">Select client name</span>
                                            </label>
                                            <div class="input-group">
                                                <select name="client_name" id="" class="form-control form-control-lg">
                                                    <?php foreach($all_results as $single_record) {?>
                                                        <option value="<?php echo($single_record["client_name"]); ?>"><?php echo($single_record["client_name"]); ?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                            <!-- ============ the div to show the errors will be here -->
                                            <div class="error-message">
                                                <?php echo($all_errors["client_name"]); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- =========== the input fields for the form will be here === -->
                                    <div class="row">
                                        <div class="col ms-3">
                                            <label for="Age" class="form-label-lg">
                                                <span class="fw-bold">Are you currently taking any prescription medication ?</span>
                                            </label>
                                            <!-- =============== the other radio button will be here ======== -->
                                            <div class="form-check form-check-inline ms-3">
                                                <input class="form-check-input" type="radio" name="prescription_medication" id="inlineRadio1" value="Yes">
                                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                                            </div>
                                            <!-- ============== the radio buttons will be here -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="prescription_medication" id="inlineRadio2" value="No">
                                                <label class="form-check-label" for="inlineRadio2">No</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ============ the other control will be here ================= -->
                                    <div class="row">
                                        <div class="col ms-3 me-3 explanation">
                                            <label for="Age" class="form-label-lg">
                                                <span class="fw-bold">If yes, Which ones ?</span>
                                            </label>
                                            <textarea name="explanation" class="form-control form-control-lg text-start">

                                            </textarea>
                                            <!-- ============ the error message will be shown here ========= -->
                                        </div>
                                    </div>
                                    <!-- ============== the other row will be here ========== -->
                                    <!--  =================// the control for the marital status here ============= -->
                                    <div class="row g-2 mb-3 mt-3">
                                        <div class="col ms-3">
                                            <label for="Age" class="form-label-lg">
                                                <span class="fw-bold">How would you rate your physical health ?</span>
                                            </label>
                                            <div class="input-group">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="physical_health" id="inlineRadio1" value="Poor">
                                                    <label class="form-check-label" for="inlineRadio1">Poor</label>
                                                </div>
                                                <!--  -->
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="physical_health" id="inlineRadio1" value="Unsatisfactory">
                                                    <label class="form-check-label" for="inlineRadio1">Unsatisfactory</label>
                                                </div>
                                                <!--  -->
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="physical_health" id="inlineRadio1" value="Satisfactory">
                                                    <label class="form-check-label" for="inlineRadio1">Satisfactory</label>
                                                </div>
                                                <!--  -->
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="physical_health" id="inlineRadio1" value="Good">
                                                    <label class="form-check-label" for="inlineRadio1">Good</label>
                                                </div>
                                                <!--  -->
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="physical_health" id="inlineRadio1" value="Very Good">
                                                    <label class="form-check-label" for="inlineRadio1">Very Good</label>
                                                </div>
                                                <!--  -->
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="physical_health" id="inlineRadio1" value="Excellent">
                                                    <label class="form-check-label" for="inlineRadio1">Excellent</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ================ the other controls will be here =========== -->
                                    <!--  =================// the control for the marital status here ============= -->
                                    <div class="row g-2 mb-3 mt-3">
                                        <div class="col ms-3">
                                            <label for="Age" class="form-label-lg">
                                                <span class="fw-bold">Any Chronic Conditions ?</span>
                                            </label>
                                            <!-- =============== the other radio button will be here ======== -->
                                            <div class="form-check form-check-inline ms-3">
                                                <input class="form-check-input" type="radio" name="chronic_conditions" id="inlineRadio1" value="Yes">
                                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                                            </div>
                                            <!-- ============== the radio buttons will be here -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="chronic_conditions" id="inlineRadio2" value="No">
                                                <label class="form-check-label" for="inlineRadio2">No</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- =============== for the second explanation ============ -->
                                    <div class="row mb-3 mt-3">
                                        <div class="col ms-3 me-3">
                                            <label for="Age" class="form-label-lg">
                                                <span class="fw-bold">If yes, Which ?</span>
                                            </label>
                                            <textarea name="chronic_condition_explanation" class="form-control form-control-lg text-start">

                                            </textarea>
                                        </div>
                                    </div>

                                    <!-- ================ current problems will be here ============= -->
                                    <div class="row">
                                        <div class="col ms-3 me-3">
                                            <label for="Age" class="form-label-lg">
                                                <span class="fw-bold">Are there any specif health problems you are currently exeperiencing ?</span>
                                            </label>
                                            <textarea name="current_health_problems" id="" class="form-control form-control-lg text-start">

                                            </textarea>
                                        </div>
                                    </div>
                                    <!--  =================// the control for the marital status here ============= -->
                                    <div class="row g-2 mb-3 mt-3">
                                        <div class="col ms-3">
                                            <label for="Age" class="form-label-lg">
                                                <span class="fw-bold">How would you rate your sleeping habits (Please circle one)</span>
                                            </label>
                                            <div class="input-group">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="sleeping_habits" id="inlineRadio1" value="Poor">
                                                    <label class="form-check-label" for="inlineRadio1">Poor</label>
                                                </div>
                                                <!--  -->
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="sleeping_habits" id="inlineRadio1" value="Unsatisfactory">
                                                    <label class="form-check-label" for="inlineRadio1">Unsatisfactory</label>
                                                </div>
                                                <!--  -->
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="sleeping_habits" id="inlineRadio1" value="Satisfactory">
                                                    <label class="form-check-label" for="inlineRadio1">Satisfactory</label>
                                                </div>
                                                <!--  -->
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="sleeping_habits" id="inlineRadio1" value="Good">
                                                    <label class="form-check-label" for="inlineRadio1">Good</label>
                                                </div>
                                                <!--  -->
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="sleeping_habits" id="inlineRadio1" value="Very Good">
                                                    <label class="form-check-label" for="inlineRadio1">Very Good</label>
                                                </div>
                                                <!--  -->
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="sleeping_habits" id="inlineRadio1" value="Excellent">
                                                    <label class="form-check-label" for="inlineRadio1">Excellent</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ================ current problems will be here ============= -->
                                    <div class="row mb-3">
                                        <div class="col ms-3 me-3">
                                            <label for="Age" class="form-label-lg">
                                                <span class="fw-bold">Please describe any specific sleeping problems you are currently exeperiencing:</span>
                                            </label>
                                            <textarea name="sleeping_problems" id="" class="form-control form-control-lg text-start">

                                            </textarea>
                                        </div>
                                    </div>

                                    <!-- ================ current problems will be here ============= -->
                                    <div class="row mb-3">
                                        <!-- want to take this opportunity to tank you My Father and everything Lord Jesus Christ for everything== -->
                                        <div class="col ms-3 me-3">
                                            <label for="Dreams" class="form-label-lg">
                                                <span class="fw-bold">Any recurrent/Vivid dreams ?</span>
                                            </label>
                                            <textarea name="recurrent_dreams" id="" class="form-control form-control-lg text-start">

                                            </textarea>
                                            <!-- ============ the error message will be shown here ========= -->
                                        </div>
                                    </div>
                                    <!-- ============== the exercide part of the project ====== -->
                                    <div class="row mb-3">
                                        <div class="col ms-3 me-3">
                                            <label for="Dreams" class="form-label-lg">
                                                <span class="fw-bold">How many times per week do you generally exercise ?</span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-thermometer"></i></span>
                                                <input type="text" class="form-control form-control-lg" placeholder="exercise per week" name="general_exercise">
                                            </div>
                                            <!-- ============ the error message will be shown here ========= -->
                                            <!-- ============ the div to show the errors will be here -->
                                            <div class="error-message">
                                                <?php echo($all_errors["general_exercise"]); ?>
                                            </div>
                                        </div>
                                    </div>
                                     <!-- ============== the exercide part of the project ====== -->
                                     <div class="row mb-3">
                                        <div class="col ms-3 me-3">
                                            <label for="Dreams" class="form-label-lg">
                                                <span class="fw-bold">What types of exercise do you partcipate in ?</span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-flower3"></i></span>
                                                <input type="text" class="form-control form-control-lg" placeholder="exercise type" name="exercise_type">
                                            </div>
                                            <!-- ============ the error message will be shown here ========= -->
                                            <!-- ============ the div to show the errors will be here -->
                                            <div class="error-message">
                                                <?php echo($all_errors["exercise_type"]); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ================ the other controls will be here =========== -->
                                    <!--  =================// the control for the marital status here ============= -->
                                    <div class="row g-2 mt-3">
                                        <div class="col ms-3">
                                            <label for="Age" class="form-label-lg">
                                                <span class="fw-bold">Are you currently exeperiencing sadness, grief or depression ?</span>
                                            </label>
                                            <!-- =============== the other radio button will be here ======== -->
                                            <div class="form-check form-check-inline ms-3">
                                                <input class="form-check-input" type="radio" name="overwhelming_sadness" id="inlineRadio1" value="Yes">
                                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                                            </div>
                                            <!-- ============== the radio buttons will be here -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="overwhelming_sadness" id="inlineRadio2" value="No">
                                                <label class="form-check-label" for="inlineRadio2">No</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- =============== for the second explanation ============ -->
                                    <div class="row mb-3 mt-3">
                                        <div class="col ms-3 me-3">
                                            <label for="Age" class="form-label-lg">
                                                <span class="fw-bold">If yes, for approximately how long ?</span>
                                            </label>
                                            <textarea name="how_long" class="form-control form-control-lg text-start">

                                            </textarea>
                                            <!-- ============ the error message will be shown here ========= -->
                                        </div>
                                    </div>

                                    <div class="save-details-btn ms-3 mb-5">
                                        <!-- ================ the div for the button will be here to save the records ======== -->
                                        <input type="submit" value="save session" name="save_session" class="btn btn-lg btn-success">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>