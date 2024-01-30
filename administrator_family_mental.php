<?php
include("Models/PHQ9.php");
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

// =================== validating the inputs here ================= //
function ValidateInputs($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
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

                                        <div class="row mt-3">
                                            <div class="col ms-3">
                                                <span class="fw-bold">Condition</span>
                                                <p class="lead mt-3">Anxiety</p>
                                                <p class="lead">Depression</p>
                                                <p class="lead">Domestic Violence</p>
                                                <p class="lead">Criminal Behaviour/Imprisonment</p>
                                                <p class="lead">Schizophrenia (Mental illness)</p>
                                                <p class="lead">Suicide Attempts</p>
                                                <p class="lead">Mental Handcap</p>
                                                <p class="lead">Substance Use</p>
                                            </div>
                                            <div class="col">
                                                <span class="fw-bold ms-5">YES/NO</span>
                                                <p class="mb-3">
                                                    <div class="row">
                                                        <div class="col">
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
                                                </p>

                                                <p class="mb-3">
                                                    <div class="row">
                                                        <div class="col">
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
                                                </p>
                                                <p class="mb-3">
                                                    <div class="row">
                                                        <div class="col">
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
                                                </p>
                                                <!-- =============== // ================== -->
                                                <p class="mb-3">
                                                    <div class="row">
                                                        <div class="col">
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
                                                </p>
                                                <!-- ================== // =============== -->
                                                <p class="mb-3">
                                                    <div class="row">
                                                        <div class="col">
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
                                                </p>
                                                <!-- ==================== //==================== // -->
                                                <p >
                                                    <div class="row">
                                                        <div class="col">
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
                                                </p>
                                            </div>
                                            <div class="col">
                                                <p>1</p>
                                                <p>1</p>
                                                <p>1</p>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- =============== the other main section will be here ============ -->

                             </div>
                             <!-- =============== the other section will be here ============= -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>