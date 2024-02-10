<?php

// ================== including the connection with the databse here ================ //
include("Config/connection.php");
$connection = new Connection("localhost", "root", "", "harmonymentalhealth");
// ==================// ====================== //
$connection->EstablishConnection();
$conn = $connection->get_connection();

$client_id = "";

// ======================== function to get the details based on the client profile ============= //

function fetchClientDetails($conn) {
    try {
        if (isset($_GET["client_id"])) {
            $client_id =isset($conn, $_GET["client_id"]) ? mysqli_real_escape_string($conn, $_GET["client_id"]) : "";
        }
        $sqlCommand = "SELECT * FROM PatientDetails WHERE patient_id = '$client_id'";
        // =========== getting the results here =================//
        $results = mysqli_query($conn, $sqlCommand);
        // ============== passing the results into an array here ==========//
        $all_results = mysqli_fetch_all($results, MYSQLI_ASSOC);

        return $all_results;
    }catch(Exception $ex) {
        print($ex);
    }
}

$all_results = fetchClientDetails($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="main-content-container">
        <div class="side-navigation-area">
            <!-- the dashboard side navigation will be here -->
            <?php include("sidebar.php"); ?>
        </div>
        <!-- the main content area will be here for the controls -->
        <div class="content-area">
            <div class="container-xxl">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="client-profile-main-page">
                            <div class="client-profile-title">
                                <h1>client profile details</h1>
                            </div>

                            <div class="client-profile-cards">
                                <!-- ============== // ===================== // -->
                                <?php if($all_results): ?>
                                    <!-- looping through the results here ====== -->
                                    <?php foreach($all_results as $single_record) {?>
                                        <div class="client-profile shadow-sm">
                                            <div class="client-profile-image">
                                                <img src="assets\images\man (1).png" alt="">
                                            </div>

                                            <!-- =============== for the main client details ============= -->
                                            <div class="all-client-details">
                                                <div class="title-text">
                                                    <h1><span><i class="bi bi-body-text me-2"></i></span>first name</h1>

                                                    <h1><span><i class="bi bi-person me-2"></i></span>last name</h1>

                                                    <h1><span><i class="bi bi-eye me-2"></i></span>guardian</h1>

                                                    <h1><span><i class="bi bi-house-add me-2"></i></span>address</h1>

                                                    <h1><span><i class="bi bi-reception-3 me-2"></i></span>cellphone</h1>

                                                    <h1><span><i class="bi bi-phone me-2"></i></span>other phone</h1>

                                                    <h1><span><i class="bi bi-envelope-heart me-2"></i></span>email</h1>

                                                    <h1><span><i class="bi bi-phone-vibrate me-2"></i></span>emergency contact</h1>

                                                    <h1><span><i class="bi bi-phone me-2"></i></span>telephone number</h1>

                                                    <h1><span><i class="bi bi-calendar-check me-2"></i></span>date of birth</h1>

                                                    <h1><span><i class="bi bi-sort-numeric-up-alt me-2"></i></span>age</h1>

                                                    <h1><span><i class="bi bi-gender-ambiguous me-2"></i></span>gender</h1>

                                                    <h1><span><i class="bi bi-tree me-2"></i></span>marital status</h1>

                                                    <h1><span><i class="bi bi-house me-2"></i></span>residence</h1>

                                                    <h1><span><i class="bi bi-link-45deg me-2"></i></span>referred by</h1>

                                                    <h1><span><i class="bi bi-person-wheelchair me-2"></i></span>primary care</h1>

                                                    <h1><span><i class="bi bi-tools me-2"></i></span>work place</h1>

                                                    <h1><span><i class="bi bi-tools me-2"></i></span>current occupation</h1>

                                                    <h1><span><i class="bi bi-hourglass-top me-2"></i></span>present position</h1>

                                                    <h1><span><i class="bi bi-backpack3 me-2"></i></span>current school</h1>

                                                    <h1><span><i class="bi bi-calendar-week me-2"></i></span>college year</h1>

                                                    <h1><span><i class="bi bi-brightness-high me-2"></i></span>previous therapist</h1>

                                                    <h1><span><i class="bi bi-ear me-2"></i></span>Heard about us</h1>

                                                    <h1><span><i class="bi bi-credit-card-2-front me-2"></i></span>payment method</h1>
                                                </div>
                                                <!-- ============ getting the records from the database here ========== -->
                                                <div class="main-text">
                                                    <h1><?php echo($single_record["first_name"]); ?></h1>
                                                    <h1><?php echo($single_record["last_name"]); ?></h1>
                                                    <h1><?php echo($single_record["guardian"]); ?></h1>
                                                    <h1><?php echo($single_record["address"]); ?></h1>
                                                    <h1><?php echo($single_record["cell_phone"]); ?></h1>
                                                    <h1><?php echo($single_record["other_phone"]); ?></h1>
                                                    <h1><?php echo($single_record["email"]); ?></h1>
                                                    <h1><?php echo($single_record["emergency_contact"]); ?></h1>
                                                    <h1><?php echo($single_record["telephone_number"]); ?></h1>
                                                    <h1><?php echo($single_record["date_birth"]); ?></h1>
                                                    <h1><?php echo($single_record["age"]); ?></h1>
                                                    <h1><?php echo($single_record["gender"]); ?></h1>
                                                    <h1><?php echo($single_record["marital_status"]); ?></h1>
                                                    <h1><?php echo($single_record["residence"]); ?></h1>
                                                    <h1><?php echo($single_record["referred_by"]); ?></h1>
                                                    <h1><?php echo($single_record["primary_care"]); ?></h1>
                                                    <h1><?php echo($single_record["work_place"]); ?></h1>
                                                    <h1><?php echo($single_record["current_occupation"]); ?></h1>
                                                    <h1><?php echo($single_record["present_position"]); ?></h1>
                                                    <h1><?php echo($single_record["current_school"]); ?></h1>
                                                    <h1><?php echo($single_record["college_year"]); ?></h1>
                                                    <h1><?php echo($single_record["previous_therapist"]); ?></h1>
                                                    <h1><?php echo($single_record["heard_about_us"]); ?></h1>
                                                    <h1><?php echo($single_record["payment_method"]); ?></h1>
                                                </div>
                                            </div>
                                        </div>

                                        
                                    <?php }?>
                                <?php else: ?>
                                    <div class="no-availble-results">
                                        <h1>no available results</h1>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>