<?php
// ===========getting the values from the form here ==============//
$first_name = "";
$last_name = "";
$guardian = "";
$address = "";
$cell_phone = "";
$other_phone = "";
$email = "";
$emergency_contact = "";
$telephone_number = "";
$date_birth = "";
$age = "";
$gender = "";
$marital_status = "";
$residence = "";
$referred_by = "";
$primary_care = "";
$occupation = "";
$work_place = "";
$current_occupation = "";
$present_position = "";
$current_school = "";
$college_year = "";
$previous_therapist = "";
$payment_method = "";
$signature = "";
$signature_date = "";
$guardian_signature = "";
$guardian_signature_date = "";
$reviewed_by_signature = "";
$reviewed_signature_date = "";


//  ============== the errors array for the system will be here ===============//
$all_errors = array(
    "first_name"=>"", "last_name"=>"", "guardian"=>"", "address"=>"", "cell_phone"=>"",
    "other_phone"=>"", "email"=>"", "emergency_contact"=>"", "telephone_number"=>"",
    "age"=>"", "gender"=>"", "primary_care"=>"", "work_place"=>"", "current_occupation"=>"",
    "present_position"=>"", "current_school"=>"", "college_year"=>"", "previous_therepist"=>"",
    "payment_method"=>"", "signature"=>"", "guardian_signature"=>"", "reviewed_by_signature"=>"",
    "residence"=>"", "referred_by"=>"", "occupation"=>"", 
);
// --------------checking if there are any malicious codes injected here
function ValidateInputs($data) {
    try {
        $data = trim($data);
        $data = htmlspecialchars($data);
        $data = stripslashes($data);

        return $data;
    }catch(Exception $ex) {
        print("");
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = ValidateInputs($_POST["first_name"]);
    $last_name = ValidateInputs($_POST["last_name"]);
    $guardian = ValidateInputs($_POST["guardian"]);
    $address = ValidateInputs($_POST["address"]);
    $cell_phone = ValidateInputs($_POST["cell_phone"]);
    $other_phone = ValidateInputs($_POST["other_phone"]);
    $email = ValidateInputs($_POST["email"]);
    $emergency_contact = ValidateInputs($_POST["emergency_contact"]);
    $telephone_number = ValidateInputs($_POST["telephone_number"]);
    $date_birth = ValidateInputs($_POST["date_birth"]);
    $age = ValidateInputs($_POST["age"]);
    $gender = ValidateInputs($_POST["gender"]);
    $residence = ValidateInputs($_POST["residence"]);
    $referred_by = ValidateInputs($_POST["referred_by"]);
    $primary_care = ValidateInputs($_POST["primary_care"]);
    $work_place = ValidateInputs($_POST["work_place"]);
    $current_occupation = ValidateInputs($_POST["current_occupation"]);
    $present_position = ValidateInputs($_POST["present_position"]);
    $current_school = ValidateInputs($_POST["current_school"]);
    $college_year = ValidateInputs($_POST["college_year"]);
    $payment_method = ValidateInputs($_POST["payment_method"]);
    $signature = ValidateInputs($_POST["signature"]);
    $signature_date = ValidateInputs($_POST["signature_date"]);
    $guardian_signature = ValidateInputs($_POST["guardian_signature"]);
    $guardian_signature_date = ValidateInputs($_POST["guardian_signature_date"]);
    $reviewed_by_signature = ValidateInputs($_POST["reviewed_by_signature"]);
    $reviewed_signature_date = ValidateInputs($_POST["reviewed_signature_date"]);

    // ============== checking if the fields are empty here for validations here ================ //
    if (isset($_POST["save_details_btn"])) {
        // checking if the fields are empty here
        if (empty($_POST["first_name"])) {
            $all_errors["first_name"] = "fill in the blanks";
        }
        else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $first_name)) {
                $all_errors["first_name"] = "provide valid characters";
            }
        }
        // ============= checking for the other input fields here ============//
        // checking if the fields are empty here
        if (empty($_POST["last_name"])) {
            $all_errors["last_name"] = "fill in the blanks";
        }
        else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $last_name)) {
                $all_errors["last_name"] = "provide valid characters";
            }
        }
        // ============= checking for the other input fields here ============//
        // checking if the fields are empty here
        if (empty($_POST["guardian"])) {
            $all_errors["guardian"] = "fill in the blanks";
        }
        else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $guardian)) {
                $all_errors["guardian"] = "provide valid characters";
            }
        }
        // ============= checking for the other input fields here ============//
         // checking if the fields are empty here
        if (empty($_POST["address"])) {
            $all_errors["address"] = "fill in the blanks";
        }
        else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $address)) {
                $all_errors["address"] = "provide valid characters";
            }
        }
        // ============= checking for the other input fields here ============//
         // checking if the fields are empty here
        if (empty($_POST["cell_phone"])) {
            $all_errors["cell_phone"] = "fill in the blanks";
        }
        else {
            if (preg_match("/^[a-zA-Z-' ]*$/", $cell_phone)) {
                $all_errors["cell_phone"] = "provide valid characters";
            }
        }
        // ============= checking for the other input fields here ============//
         // checking if the fields are empty here
         if (empty($_POST["other_phone"])) {
            $all_errors["other_phone"] = "fill in the blanks";
        }
        else {
            if (preg_match("/^[a-zA-Z-' ]*$/", $other_phone)) {
                $all_errors["other_phone"] = "provide valid characters";
            }
        }
        
        // ============= checking for the other input fields here ============//
         // checking if the fields are empty here
        if (empty($_POST["email"])) {
            $all_errors["email"] = "fill in the blanks";
        }
        else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $all_errors["email"] = "enter valid email";
            }
        }
        // ============= checking for the other input fields here ============//
        // checking if the fields are empty here
        if (empty($_POST["emergency_contact"])) {
            $all_errors["emergency_contact"] = "fill in the blanks";
        }
        else {
            if (preg_match("/^[a-zA-Z-' ]*$/", $emergency_contact)) {
                $all_errors["emergency_contact"] = "provide valid numbers";
            }
        }
        // ============= checking for the other input fields here ============//
        if (empty($_POST["telephone_number"])) {
            $all_errors["telephone_number"] = "fill in the blanks";
        }
        else {
            if (preg_match("/^[a-zA-Z-' ]*$/", $telephone_number)) {
                $all_errors["telephone_number"] = "provide valid telephone";
            }
        }
        // ============= checking for the other input fields here ============//
        // checking if the fields are empty here
        if (empty($_POST["age"])) {
            $all_errors["age"] = "enter something";
        }
        else {
            if (preg_match("/^[a-zA-Z-' ]*$/", $age)) {
                $all_errors["age"] = "provide valid numbers";
            }
        }
        // ============= checking for the other input fields here ============//
        // checking if the fields are empty here
        if (empty($_POST["residence"])) {
            $all_errors["residence"] = "fill in the blanks";
        }
        else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $residence)) {
                $all_errors["residence"] = "provide valid residence";
            }
        }
        // ============= checking for the other input fields here ============//
        // checking if the fields are empty here
        if (empty($_POST["referred_by"])) {
            $all_errors["referred_by"] = "enter something";
        }
        else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $referred_by)) {
                $all_errors["referred_by"] = "provide valid characters";
            }
        }
        // ============= checking for the other input fields here ============//
        // checking if the fields are empty here
        if (empty($_POST["primary_care"])) {
            $all_errors["primary_care"] = "enter something";
        }
        else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $primary_care)) {
                $all_errors["primary_care"] = "provide valid numbers";
            }
        }
        // ============= checking for the other input fields here ============//
        // checking if the fields are empty here
        if (empty($_POST["work_place"])) {
            $all_errors["work_place"] = "enter something";
        }
        else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $work_place)) {
                $all_errors["work_place"] = "enter valid place";
            }
        }
        // ============= checking for the other input fields here ============//
        // checking if the fields are empty here
        if (empty($_POST["current_occupation"])) {
            $all_errors["current_occupation"] = "enter something";
        }
        else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $current_occupation)) {
                $all_errors["current_occupation"] = "enter occupation";
            }
        }
        // ============= checking for the other input fields here ============//
        // checking if the fields are empty here
        if (empty($_POST["present_position"])) {
            $all_errors["present_position"] = "enter something";
        }
        else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $present_position)) {
                $all_errors["present_position"] = "enter valid characters";
            }
        }
        // ============= checking for the other input fields here ============//
        // checking if the fields are empty here
        if (empty($_POST["current_school"])) {
            $all_errors["current_school"] = "enter something";
        }
        else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $current_school)) {
                $all_errors["current_school"] = "provide current school";
            }
        }
        // ============= checking for the other input fields here ============//
        // checking if the fields are empty here
        if (empty($_POST["previous_therapist"])) {
            $all_errors["previous_therapist"] = "enter something";
        }
        else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $previous_therapist)) {
                $all_errors["previous_therapist"] = "provide correct therapist name";
            }
        }
        // ============= checking for the other input fields here ============//
        // checking if the fields are empty here
        if (empty($_POST["payment_method"])) {
            $all_errors["payment_method"] = "enter something";
        }
        else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $referred_by)) {
                $all_errors["payment_method"] = "provide valid method";
            }
        }
        // ============= checking for the other input fields here ============//
        // checking if the fields are empty here
        if (empty($_POST["signature"])) {
            $all_errors["signature"] = "enter something";
        }
        else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $signature)) {
                $all_errors["signature"] = "signature required";
            }
        }
        // ============= checking for the other input fields here ============//
        // checking if the fields are empty here
        if (empty($_POST["guardian_signature"])) {
            $all_errors["guardian_signature"] = "enter something";
        }
        else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $referred_by)) {
                $all_errors["guardian_signature"] = "provide current school";
            }
        }
        // ============= checking for the other input fields here ============//
        // checking if the fields are empty here
        if (empty($_POST["reviewed_by_signature"])) {
            $all_errors["reviewed_by_signature"] = "enter something";
        }
        else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $referred_by)) {
                $all_errors["reviewed_by_signature"] = "provide current school";
            }
        }
        // ============= checking for the other input fields here ============//
        // checking if the fields are empty here
        if (empty($_POST["reviewed_by_signature"])) {
            $all_errors["reviewed_by_signature"] = "enter something";
        }
        else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $referred_by)) {
                $all_errors["reviewed_by_signature"] = "provide current school";
            }
        }

        // ================ checking if the form has other errors here ===================//
        if (array_filter($all_errors)) {
            print("form has errors");
        }else {
            print("form is okay");
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
                        <!-- the form details will be here for the patients -->
                        <div class="patient-details-form">
                            <div class="form-title">
                                <h3>Personal information</h3>
                            </div>
                            <form action="administrator_patient_details.php" method="POST" class="needs-validation" novalidate>
                                <div class="row g-2 mb-2">
                                    <div class="col ms-3 me-3">
                                        <label for="FirstName" class="">First name</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-body-text"></i></span>
                                            <input type="text" class="form-control form-control-lg" name="first_name" placeholder="first name" aria-describedby="inputGroupPrepend" value="<?php echo($first_name);?>">
                                         </div>
                                        <div class="error-message">
                                            <?php echo $all_errors["first_name"]; ?>
                                        </div>
                                    </div>
                                    <!-- input for the form here -->
                                    <div class="col me-3">
                                        <label for="LastName" class="">Last name</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-body-text"></i></span>
                                            <input type="text" class="form-control form-control-lg" name="last_name" placeholder="last name" value="<?php echo($last_name);?>">
                                        </div>
                                        <div class="error-message">
                                            <?php echo $all_errors["last_name"]; ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- ==============// other controls here ==========// -->
                                <div class="row g-2 mb-2">
                                    <div class="col ms-3 me-3">
                                        <label for="Guardian" class="">Parent/Legal Guardian(if under 18)</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-person-standing"></i></span>
                                            <input type="text" class="form-control form-control-lg" name="guardian" placeholder="guardian/parent" value="<?php echo($guardian);?>">
                                        </div>
                                        <div class="error-message">
                                            <?php echo $all_errors["guardian"]; ?>
                                        </div>
                                    </div>
                                    <!-- input for the form here -->
                                    <div class="col me-3">
                                        <label for="Address" class="">Address</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-person-standing"></i></span>
                                            <input type="text" class="form-control form-control-lg" name="address" placeholder="address" value="<?php echo($address);?>">
                                        </div>
                                        <div class="error-message">
                                            <?php echo $all_errors["address"]; ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- ==============// other controls here ==========// -->
                                <div class="row g-2 mb-2">
                                    <div class="col ms-3">
                                        <label for="CellPhone" class="">Cell phone</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-phone"></i></span>
                                            <input type="text" class="form-control form-control-lg" name="cell_phone" placeholder="cell phone" value="<?php echo($cell_phone);?>">
                                        </div>
                                        <div class="error-message">
                                            <?php echo $all_errors["cell_phone"]; ?>
                                        </div>
                                    </div>
                                    <!-- input for the form here -->
                                    <div class="col me-3">
                                        <label for="OtherPhone" class="">Work/Other phone</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-router"></i></span>
                                            <input type="text" class="form-control form-control-lg" name="other_phone" placeholder="work/other phone" value="<?php echo($other_phone);?>">
                                        </div>
                                        <div class="error-message">
                                            <?php echo $all_errors["other_phone"]; ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- ==============// other controls here ==========// -->
                                <!-- ==============// other controls here ==========// -->
                                <div class="row g-2 mb-2">
                                    <div class="col ms-3 me-3">
                                        <label for="Email" class="">Email</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-envelope-open"></i></span>
                                            <input type="email" class="form-control form-control-lg" name="email" placeholder="email.." value="<?php echo($email);?>">
                                        </div>
                                        <div class="error-message">
                                            <?php echo $all_errors["email"]; ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- ==============// other controls here ==========// -->
                                <div class="row g-2 mb-2">
                                    <div class="col ms-3">
                                        <label for="EmergencyContact" class="">Emergency Contact</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-clipboard2-pulse"></i></span>
                                            <input type="text" class="form-control form-control-lg" name="emergency_contact" placeholder="emergency contact" value="<?php echo($emergency_contact);?>">
                                        </div>
                                        <div class="error-message">
                                            <?php echo $all_errors["emergency_contact"]; ?>
                                        </div>
                                    </div>
                                    <!-- input for the form here -->
                                    <div class="col me-3">
                                        <label for="telephoneNumber" class="">Telephone #</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                                            <input type="text" class="form-control form-control-lg" name="telephone_number" placeholder="telephone number" value="<?php echo($telephone_number);?>">
                                        </div>
                                        <div class="error-message">
                                            <?php echo $all_errors["telephone_number"]; ?>
                                        </div>
                                    </div>
                                    <!-- =========// for the data and time picker here ======== -->
                                    <div class="col me-3">
                                        <label for="telephoneNumber" class="">Date of birth</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-calendar-day"></i></span>
                                            <input type="text" class="form-control form-control-lg" value="12-02-2024" id="date" name="date_birth">
                                        </div>
                                    </div>
                                </div>
                                <!--  ============= controls for the age and gender here ======== -->
                                <div class="row g-2 mb-2">
                                    <div class="col ms-3">
                                        <label for="Age" class="">Age</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-body-text"></i></span>
                                            <input type="number" class="form-control form-control-lg" name="age" placeholder="enter age" value="<?php echo($age);?>">
                                        </div>
                                        <div class="error-message">
                                            <?php echo $all_errors["age"]; ?>
                                        </div>
                                    </div>
                                    <!-- input for the form here -->
                                    <div class="col me-3 mt-3">
                                        <label for="telephoneNumber" class="">Gender</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-calendar2-heart-fill"></i></span>
                                            <select class="form-select form-control form-control-lg" aria-label="Default select example" name="gender">
                                                <option selected>select gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!--  =================// the control for the marital status here ============= -->
                                <div class="row g-2 mb-3 mt-3">
                                    <div class="col ms-3">
                                        <label for="Age" class="form-label-lg">
                                            <span class="fw-bold">Marital Status(click)</span>
                                        </label>
                                        <div class="input-group">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="marital_status" id="inlineRadio1" value="Single">
                                                <label class="form-check-label" for="inlineRadio1">Single</label>
                                            </div>
                                            <!--  -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="marital_status" id="inlineRadio1" value="Never Married">
                                                <label class="form-check-label" for="inlineRadio1">Never Married</label>
                                            </div>
                                            <!--  -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="marital_status" id="inlineRadio1" value="Domestic Partnership">
                                                <label class="form-check-label" for="inlineRadio1">Domestic Partnership</label>
                                            </div>
                                            <!--  -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="marital_status" id="inlineRadio1" value="Married">
                                                <label class="form-check-label" for="inlineRadio1">Married</label>
                                            </div>
                                            <!--  -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="marital_status" id="inlineRadio1" value="Separated">
                                                <label class="form-check-label" for="inlineRadio1">Separated</label>
                                            </div>
                                            <!--  -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="marital_status" id="inlineRadio1" value="Divorced">
                                                <label class="form-check-label" for="inlineRadio1">Divorced</label>
                                            </div>
                                            <!--  -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="Widowed" id="inlineRadio1" value="Widowed">
                                                <label class="form-check-label" for="inlineRadio1">Widowed</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ================ // the control for the residental place here======= -->
                                <div class="row g-2 mb-2">
                                    <div class="col ms-3">
                                        <label for="Residence" class="">Area of residence</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-emoji-grin"></i></span>
                                            <input type="text" class="form-control form-control-lg" name="residence" placeholder="area of residence" value="<?php echo($residence);?>">
                                        </div>
                                        <div class="error-message">
                                            <?php echo $all_errors["residence"]; ?>
                                        </div>
                                    </div>
                                    <!-- input for the form here -->
                                    <div class="col me-3">
                                        <label for="telephoneNumber" class="">Referred By (if any)</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-file-break"></i></span>
                                            <input type="text" class="form-control form-control-lg" name="referred_by" placeholder="referred by" value="<?php echo($referred_by);?>">
                                        </div>
                                        <div class="error-message">
                                            <?php echo $all_errors["referred_by"]; ?>
                                        </div>
                                    </div>
                                    <!-- input for the form here -->
                                    <div class="col me-3">
                                        <label for="telephoneNumber" class="">Primary care Physician/Hospital</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-segmented-nav"></i></span>
                                            <input type="text" class="form-control form-control-lg" name="primary_care" placeholder="primary care..." value="<?php echo($primary_care);?>">
                                        </div>
                                        <div class="error-message">
                                            <?php echo $all_errors["primary_care"]; ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- ============= // occupational history area -->
                                <div class="occupational-history">
                                    <h3>Occupational History</h3>
                                    <!-- ==============/for the occupation history here/================= -->
                                    <div class="row g-2 mb-2">
                                        <div class="col ms-3">
                                            <!-- =======================//================= -->
                                            <label for="FirstName" class="form-label-lg ms-2 bold">
                                                <span class="fw-bold">Are you currently</span>
                                            </label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="Working" name="occupation">
                                                <label class="form-check-label" for="inlineCheckbox1">Working</label>
                                            </div>
                                            <!-- ==================//================= -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Business" name="occupation">
                                                <label class="form-check-label" for="inlineCheckbox2">Business</label>
                                            </div>
                                            <!-- ===================//=============== -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="Student" name="occupation">
                                                <label class="form-check-label" for="inlineCheckbox1">Student</label>
                                            </div>
                                            <!-- ================//================ -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Unemployed" name="occupation">
                                                <label class="form-check-label" for="inlineCheckbox2">Unemployed</label>
                                            </div>
                                            <!-- ===============//=============== -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Disabled" name="occupation">
                                                <label class="form-check-label" for="inlineCheckbox2">Disabled</label>
                                            </div>
                                            <!-- ===============//=============== -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Retired" name="occupation">
                                                <label class="form-check-label" for="inlineCheckbox2">Retired</label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- ==============correcting the records if the client is working here====== -->
                                <!-- ================ // the control for the residental place here======= -->
                                <div class="checking-working-status">
                                    <h3>if working</h3>
                                </div>
                                <div class="row g-2 mb-2">
                                    <div class="col ms-3">
                                        <label for="WorkPlace" class="">Where do you work?</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-hammer"></i></span>
                                            <input type="text" class="form-control form-control-lg" name="work_place" placeholder="enter work place" value="<?php echo($work_place);?>">
                                        </div>
                                        <div class="error-message">
                                            <?php echo $all_errors["work_place"]; ?>
                                        </div>
                                    </div>
                                    <!-- input for the form here -->
                                    <div class="col me-3">
                                        <label for="Occupation" class="">What is/was your occupation?</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-list"></i></span>
                                            <input type="text" class="form-control form-control-lg" name="current_occupation" placeholder="occupation" value="<?php echo($current_occupation);?>">
                                        </div>
                                        <div class="error-message">
                                            <?php echo $all_errors["occupation"]; ?>
                                        </div>
                                    </div>
                                    <!-- input for the form here -->
                                    <div class="col me-3">
                                        <label for="telephoneNumber" class="">How long is present position?</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-clock-history"></i></span>
                                            <input type="text" class="form-control form-control-lg" name="present_position" placeholder="present position" value="<?php echo($present_position);?>">
                                        </div>
                                        <div class="error-message">
                                            <?php echo $all_errors["present_position"]; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="checking-working-status">
                                    <h3>if Student</h3>
                                    <div class="row g-2 mb-2">
                                        <div class="col ms-3">
                                            <label for="WorkPlace" class="">Which school/College?</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-book-half"></i></span>
                                                <input type="text" class="form-control form-control-lg" name="current_school" placeholder="enter work place" value="<?php echo($current_school);?>">
                                            </div>
                                            <div class="error-message">
                                            <?php echo $all_errors["current_school"]; ?>
                                        </div>
                                        </div>
                                        <!-- input for the form here -->
                                        <div class="col me-3">
                                        <label for="Year" class="">Year</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-calendar2-event"></i></span>
                                            <input type="text" class="form-control form-control-lg" value="12-02-2024" id="college_year" name="college_year">
                                        </div>
                                        <div class="error-message">
                                            <?php echo $all_errors["college_year"]; ?>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <!-- ================ // the control for the residental place here======= -->
                                <div class="checking-history-status">
                                    <h3>history</h3>
                                    <p class="lead">have you previously received any type of mental health services 
                                        (pychotherapy, psychiatric services, etc.)?
                                    </p>
                                </div>

                                <!-- ===============// the history controls will be here ====== -->
                                <div class="row g-2 mb-2">
                                    <div class="col ms-3">
                                        <!-- =======================//================= -->
                                        <label for="FirstName" class="form-label-lg ms-2 bold">
                                            <span class="fw-bold">Previous Therapist/Practitioner:</span>
                                        </label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="inlineCheckbox1" value="Working" name="previous_therapist">
                                            <label class="form-check-label" for="inlineCheckbox1">Yes</label>
                                        </div>
                                        <!-- ==================//================= -->
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="inlineCheckbox2" value="Business" name="previous_therapist">
                                            <label class="form-check-label" for="inlineCheckbox2">No</label>
                                        </div>
                                        <!-- ================//================ -->
                                    </div>
                                </div>

                                <div class="row g2 mb-2">
                                    <div class="col ms-3 me-3">
                                        <label for="Occupation" class="fw-bold">How and where did you heard about Harmony Mental Wellness Solutions Clinic?</label>
                                        <div class="input-group">
                                            <textarea name="hear_us" id="" class="form-control form-control-lg">

                                            </textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- =============== the method of payment section will be here -->
                                <div class="checking-method-payment">
                                    <h3>method of payment (Circle)</h3>
                                    <div class="row g-2 mb-2">
                                    <div class="col ms-3">
                                        <label for="Cash" class="">Cash</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-wallet2"></i></span>
                                            <input type="text" class="form-control form-control-lg" name="payment_method" placeholder="add payment method" value="<?php echo($payment_method);?>">
                                        </div>
                                        <div class="error-message">
                                            <?php echo $all_errors["payment_method"]; ?>
                                        </div>
                                    </div>
                                    <!-- input for the form here -->
                                    <div class="col me-2">
                                        <label for="PaymentMethods" class="">Other(Specify)</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-cash-coin"></i></span>
                                            <input type="text" class="form-control form-control-lg" name="payment_method" placeholder="specify other payment methods.." value="<?php echo($payment_method);?>">
                                        </div>
                                        <div class="error-message">
                                            <?php echo $all_errors["payment_method"]; ?>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <!-- ================== // the area for the signature and date selection here ========== -->
                                <div class="row g-2 mb-2">
                                    <div class="col ms-3">
                                        <label for="Signature" class="">Signature</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-check-square"></i></span>
                                            <input type="text" class="form-control form-control-lg" name="signature" placeholder="add name or signature" value="<?php echo($signature);?>">
                                        </div>
                                        <div class="error-message">
                                            <?php echo $all_errors["signature"]; ?>
                                        </div>
                                    </div>
                                    <!-- input for the form here -->
                                    <div class="col me-3">
                                        <label for="SignatureDate" class="">Signature Date</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-dash-square-dotted"></i></span>
                                            <input type="text" class="form-control form-control-lg" value="12-02-2024" id="signatureDate" name="signature_date">
                                        </div>
                                    </div>
                                </div>
                                <!-- =================// the other fields here ============// ---- -->
                                <div class="row g-2 mb-2">
                                    <div class="col ms-3">
                                        <label for="GuardianSignature" class="">Guardian Signature (if under 18)</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-check-square"></i></span>
                                            <input type="text" class="form-control form-control-lg" name="guardian_signature" placeholder="add name or signature" value="<?php echo($guardian_signature);?>">
                                        </div>
                                        <div class="error-message">
                                            <?php echo $all_errors["guardian_signature"]; ?>
                                        </div>
                                    </div>
                                    <!-- input for the form here -->
                                    <div class="col me-3">
                                        <label for="SignatureDate" class="">Signature Date</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-dash-square-dotted"></i></span>
                                            <input type="text" class="form-control form-control-lg" value="12-02-2024" id="GuardiansignatureDate" name="guardian_signature_date">
                                        </div>
                                    </div>
                                </div>

                                <!-- ================== for the office use only here -->
                                <div class="for-office-use">
                                    <h3>for office use:</h3>
                                </div>
                                <div class="row g-2 mb-2">
                                    <div class="col ms-3">
                                        <label for="GuardianSignature" class="">Reviewed By</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-yelp"></i></span>
                                            <input type="text" class="form-control form-control-lg" name="reviewed_by_signature" placeholder="add name or signature" value="<?php echo($reviewed_by_signature);?>">
                                        </div>
                                        <div class="error-message">
                                            <?php echo $all_errors["reviewed_by_signature"]; ?>
                                        </div>
                                    </div>
                                    <!-- input for the form here -->
                                    <div class="col me-3">
                                        <label for="SignatureDate" class="">Signature Date</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-dash-square-dotted"></i></span>
                                            <input type="text" class="form-control form-control-lg" value="12-02-2024" id="ReviewedsignatureDate" name="reviewed_signature_date">
                                        </div>
                                    </div>
                                </div>

                                <!-- =====================// button area here //=========== -->
                                <div class="save-details-area">
                                    <input type="submit" value="save details" class="btn btn-lg btn-success" name="save_details_btn">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
            $('#signatureDate').datepicker({
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