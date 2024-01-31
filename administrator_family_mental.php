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
                                                <span></span>
                                                <input type="text" name="voices" class="form-control form-control-lg">
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
                                                <span></span>
                                                <input type="text" name="spying" class="form-control form-control-lg">
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
                                                <span></span>
                                                <input type="text" name="visions" class="form-control form-control-lg">
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
                                                <span></span>
                                                <input type="text" name="behaviour" class="form-control form-control-lg">
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
                                                <span></span>
                                                <input type="text" name="unresolved_issues" class="form-control form-control-lg">
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
                                                <span class="input-group-text"><i class="bi bi-calendar-range"></i></span>
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
                                                <span></span>
                                                <input type="text" name="significant_life_changes" class="form-control form-control-lg">
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
                                                <span class="input-group-text"><i class="bi bi-calendar-range"></i></span>
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
                                                <span class="input-group-text"><i class="bi bi-calendar-range"></i></span>
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
                                                <span class="input-group-text"><i class="bi bi-calendar-range"></i></span>
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
                                                <span></span>
                                                <input type="text" name="feel_about" class="form-control form-control-lg">
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
                                                <span></span>
                                                <input type="text" name="strengths" class="form-control form-control-lg">
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
                                                <span></span>
                                                <input type="text" name="weaknesses" class="form-control form-control-lg">
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
                                                <span></span>
                                                <input type="text" name="living_situation" class="form-control form-control-lg">
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
                                                <span class="input-group-text"></span>
                                                <textarea name="accomplishment" id="" class="form-control form-control-lg text-start"></textarea>
                                            </div>
                                        </div>
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