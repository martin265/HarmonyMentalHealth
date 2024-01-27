<?php

// ================== validating the input fields here ===============//
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
            <div class="container-xxl">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="administer-phq-9-page shadow-sm">
                            <div class="administer-title">
                                <h1>administer PHQ 9 Questions</h1>
                            </div>

                            <!-- =============== the form for the questions will be here ========== -->
                            <div class="question-phq-9-form">
                                <form action="administrator_administer_PHQ_9.php" method="POST">
                                    <!-- ==================== // ================== // -->
                                    <div class="row mb-3 mt-3">
                                        <div class="col ms-3 me-3">
                                            <label for="Age" class="form-label-lg">
                                                <span class="fw-bold">Select client</span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                                <select name="client_name" id="" class="form-control form-control-lg">
                                                    <option value=""></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ====================== // ====================// -->
                                    <div class="row mb-3">
                                        <div class="col ms-3 me-3">
                                            <label for="Age" class="form-label-lg">
                                                <span class="fw-bold">Have you ever had feelings or thoughts that you didn't want to live ?</span>
                                            </label>
                                            <!-- =============== the other radio button will be here ======== -->
                                            <div class="form-check form-check-inline ms-3">
                                                <input class="form-check-input" type="radio" name="feelings" id="inlineRadio1" value="Yes">
                                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                                            </div>
                                            <!-- ============== the radio buttons will be here -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="feelings" id="inlineRadio2" value="No">
                                                <label class="form-check-label" for="inlineRadio2">No</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ================= the other row for the controls will be here ========= -->
                                    <div class="row mb-3">
                                        <div class="col ms-3 me-3">
                                            <label for="Yes" class="form-label-lg">
                                                <span class="fw-bold">if YES, do you currently feel that you don't want to live ?</span>
                                            </label>
                                            <!-- =============== the other radio button will be here ======== -->
                                            <div class="form-check form-check-inline ms-3">
                                                <input class="form-check-input" type="radio" name="current_feelings" id="inlineRadio1" value="Yes">
                                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                                            </div>
                                            <!-- ============== the radio buttons will be here -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="current_feelings" id="inlineRadio2" value="No">
                                                <label class="form-check-label" for="inlineRadio2">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ======================= how often section will be here ========== -->
                                    <div class="row mb-3">
                                        <div class="col ms-3 me-3">
                                            <label for="Yes" class="form-label-lg">
                                                <span class="fw-bold">How often do you have these thoughts ?</span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-body-text"></i></span>
                                                <textarea name="how_often" class="form-control form-control-lg text-start">

                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ================== the rating section will be here ============= -->
                                    <div class="row mb-3">
                                        <div class="col ms-3 me-3">
                                            <label for="Yes" class="form-label-lg">
                                                <span class="fw-bold">On a scale of 1 to 10, (ten being strongest) how strong is your desire to kill yourself currently ?</span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-exclamation-diamond"></i></span>
                                                <input type="number" name="desire_to_kill" class="form-control form-control-lg" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ================= anything to stop yourself here ================  -->
                                    <div class="row mb-3">
                                        <div class="col ms-3 me-3">
                                            <label for="Yes" class="form-label-lg">
                                                <span class="fw-bold">Is there anything that would stop you from killing yourself ?</span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-sign-stop"></i></span>
                                                <input type="text" name="anything_to_stop" id="" class="form-control form-control-lg">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ====================== // the other controls will be here =========== -->
                                    <div class="row">
                                        <div class="col ms-3 me-3">
                                            <label for="Yes" class="form-label-lg">
                                                <span class="fw-bold">Have you ever tried to kill or harm yourself before ?</span>
                                            </label>
                                            <!-- =============== the other radio button will be here ======== -->
                                            <div class="form-check form-check-inline ms-3">
                                                <input class="form-check-input" type="radio" name="tried_to_kill" id="inlineRadio1" value="Yes">
                                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                                            </div>
                                            <!-- ============== the radio buttons will be here -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="tried_to_kill" id="inlineRadio2" value="No">
                                                <label class="form-check-label" for="inlineRadio2">No</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ======================= the last time control ============= -->
                                    <div class="row mb-3">
                                        <div class="col ms-3 me-3">
                                            <label for="Yes" class="form-label-lg">
                                                <span class="fw-bold">If YES, when was the last time? What happened ?</span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-calendar2-date"></i></span>
                                                <textarea name="last_time" id="" class="form-control form-control-lg"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ======================= the other control will be here ========== -->
                                    <div class="row mb-3">
                                        <div class="col ms-3 me-3">
                                            <label for="Yes" class="form-label-lg">
                                                <span class="fw-bold">Have you engaged in self injurious behaviour e.g. Slashing wrists ?</span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-clipboard2-pulse"></i></span>
                                                <input type="text" name="injurious_behaviour" class="form-control form-control-lg" placeholder="injurious behaviours...">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ================= the row for the panic attacks here ========= -->
                                    <div class="row mb-3">
                                        <div class="col ms-3 me-3">
                                            <label for="Yes" class="form-label-lg">
                                                <span class="fw-bold">Are you currently exeperiencing anxiety, panic attacks or have any phobias?</span>
                                            </label>
                                            <!-- =============== the other radio button will be here ======== -->
                                            <div class="form-check form-check-inline ms-3">
                                                <input class="form-check-input" type="radio" name="panic_attacks" id="inlineRadio1" value="Yes">
                                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                                            </div>
                                            <!-- ============== the radio buttons will be here -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="panic_attacks" id="inlineRadio2" value="No">
                                                <label class="form-check-label" for="inlineRadio2">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- =============== begining exeprience here -->
                                    <div class="row mb-3">
                                        <div class="col ms-3 me-3">
                                            <label for="Yes" class="form-label-lg">
                                                <span class="fw-bold">If YES, when did you begin exeperiencing this ?</span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-calendar-range"></i></span>
                                                <textarea name="begin_experience" id="" class="form-control form-control-lg"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ================== the worries section here ================== -->
                                    <div class="row mb-3">
                                        <div class="col ms-3 me-3">
                                            <label for="Yes" class="form-label-lg">
                                                <span class="fw-bold">What are the things that worry you the most ?</span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-heartbreak"></i></span>
                                                <textarea name="worries" id="" class="form-control form-control-lg"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="save-session-btn ms-3 mt-3">
                                        <input type="submit" value="save session" class="btn btn-lg btn-success" name="save_session">
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