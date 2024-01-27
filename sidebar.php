<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- =========== bootstrap links here ============= -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <!-- ============= css link here ========== -->
    <link rel="stylesheet" href="styles/style.css">
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <!-- other links will be here -->
    <!-- Include Bootstrap DateTimePicker CSS and JavaScript -->
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="assets/bootstrap-datepicker-1.9.0-dist/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="assets\bootstrap-datepicker-1.9.0-dist\css\bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="assets\bootstrap-datepicker-1.9.0-dist\css\bootstrap-datepicker3.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="side-navigation-panel">
        <!-- the side bar navigation items will be here -->
        <div class="navigation-item">
            <i class="bi bi-house"></i>
            <a href="administrator_index.php" class="">home</a>
        </div>
        <!-- the side bar navigation items will be here -->
        <div class="navigation-item">
            <i class="bi bi-person-down"></i>
            <a href="administrator_staff.php">staff</a>
        </div>
        <!-- the side bar navigation items will be here -->
        <div class="navigation-item">
            <i class="bi bi-building-gear"></i>
            <a href="administrator_patient_details.php">patient overview</a>
        </div>

        <!-- ========== drop down for the therapy sessions will be here  -->
        
        <!-- the side bar navigation items will be here -->
        <div class="navigation-item">
            <i class="bi bi-stickies"></i>    
            <a href="administrator_appointments.php">appointments</a>
        </div>
        <!-- the side bar navigation items will be here -->
        <div class="navigation-item">
            <i class="bi bi-calendar2-week"></i>
            <a href="administrator_therapy_sessions.php">therapy sessions</a>
        </div>

        <!-- ------------- // the drop down for the links will be here // -->
        <div class="dropdown mt-3">
            <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-brightness-low me-1"></i>Therapy Questions
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="administrator_general_mental_health.php">General and Mental</a></li>
                <li><a class="dropdown-item" href="administrator_administer_PHQ_9.php">Administer PHQ 9</a></li>
                <li><a class="dropdown-item" href="#">Administer GAD 7</a></li>
                <li><a class="dropdown-item" href="#">Family Mental Health</a></li>
            </ul>
        </div>
        <!-- the side bar navigation items will be here -->
        <div class="navigation-item">
             <i class="bi bi-file-earmark-bar-graph"></i>
             <a href="administrator_patient_records.php">records</a>
        </div>
    </div>
</body>
</html>