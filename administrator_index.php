<?php

// ================== including the connection class here ============//
include("Config/connection.php");
$connection = new Connection("localhost", "root", "", "harmonymentalhealth");
$connection->EstablishConnection();
$conn = $connection->get_connection();


// ================== function to count the databse records here ============ //
function countPatientRecords($conn) {
    try {
        $sqlCommand = "SELECT COUNT(*) AS total_records FROM PatientDetails";
        // =========== running the query here ==============//
        $results = mysqli_query($conn, $sqlCommand);
        // ============ checking is there available results ============ //
        if ($results) {
            // fetching the results as an associative array ========= //
            $row = mysqli_fetch_assoc($results);
            $totalRecords = $row["total_records"];

            return $totalRecords;
        }
    }catch(Exception $ex) {
        print($ex);
    }
}

$totalRecords = countPatientRecords($conn);

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
            <!-- the main home page for the administrator area here -->
            <div class="container-xxl">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- ============== the cards for the details will be here ======== -->
                        <div class="main-dashboard-panel">
                            <div class="top-page-title">
                                <div class="dashboard-icon text-success">
                                    <i class='bx bxs-dashboard'></i>
                                </div>
                                <div class="dashboard-item">
                                    <h1>main dashboard</h1>
                                </div>
                            </div>

                            <!-- ================= the cards for the main panel will be here ============== -->
                            <div class="main-dashboard-items">
                                <div class="patient-count-page-1 shadow-sm">
                                    <div class="total-clients-header">
                                        <span><i class="bi bi-clipboard2-pulse"></i></span>
                                    </div>

                                    <div class="total-clients-title">
                                        <p>total clients</p>
                                    </div>

                                    <div class="total-clients-count">
                                        <p><?php echo($totalRecords); ?></p>
                                    </div>
                                </div>
                                <!-- ============ the second container for the patients will be here ===== -->
                                <div class="patient-count-page-2 shadow-sm">
                                    <div class="total-appointments-header">
                                        <span><i class="bi bi-calendar2-week"></i></span>
                                    </div>

                                    <div class="total-appointments-title">
                                        <p>total appointments</p>
                                    </div>

                                    <div class="total-appointments-count">
                                        <p><?php echo($totalRecords); ?></p>
                                    </div>
                                </div>
                                <!-- =========================== // ========================== // -->
                                <div class="patient-count-page-3 shadow-sm">

                                    <div class="total-saved-questions-header">
                                        <span><i class="bi bi-patch-question-fill"></i></span>
                                    </div>

                                    <div class="total-saved-questions-title">
                                        <p>total sessions</p>
                                    </div>

                                    <div class="total-saved-questions-count">
                                        <p><?php echo($totalRecords); ?></p>
                                    </div>
                                </div>
                            </div>

                            <!-- ========================= the table for showing the recent activities will be here =========== // -->
                            <div class="recent-activities-panel">
                                <div class="recent-activity-header">
                                    <div class="header-icon">
                                        <span><i class="bi bi-clock"></i></span>
                                    </div>
                                    <!-- =============== // ================== // -->
                                    <div class="header-text">
                                        <h1>recent activity</h1>
                                    </div>
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