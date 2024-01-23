<?php
// including the connection here
include("Models/Client.php");
$connection = new Connection("localhost", "root", "", "harmonymentalhealth");
$connection->EstablishConnection();
$conn = $connection->get_connection();

// =========== the variables for the client table here ============ //
$client_name = "";
$date_intake = "";
$therapist = "";
$session_1 = "";
$session_2 = "";
$session_3 = "";
$session_4 = "";
$present_problem = "";
$previous_therapy_history = "";
$diagnosis = "";
$plan = "";
$patient_id = "";

$all_results = "";

// fetching the records in the database here
function FetchClientDetails($conn) {
    try {
         // the connection getter here 
        // getting the connection object here
        $sqlCommand = "SELECT * FROM PatientDetails";
        $results = mysqli_query($conn, $sqlCommand);
        // passing the details into an associative array 
        $all_results = mysqli_fetch_all($results, MYSQLI_ASSOC);
        // getting only the first name here
        return $all_results;
    } catch (Exception $ex) {
        print($ex);
    }
}

$all_results = FetchClientDetails($conn);

// =============== function to validate the attributes here ===========//
function ValidateInputs($data) {
    try {
        $data = trim($data);
        $data = htmlspecialchars($data);
        $data = stripslashes($data);

        return $data;
    }catch(Exception $ex) {
        print($ex);
    }
}

// ============== fuction to get the current client ID here ================== //
function FetchClientID($conn) {
    try {
        if (isset($_POST["save_details"])) {
            $client_name = mysqli_real_escape_string($conn, $_POST["client_name"]);
            $sqlCommand = "SELECT patient_id FROM PatientDetails WHERE first_name = '$client_name'";
            $results = mysqli_query($conn, $sqlCommand);
            // =========== fetching the patient id here ==========//
            $all_results = mysqli_fetch_all($results, MYSQLI_ASSOC);
            // ========== looping through the results ============= //
            foreach($all_results as $single_result) {
                return $single_result["patient_id"];
            }
        }
    } catch(Exception $ex) {
        // Handle exceptions here
        print($ex);
        return false;
    }
}


$patient_id = FetchClientID($conn);
print($patient_id);

// ================ the array that will hold all the errors here ===========//
$all_errors = array("client_name"=>"", "date_intake"=>"", "therapist"=>"",
"session_1"=>"", "session_2"=>"", "session_3"=>"", "session_4"=>"", "present_problem"=>"",
"previous_therapy_history"=>"", "diagnosis"=>"", "plan"=>"");

// ========= getting the values from the form here =========== //
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $client_name = ValidateInputs($_POST["client_name"]);
    $date_intake = ValidateInputs($_POST["date_intake"]);
    $therapist = ValidateInputs($_POST["therapist"]);
    $session_1 = ValidateInputs($_POST["session_1"]);
    $session_2 = ValidateInputs($_POST["session_2"]);
    $session_3 = ValidateInputs($_POST["session_3"]);
    $session_4 = ValidateInputs($_POST["session_4"]);
    $present_problem = ValidateInputs($_POST["present_problem"]);
    $previous_therapy_history = ValidateInputs($_POST["previous_therapy_history"]);
    $diagnosis = ValidateInputs($_POST["diagnosis"]);
    $plan = ValidateInputs($_POST["plan"]);

   
    if (isset($_POST["save_details"])) {
        // =================== checking if the fields are empty here ==========//
        if (empty($_POST["client_name"])) {
            $all_errors["client_name"] = "fill in the blanks";
        }
        else{
            if (!preg_match("/^[a-zA-Z-' ]*$/", $client_name)){
                $all_errors["client_name"] = "enter valid characters for client";
            }
        }
        // =================== checking if the fields are empty here ==========//
        if (empty($_POST["date_intake"])) {
            $all_errors["date_intake"] = "fill in the blanks";
        }
        else{
            if (preg_match("/^[a-zA-Z-' ]*$/", $date_intake)){
                $all_errors["date_intake"] = "enter valid characters for date";
            }
        }
        // =================== checking if the fields are empty here ==========//
        if (empty($_POST["therapist"])) {
            $all_errors["therapist"] = "fill in the blanks";
        }
        else{
            if (!preg_match("/^[a-zA-Z-' ]*$/", $therapist)){
                $all_errors["therapist"] = "enter valid characters...";
            }
        }
        // =================== checking if the fields are empty here ==========//
        if (empty($_POST["session_1"])) {
            $all_errors["session_1"] = "fill in the blanks";
        }
        else{
            if (!preg_match("/^[a-zA-Z-' ]*$/", $session_1)){
                $all_errors["session_1"] = "enter valid characters for the session";
            }
        }
        // =================== checking if the fields are empty here ==========//
        if (empty($_POST["session_2"])) {
            $all_errors["session_2"] = "fill in the blanks";
        }
        else{
            if (!preg_match("/^[a-zA-Z-' ]*$/", $session_2)){
                $all_errors["session_2"] = "enter valid characters...";
            }
        }
        // =================== checking if the fields are empty here ==========//
        if (empty($_POST["session_3"])) {
            $all_errors["session_3"] = "fill in the blanks";
        }
        else{
            if (!preg_match("/^[a-zA-Z-' ]*$/", $session_3)){
                $all_errors["session_3"] = "enter valid characters...";
            }
        }
        // =================== checking if the fields are empty here ==========//
        if (empty($_POST["session_4"])) {
            $all_errors["session_4"] = "fill in the blanks";
        }
        else{
            if (!preg_match("/^[a-zA-Z-' ]*$/", $session_4)){
                $all_errors["session_4"] = "enter valid characters...";
            }
        }
        // =================== checking if the fields are empty here ==========//
        if (empty($_POST["present_problem"])) {
            $all_errors["present_problem"] = "fill in the blanks";
        }
        else{
            if (!preg_match("/^[a-zA-Z-' ]*$/", $present_problem)){
                $all_errors["present_problem"] = "numbers are not allowed here";
            }
        }
        // =================== checking if the fields are empty here ==========//
        if (empty($_POST["previous_therapy_history"])) {
            $all_errors["previous_therapy_history"] = "fill in the blanks";
        }
        else{
            if (!preg_match("/^[a-zA-Z-' ]*$/", $previous_therapy_history)){
                $all_errors["previous_therapy_history"] = "enter valid characters...";
            }
        }
        // =================== checking if the fields are empty here ==========//
        if (empty($_POST["diagnosis"])) {
            $all_errors["diagnosis"] = "fill in the blanks";
        }
        else{
            if (!preg_match("/^[a-zA-Z-' ]*$/", $diagnosis)){
                $all_errors["diagnosis"] = "enter valid characters...";
            }
        }
        // =================== checking if the fields are empty here ==========//
        if (empty($_POST["plan"])) {
            $all_errors["plan"] = "fill in the blanks";
        }
        else{
            if (!preg_match("/^[a-zA-Z-' ]*$/", $plan)){
                $all_errors["plan"] = "enter valid characters...";
            }
        }

        // =========== checking if the whole form has some errors here ==========//
        if(!array_filter($all_errors)) {
            //  ============== function to save the records will go here ========= //
            $client_name = mysqli_real_escape_string($conn, $_POST["client_name"]);
            $date_intake = mysqli_real_escape_string($conn, $_POST["date_intake"]);
            $therapist = mysqli_real_escape_string($conn, $_POST["therapist"]);
            $session_1 = mysqli_real_escape_string($conn, $_POST["session_1"]);
            $session_2 = mysqli_real_escape_string($conn, $_POST["session_2"]);
            $session_3 = mysqli_real_escape_string($conn, $_POST["session_3"]);
            $session_4 = mysqli_real_escape_string($conn, $_POST["session_4"]);
            $present_problem = mysqli_real_escape_string($conn, $_POST["present_problem"]);
            $previous_therapy_history = mysqli_real_escape_string($conn, $_POST["previous_therapy_history"]);
            $diagnosis = mysqli_real_escape_string($conn, $_POST["diagnosis"]);
            $plan = mysqli_real_escape_string($conn, $_POST["plan"]);

            // ================== getting the object for the class here ================== //
            $client = new Client(
                $client_name, $date_intake, $therapist, $session_1, $session_2, $session_3, $session_4,
                $present_problem, $previous_therapy_history, $diagnosis, $plan
            );
            // =========== calling the function from the class here ============== //
            //$client->SaveClientDetails();
            
        }else {
            $error_message = "something is wrong please check the form again";
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
                        <div class="client-therapy-session">
                            <form action="administrator_therapy_sessions.php" method="POST">
                                <div class="row g-2 mb-2">
                                    <!-- getting the client name and the intake date here-->
                                    <div class="col me-3 mt-3 ms-3">
                                        <label for="ClientName" class="">Client Name</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-calendar2-heart-fill"></i></span>
                                            <select class="form-select form-control form-control-lg" aria-label="Default select example" name="client_name" id="client_name_select">
                                                <?php foreach ($all_results as $client_name) { ?>
                                                    <option value="<?php echo ($client_name["first_name"]); ?>"><?php echo ($client_name["first_name"]); ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="error-message text-danger">
                                            <?php echo $all_errors["client_name"]; ?>
                                        </div>
                                    </div>
                                    <!-- input for the form here -->
                                    <div class="col me-3 mt-3">
                                        <label for="DateOfIntake" class="">Date of Intake</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-calendar2-heart-fill"></i></span>
                                            <input type="text" class="form-control form-control-lg" id="date_of_intake_select" value="01/09/2024" name="date_intake">
                                        </div>
                                        <div class="error-message text-danger">
                                            <?php echo $all_errors["date_intake"]; ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- ================ // the section for the counsellor/therapist // -->
                                <div class="row mb-3">
                                    <div class="col ms-3 me-3">
                                        <label for="ForTherapist fw-bolder">Therapist</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-pencil"></i></span>
                                            <input type="text" class="form-control form-control-lg" placeholder="counsellor/Therapist" name="therapist">
                                        </div>
                                        <div class="error-message">
                                            <?php echo $all_errors["therapist"]; ?>
                                        </div>
                                    </div>
                                </div>

                                <!-- ================ the area for the sessions here ========== -->
                                <div class="sessions ms-3 fw-bolder">
                                    Sessions:
                                </div>
                                <div class="row mb-3">
                                    <!-- ======== the input fields here=========== -->
                                    <!-- input for the form here -->
                                    <div class="col ms-3">
                                        <label for="DateOfIntake" class="">Session 1</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-list-columns-reverse"></i></span>
                                            <input type="text" class="form-control form-control-lg" name="session_1">
                                        </div>
                                        <div class="error-message">
                                            <?php echo $all_errors["session_1"]; ?>
                                        </div>
                                    </div>
                                    <!--  -->
                                    <!-- input for the form here -->
                                    <div class="col">
                                        <label for="DateOfIntake" class="">Session 2</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-list-columns-reverse"></i></span>
                                            <input type="text" class="form-control form-control-lg" name="session_2">
                                        </div>
                                        <div class="error-message">
                                            <?php echo $all_errors["session_2"]; ?>
                                        </div>
                                    </div>
                                    <!--  -->
                                    <!-- input for the form here -->
                                    <div class="col">
                                        <label for="DateOfIntake" class="">Session 3</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-list-columns-reverse"></i></span>
                                            <input type="text" class="form-control form-control-lg" name="session_3">
                                        </div>
                                        <div class="error-message">
                                            <?php echo $all_errors["session_3"]; ?>
                                        </div>
                                    </div>
                                    <!--  -->
                                    <!-- input for the form here -->
                                    <div class="col me-3">
                                        <label for="DateOfIntake" class="">Session 4</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-list-columns-reverse"></i></span>
                                            <input type="text" class="form-control form-control-lg" name="session_4">
                                        </div>
                                        <div class="error-message">
                                            <?php echo $all_errors["session_4"]; ?>
                                        </div>
                                    </div>
                                    <!--  -->
                                </div>

                                <!-- =========== the row for the other part of the form -->
                                <div class="row mb-4">
                                    <div class="col ms-3 me-3">
                                        <label for="PresentProbles">Present Problem/Reason For Refrerral</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-brightness-high"></i></span>
                                            <textarea name="present_problem" id="" class="form-control form-control-lg">

                                            </textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- =========== the row for the other part of the form -->
                                <div class="row mb-4">
                                    <div class="col ms-3 me-3">
                                        <label for="PresentProbles">Previous Therepy History:</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-clock-history"></i></span>
                                            <textarea name="previous_therapy_history" id="" class="form-control form-control-lg">

                                            </textarea>
                                        </div>
                                        
                                    </div>
                                </div>

                                <!-- =========== the row for the other part of the form -->
                                <div class="row mb-4">
                                    <div class="col ms-3 me-3">
                                        <label for="PresentProbles">Diagnosis:</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-file-medical"></i></span>
                                            <textarea name="diagnosis" id="" class="form-control form-control-lg">

                                            </textarea>
                                        </div>

                                    </div>
                                </div>

                                <!-- =========== the row for the other part of the form -->
                                <div class="row mb-4 bottom-row">
                                    <div class="col ms-3 me-3">
                                        <label for="PresentProbles">Plan:</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-file-diff"></i></span>
                                            <textarea name="plan" id="" class="form-control form-control-lg">

                                            </textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="save-details-button mb-5 ms-3 mt-3">
                                   <button type="submit" class="btn btn-lg btn-success" name="save_details">save client details</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript script for dynamically updating Date of Intake options -->
    <!-- Your Datepicker Initialization Script -->
    <script type="text/javascript">
        $(document).ready(function () {
            // Initialize the datepicker
            $.fn.datepicker.defaults.format = "mm/dd/yyyy";
            $('#date').datepicker({
                autoclose: true
            });
        });
        // ============getting the current year for the student college
        $(document).ready(function () {
            // Initialize the datepicker
            $.fn.datepicker.defaults.format = "mm/dd/yyyy";
            $('#college_year').datepicker({
                autoclose: true
            });
        });
        // ============getting the signature date here
        $(document).ready(function () {
            // Initialize the datepicker
            $.fn.datepicker.defaults.format = "mm/dd/yyyy";
            $('#date_of_intake_select').datepicker({
                autoclose: true
            });
        });
        // ============getting the signature date here
        $(document).ready(function () {
            // Initialize the datepicker
            $.fn.datepicker.defaults.format = "mm/dd/yyyy";
            $('#GuardiansignatureDate').datepicker({
                autoclose: true
            });
        });
        // ============getting the signature date here
        $(document).ready(function () {
            // Initialize the datepicker
            $.fn.datepicker.defaults.format = "mm/dd/yyyy";
            $('#ReviewedsignatureDate').datepicker({
                autoclose: true
            });
        });
        // ============= the code for the input validations ===============//
    </script> 
</body>

</html>
