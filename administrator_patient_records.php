<?php

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
                <div class="row all-records">
                    <div class="col-lg-3 patient-records-card ms-2">1</div>
                    <div class="col-lg-3 session-racords-card">2</div>
                    <div class="col-lg-3 payment-records-card me-2">3</div>
                </div>
            </div>
        </div>

        <!-- the other content area will be here -->
    </div>
</body>
</html>