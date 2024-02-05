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
            <!-- the main home page for the administrator area here -->
            <div class="container-xxl">
                <div class="top-information-page">
                    <div class="patients-page shadow-lg">1</div>
                    <div class="family-planning-page shadow-sm">2</div>
                    <div class="phq9-questions-page shadow-sm">3</div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>