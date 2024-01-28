<?php


// =============== validating the input fields here ================ //
$short_tempered = "";
$emotions = "";
$type_of_drugs = "";
$when = "";
$where = "";
$what_type = "";
$how_long = "";
$addicted = "";
$concentration = "";
$memory = "";

// =================== validating the inputs here ================= //
function ValidateInputs($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}
// =========== arrsy for the errors ================= //
$all_errors = array("short_tempered"=>"", "emotions"=>"", "type_of_drugs"=>"",
"when"=>"", "where"=>"", "what_type"=>"", "how_long"=>"", "addicted"=>"", "concentration"=>"",
"memory"=>"");
// ============= getting the inputs from the form here ============= //
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $short_tempered = ValidateInputs($_POST["short_tempered"]);
    $emotions = ValidateInputs($_POST["emotions"]);
    $type_of_drugs = ValidateInputs($_POST["type_of_drugs"]);
    $when = ValidateInputs($_POST["when"]);
    $where = ValidateInputs($_POST["where"]);
    $what_type = ValidateInputs($_POST["what_type"]);
    $how_long = ValidateInputs($_POST["how_long"]);
    $addicted = ValidateInputs($_POST["addicted"]);
    $concentration = ValidateInputs($_POST["concentration"]);
    $memory = ValidateInputs($_POST["memory"]);

    // =============== checking if the inputs are empty here ============= //
    if (isset($_POST["save_session"])) {
        
        // ============== checking if they are empty =============== //
        if (empty($_POST["short_tempered"])) {
            $all_errors["short_tempered"] = "fill in the blanks please";
        }
        else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $short_tempered)) {
                $all_errors["short_tempered"] = "provide valid characters please";
            }
        }
        // ================ the other validations will be here ================= //

        // ============== checking if they are empty =============== //
        if (empty($_POST["emotions"])) {
            $all_errors["emotions"] = "fill in the blanks please";
        }
        else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $emotions)) {
                $all_errors["emotions"] = "provide valid characters please";
            }
        }
        // ================ the other validations will be here ================= //
        
        // ============== checking if they are empty =============== //
        if (empty($_POST["type_of_drugs"])) {
            $all_errors["type_of_drugs"] = "fill in the blanks please";
        }
        else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $type_of_drugs)) {
                $all_errors["type_of_drugs"] = "provide valid characters please";
            }
        }
        // ================ the other validations will be here ================= //
        

        // ============== checking if they are empty =============== //
        if (empty($_POST["when"])) {
            $all_errors["when"] = "fill in the blanks please";
        }
        else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $when)) {
                $all_errors["when"] = "provide valid characters please";
            }
        }
        // ================ the other validations will be here ================= //
        

        // ============== checking if they are empty =============== //
        if (empty($_POST["where"])) {
            $all_errors["where"] = "fill in the blanks please";
        }
        else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $where)) {
                $all_errors["where"] = "provide valid characters please";
            }
        }
        // ================ the other validations will be here ================= //
        

        // ============== checking if they are empty =============== //
        if (empty($_POST["what_type"])) {
            $all_errors["what_type"] = "fill in the blanks please";
        }
        else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $what_type)) {
                $all_errors["what_type"] = "provide valid characters please";
            }
        }
        // ================ the other validations will be here ================= //
        

        // ============== checking if they are empty =============== //
        if (empty($_POST["how_long"])) {
            $all_errors["how_long"] = "fill in the blanks please";
        }
        else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $how_long)) {
                $all_errors["how_long"] = "provide valid characters please";
            }
        }
        // ================ the other validations will be here ================= //
        

        // ============== checking if they are empty =============== //
        if (empty($_POST["addicted"])) {
            $all_errors["addicted"] = "fill in the blanks please";
        }
        else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $addicted)) {
                $all_errors["addicted"] = "provide valid characters please";
            }
        }
        // ================ the other validations will be here ================= //
        
        // ============== checking if they are empty =============== //
        if (empty($_POST["concentration"])) {
            $all_errors["concentration"] = "fill in the blanks please";
        }
        else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $concentration)) {
                $all_errors["concentration"] = "provide valid characters please";
            }
        }
        // ================ the other validations will be here ================= //
        
        // ============== checking if they are empty =============== //
        if (empty($_POST["memory"])) {
            $all_errors["memory"] = "fill in the blanks please";
        }
        else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $memory)) {
                $all_errors["memory"] = "provide valid characters please";
            }
        }
        // ================ the other validations will be here ================= //
        

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
                        <div class="administer_GAD_7-page">
                            <div class="administer-header-title">
                                <h1>administer GAD 7 questions</h1>
                            </div>

                            <!-- ============= the form will be here for the controls ===== -->
                            <div class="administer-gad-7-form">
                                <form action="" method="POST">
                                    <div class="row mb-3">
                                        <div class="col ms-3 me-3">
                                            <label for="ForShorttempred">
                                                <span class="fw-bold">
                                                    Would you say you get angry easily?/ Are you short tempered ?                                               </span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text"></span>
                                                <input type="text" name="short_tempered" class="form-control form-control-lg" placeholder="are you short tempered...">
                                            </div>
                                            <!-- ============= the error will be shown here ======== -->
                                            <div class="error-message">
                                                <?php echo($all_errors["short_tempered"]); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- =============== the section for the emotions here ============ -->
                                    <div class="row mb-3">
                                        <div class="col ms-3 me-3">
                                            <label for="ForShorttempred">
                                                <span class="fw-bold">
                                                    Do you easily express your emotions ?                             
                                                </span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text"></span>
                                                <input type="text" name="emotions" class="form-control form-control-lg" placeholder="do you express your emotions...">
                                            </div>
                                            <!-- ============= the error will be shown here ======== -->
                                            <div class="error-message">
                                                <?php echo($all_errors["emotions"]); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ================ the section for the alcahol drinking here ============ -->
                                    <div class="row mb-3">
                                        <div class="col ms-3 me-3">
                                            <label for="Age" class="form-label-lg">
                                                <span class="fw-bold">Do you drink alcohol more than once a week ?</span>
                                            </label>
                                            <!-- =============== the other radio button will be here ======== -->
                                            <div class="form-check form-check-inline ms-3">
                                                <input class="form-check-input" type="radio" name="alcohol_drinking" id="inlineRadio1" value="Yes">
                                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                                            </div>
                                            <!-- ============== the radio buttons will be here -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="alcohol_drinking" id="inlineRadio2" value="No">
                                                <label class="form-check-label" for="inlineRadio2">No</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- =============== how often section will be here ============== -->
                                    <div class="row mb-3">
                                        <div class="col ms-3 me-3">
                                            <label for="Yes" class="form-label-lg">
                                                <span class="fw-bold">if YES, How often ?</span>
                                            </label>
                                            <!-- =============== the other radio button will be here ======== -->
                                            <div class="form-check form-check-inline ms-3">
                                                <input class="form-check-input" type="radio" name="how_often" id="inlineRadio1" value="Daily">
                                                <label class="form-check-label" for="inlineRadio1">Daily</label>
                                            </div>
                                            <!-- ============== the radio buttons will be here -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="how_often" id="inlineRadio2" value="Weekly">
                                                <label class="form-check-label" for="inlineRadio2">Weekly</label>
                                            </div>
                                            <!-- ============== the radio buttons will be here -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="how_often" id="inlineRadio2" value="Monthly">
                                                <label class="form-check-label" for="inlineRadio2">Monthly</label>
                                            </div>
                                            <!-- ============== the radio buttons will be here -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="how_often" id="inlineRadio2" value="Infrequently">
                                                <label class="form-check-label" for="inlineRadio2">Infrequently</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ===================== the use of drugs here ====================-->
                                    <div class="row mb-3">
                                        <div class="col ms-3 me-3">
                                            <label for="Age" class="form-label-lg">
                                                <span class="fw-bold">Do you engage in recreational drug use ?</span>
                                            </label>
                                            <!-- =============== the other radio button will be here ======== -->
                                            <div class="form-check form-check-inline ms-3">
                                                <input class="form-check-input" type="radio" name="recreational_drugs" id="inlineRadio1" value="Yes">
                                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                                            </div>
                                            <!-- ============== the radio buttons will be here -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="recreational_drugs" id="inlineRadio2" value="No">
                                                <label class="form-check-label" for="inlineRadio2">No</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ================== recreationa drugs how often here ============= -->
                                    <div class="row mb-3">
                                        <div class="col ms-3 me-3">
                                            <label for="Yes" class="form-label-lg">
                                                <span class="fw-bold">if YES, How often ?</span>
                                            </label>
                                            <!-- =============== the other radio button will be here ======== -->
                                            <div class="form-check form-check-inline ms-3">
                                                <input class="form-check-input" type="radio" name="recreation_how_often" id="inlineRadio1" value="Daily">
                                                <label class="form-check-label" for="inlineRadio1">Daily</label>
                                            </div>
                                            <!-- ============== the radio buttons will be here -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="recreation_how_often" id="inlineRadio2" value="Weekly">
                                                <label class="form-check-label" for="inlineRadio2">Weekly</label>
                                            </div>
                                            <!-- ============== the radio buttons will be here -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="recreation_how_often" id="inlineRadio2" value="Monthly">
                                                <label class="form-check-label" for="inlineRadio2">Monthly</label>
                                            </div>
                                            <!-- ============== the radio buttons will be here -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="recreation_how_often" id="inlineRadio2" value="Infrequently">
                                                <label class="form-check-label" for="inlineRadio2">Infrequently</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ================ what type of drugs do you take =========== -->
                                    <div class="row mb-3">
                                        <div class="col ms-3 me-3">
                                            <label for="ForShorttempred">
                                                <span class="fw-bold">
                                                    Which drugs do you use ?                                               </span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text"></span>
                                                <input type="text" name="type_of_drugs" class="form-control form-control-lg" placeholder="drugs you use...">
                                            </div>
                                            <!-- ============= the error will be shown here ======== -->
                                            <div class="error-message">
                                                <?php echo($all_errors["type_of_drugs"]); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ================= CAGE questions section here =========== -->
                                    <div class="cage-questions-section">
                                        <h1>cage questions</h1>
                                    </div>
                                    <!-- ============ CAGE SECTION HERE ============== -->
                                    <div class="row mb-3">
                                        <div class="col ms-3">
                                            <label for="ForShorttempred">
                                                <span class="fw-bold me-5">
                                                    C - Ever try to Cut Back on your drinking or grug use ?
                                                </span>
                                            </label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="cage_questions" id="inlineRadio2" value="Cut Back">
                                                <label class="form-check-label" for="inlineRadio2">Cut Back</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ===================== // ======================= // -->
                                    <div class="row mb-3">
                                        <div class="col ms-3">
                                            <label for="ForShorttempred">
                                                <span class="fw-bold me-5">
                                                    A - Ever been Annoyed by anyone about your drinking or drug use ?
                                                </span>
                                            </label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="cage_questions" id="inlineRadio2" value="Annoyed">
                                                <label class="form-check-label" for="inlineRadio2">Annoyed</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ===================== // ======================= // -->
                                    <div class="row mb-3">
                                        <div class="col ms-3">
                                            <label for="ForShorttempred">
                                                <span class="fw-bold me-5">
                                                    G - Ever felt Guilty or ashamed about your drinking or drug use ?
                                                </span>
                                            </label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="cage_questions" id="inlineRadio2" value="Guilty">
                                                <label class="form-check-label" for="inlineRadio2">Guilty</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ===================== // ======================= // -->
                                    <div class="row mb-3">
                                        <div class="col ms-3">
                                            <label for="ForShorttempred">
                                                <span class="fw-bold me-5">
                                                    E - Ever had an 'Eye-opener' or used alcohol or drugs in the morning ?
                                                </span>
                                            </label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="cage_questions" id="inlineRadio2" value="Eye-opener">
                                                <label class="form-check-label" for="inlineRadio2">Eye-opener</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ===================== the use of drugs here ====================-->
                                    <div class="row mb-3">
                                        <div class="col ms-3 me-3">
                                            <label for="Age" class="form-label-lg">
                                                <span class="fw-bold">Have you sought help before for any alcohol/drug issue ?</span>
                                            </label>
                                            <!-- =============== the other radio button will be here ======== -->
                                            <div class="form-check form-check-inline ms-3">
                                                <input class="form-check-input" type="radio" name="help" id="inlineRadio1" value="Yes">
                                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                                            </div>
                                            <!-- ============== the radio buttons will be here -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="help" id="inlineRadio2" value="No">
                                                <label class="form-check-label" for="inlineRadio2">No</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- =============== the section for the emotions here ============ -->
                                    <div class="row mb-3">
                                        <div class="col ms-3 me-3">
                                            <label for="ForShorttempred">
                                                <span class="fw-bold">
                                                    If so, When ?                             
                                                </span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text"></span>
                                                <input type="text" name="when" class="form-control form-control-lg" placeholder="when...">
                                            </div>
                                            <!-- ============= the error will be shown here ======== -->
                                            <div class="error-message">
                                                <?php echo($all_errors["when"]); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- =============== the section for the emotions here ============ -->
                                    <div class="row mb-3">
                                        <div class="col ms-3 me-3">
                                            <label for="ForShorttempred">
                                                <span class="fw-bold">
                                                    If so Where ?                             
                                                </span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text"></span>
                                                <input type="text" name="where" class="form-control form-control-lg" placeholder="where...">
                                            </div>
                                            <!-- ============= the error will be shown here ======== -->
                                            <div class="error-message">
                                                <?php echo($all_errors["where"]); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ==================== gamble section here ============== -->

                                    <!-- ===================== the use of drugs here ====================-->
                                    <div class="row mb-3">
                                        <div class="col ms-3 me-3">
                                            <label for="Age" class="form-label-lg">
                                                <span class="fw-bold">Do you gamble ?</span>
                                            </label>
                                            <!-- =============== the other radio button will be here ======== -->
                                            <div class="form-check form-check-inline ms-3">
                                                <input class="form-check-input" type="radio" name="gamble" id="inlineRadio1" value="Yes">
                                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                                            </div>
                                            <!-- ============== the radio buttons will be here -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gamble" id="inlineRadio2" value="No">
                                                <label class="form-check-label" for="inlineRadio2">No</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- =============== the section for the emotions here ============ -->
                                    <div class="row mb-3">
                                        <div class="col ms-3 me-3">
                                            <label for="ForShorttempred">
                                                <span class="fw-bold">
                                                    If Yes, What type ?                             
                                                </span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text"></span>
                                                <input type="text" name="what_type" class="form-control form-control-lg" placeholder="what type...">
                                            </div>
                                            <!-- ============= the error will be shown here ======== -->
                                            <div class="error-message">
                                                <?php echo($all_errors["what_type"]); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- =============== the section for the emotions here ============ -->
                                    <div class="row mb-3">
                                        <div class="col ms-3 me-3">
                                            <label for="ForShorttempred">
                                                <span class="fw-bold">
                                                    If Yes, How long ?                             
                                                </span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text"></span>
                                                <input type="text" name="how_long" class="form-control form-control-lg" placeholder="how long...">
                                            </div>
                                            <!-- ============= the error will be shown here ======== -->
                                            <div class="error-message">
                                                <?php echo($all_errors["how_long"]); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- =============== the section for the emotions here ============ -->
                                    <div class="row mb-3">
                                        <div class="col ms-3 me-3">
                                            <label for="ForShorttempred">
                                                <span class="fw-bold">
                                                    Is there anything you are addicted to that worries you ?                             
                                                </span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text"></span>
                                                <input type="text" name="addicted" class="form-control form-control-lg" placeholder="addictions...">
                                            </div>
                                            <!-- ============= the error will be shown here ======== -->
                                            <div class="error-message">
                                                <?php echo($all_errors["addicted"]); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- =============== the section for the emotions here ============ -->
                                    <div class="row mb-3">
                                        <div class="col ms-3 me-3">
                                            <label for="ForShorttempred">
                                                <span class="fw-bold">
                                                    If so Where ?                             
                                                </span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text"></span>
                                                <input type="text" name="concentration" class="form-control form-control-lg" placeholder="concentration...">
                                            </div>
                                            <!-- ============= the error will be shown here ======== -->
                                            <div class="error-message">
                                                <?php echo($all_errors["concentration"]); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- =============== the section for the emotions here ============ -->
                                    <div class="row mb-3">
                                        <div class="col ms-3 me-3">
                                            <label for="ForShorttempred">
                                                <span class="fw-bold">
                                                    How would you describe your memory?                             
                                                </span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text"></span>
                                                <input type="text" name="memory" class="form-control form-control-lg" placeholder="memory...">
                                            </div>
                                            <!-- ============= the error will be shown here ======== -->
                                            <div class="error-message">
                                                <?php echo($all_errors["memory"]); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="save-details-btn mt-3 ms-3">
                                        <input type="submit" class="btn btn-lg btn-success" name="save_session" value="save session">
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