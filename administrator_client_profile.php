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
                                <div class="client-profile shadow-sm">
                                    <h1>hello</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>