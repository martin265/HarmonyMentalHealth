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
            <!-- all the content will be here  -->
            <div class="container-xxl">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="general-health-question-panel shadow-sm">
                            <div class="page-title">
                                <h1>general and mental health information</h1>
                            </div>

                            <!-- ============ the form for the details will be here ========= -->
                            <div class="questions-page">
                                <form action="administrator_general_mental_health.php" method="POST">
                                    <!-- =========== the input fields for the form will be here === -->
                                    <div class="row">
                                        <div class="col">
                                            <label for="">
                                                <p>
                                                    are you currently taking any prescription medication
                                                </p>
                                            </label>
                                            <!-- =============== the other radio button will be here ======== -->
                                            <div class="form-check form-check-inline ms-3">
                                                <input class="form-check-input" type="radio" name="prescription_medication" id="inlineRadio1" value="Yes">
                                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                                            </div>
                                            <!-- ============== the radio buttons will be here -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="prescription_medication" id="inlineRadio2" value="No">
                                                <label class="form-check-label" for="inlineRadio2">No</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ============ the other control will be here ================= -->
                                    <div class="row">
                                        <div class="col ms-3 me-3 explanation">
                                            <label for="ForExplanation">
                                                <span class="explaination">If yes, Which ones ?</span>
                                            </label>
                                            <textarea name="explanation" class="form-control form-control">

                                            </textarea>
                                        </div>
                                    </div>
                                    <!-- ============== the other row will be here ========== -->
                                    <div class="row">
                                        
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