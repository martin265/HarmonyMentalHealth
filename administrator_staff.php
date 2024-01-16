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
            <!-- ============= // content for the form will be here==== -->
             <div class="container-xxl">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="staff-details-form shadow-sm">
                            <form action="" method="POST">
                                <!--  =========== staff details will be here ======= -->
                                <div class="row g-2">
                                    <div class="col ms-2">
                                        <label for="FirstName" class="col-form-label-lg">First name</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-body-text"></i></span>
                                            <input type="text" class="form-control form-control-lg" name="first_name" placeholder="first name">
                                        </div>
                                    </div>
                                    <!-- input for the form here -->
                                    <div class="col me-2">
                                        <label for="LastName" class="col-form-label-lg">Last name</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-body-text"></i></span>
                                            <input type="text" class="form-control form-control-lg" name="last_name" placeholder="last name">
                                        </div>
                                    </div>
                                </div>
                                <!-- ==============// phone number and email area here ======== -->
                                <div class="row g-2">
                                    <div class="col ms-2">
                                        <label for="PhoneNumber" class="col-form-label-lg">Phone Number</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-phone-fill"></i></span>
                                            <input type="text" class="form-control form-control-lg" name="phone_number" placeholder="phone_number">
                                        </div>
                                    </div>
                                    <!-- input for the form here -->
                                    <div class="col me-2">
                                        <label for="Email" class="col-form-label-lg">Email</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                                            <input type="email" class="form-control form-control-lg" name="email" placeholder="email">
                                        </div>
                                    </div>
                                </div>
                                <!-- =========== the other row for the input buttons here -->
                                <div class="row g-2 mt-1">
                                    <div class="col ms-2">
                                        <label for="TypeofEmployment" class="col-form-label-lg">Location</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-geo-alt-fill"></i></span>
                                            <select class="form-select" aria-label="Default select example" name="location">
                                                <option selected>Open this select menu</option>
                                                <option value="full time">Malawi</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- input for the form here -->
                                    <div class="col me-2">
                                        <label for="Location" class="col-form-label-lg">Department</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-journal-album primary"></i></i></span>
                                            <select class="form-select form-control form-control-lg" aria-label="Default select example" name="department">
                                                <option selected>Open this select menu</option>
                                                <option value="Harmony Corp.Leadership">Harmony Corp.Leadership</option>
                                                <option value="Human Resources (HR) department">Human Resources (HR) department</option>
                                                <option value="Finace Department">Finace Department</option>
                                                <option value="Marketing Department">Marketing Department</option>
                                            </select>
                                        </div>
                                    </div>
                                 </div>
                                 <!-- ========= the date and time picker here -->
                                <div class="control-buttons ms-2 mt-3 mb-5">
                                    <button class="btn btn-success btn-sm" name="save_staff_details"><span><i class="bi bi-save-fill p-3"></i></span>Save details</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
             </div>
        </div>
    </div>
</body>
</html>