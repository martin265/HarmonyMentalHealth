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


// ================= function to fetch patient details here ===============//
function fetchPatientDetails($conn) {
    try {
        $sqlCommand = "SELECT * FROM PatientDetails";
        // =========== getting the results here =================//
        $results = mysqli_query($conn, $sqlCommand);
        // ============== passing the results into an array here ==========//
        $all_results = mysqli_fetch_all($results, MYSQLI_ASSOC);

        return $all_results;
        
    }catch(Exception $ex) {
        print($ex);
    }
}

$all_results = fetchPatientDetails($conn);

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

                                <div class="recent-activity-data-table">
                                    <table id="recent-table" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-capitalize">first name</th>
                                                <th scope="col" class="text-capitalize">last name</th>
                                                <th scope="col" class="text-capitalize">quardian</th>
                                                <th scope="col" class="text-capitalize">address</th>
                                                <th scope="col" class="text-capitalize">cellphone</th>
                                                <th scope="col" class="text-capitalize">email</th>
                                                <th scope="col" class="text-capitalize">gender</th>
                                                <th scope="col" class="text-capitalize">action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- ============== looping through the results here ====== -->
                                            <?php if ($all_results): ?>
                                                <?php foreach($all_results as $single_record) {?>
                                                    <tr>
                                                        <td><?php echo($single_record["first_name"]); ?></td>
                                                        <td><?php echo($single_record["last_name"]); ?></td>
                                                        <td><?php echo($single_record["guardian"]); ?></td>
                                                        <td><?php echo($single_record["address"]); ?></td>
                                                        <td><?php echo($single_record["cell_phone"]); ?></td>
                                                        <td><?php echo($single_record["email"]); ?></td>
                                                        <td><?php echo($single_record["gender"]); ?></td>
                                                        <!-- ============ for the button here -->
                                                        <td>
                                                            <a href="administrator_client_profile.php?client_id=<?php echo($single_record["patient_id"]); ?>" class="btn btn-success btn-sm"><span><i class="bi bi-body-text me-2"></i></span>Details</a>
                                                        </td>
                                                    </tr>
                                                <?php }?>
                                                <?php else: ?>

                                                <?php endif; ?>
                                        </tbody>
                                    </table>
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