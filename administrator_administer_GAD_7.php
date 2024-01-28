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
                <div class="row">
                    <div class="col-lg-12">
                        <div class="administer_GAD_7-page">
                            <div class="administer-header-title">
                                <h1>administer GAD 7 questions</h1>
                            </div>

                            <!-- ============= the form will be here for the controls ===== -->
                            <div class="administer-gad-7-form">
                                <form action="" method="POST">
                                    <div class="row mb-3">
                                        <div class="col ms-3 me-3">
                                            <label for="ForShorttempred">
                                                <span class="fw-bold">
                                                    Would you say you get angry easily?/ Are you short tempered ?                                               </span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text"></span>
                                                <input type="text" name="short_tempered" class="form-control form-control-lg" placeholder="are you short tempered...">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- =============== the section for the emotions here ============ -->
                                    <div class="row mb-3">
                                        <div class="col ms-3 me-3">
                                            <label for="ForShorttempred">
                                                <span class="fw-bold">
                                                    Do you easily express your emotions ?                             
                                                </span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text"></span>
                                                <input type="text" name="emotions" class="form-control form-control-lg" placeholder="do you express your emotions...">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ================ the section for the alcahol drinking here ============ -->
                                    <div class="row mb-3">
                                        <div class="col ms-3 me-3">
                                            <label for="Age" class="form-label-lg">
                                                <span class="fw-bold">Do you drink alcohol more than once a week ?</span>
                                            </label>
                                            <!-- =============== the other radio button will be here ======== -->
                                            <div class="form-check form-check-inline ms-3">
                                                <input class="form-check-input" type="radio" name="alcohol_drinking" id="inlineRadio1" value="Yes">
                                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                                            </div>
                                            <!-- ============== the radio buttons will be here -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="alcohol_drinking" id="inlineRadio2" value="No">
                                                <label class="form-check-label" for="inlineRadio2">No</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- =============== how often section will be here ============== -->
                                    <div class="row mb-3">
                                        <div class="col ms-3 me-3">
                                            <label for="Yes" class="form-label-lg">
                                                <span class="fw-bold">if YES, How often ?</span>
                                            </label>
                                            <!-- =============== the other radio button will be here ======== -->
                                            <div class="form-check form-check-inline ms-3">
                                                <input class="form-check-input" type="radio" name="how_often" id="inlineRadio1" value="Daily">
                                                <label class="form-check-label" for="inlineRadio1">Daily</label>
                                            </div>
                                            <!-- ============== the radio buttons will be here -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="how_often" id="inlineRadio2" value="Weekly">
                                                <label class="form-check-label" for="inlineRadio2">Weekly</label>
                                            </div>
                                            <!-- ============== the radio buttons will be here -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="how_often" id="inlineRadio2" value="Monthly">
                                                <label class="form-check-label" for="inlineRadio2">Monthly</label>
                                            </div>
                                            <!-- ============== the radio buttons will be here -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="how_often" id="inlineRadio2" value="Infrequently">
                                                <label class="form-check-label" for="inlineRadio2">Infrequently</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ===================== the use of drugs here ====================-->
                                    <div class="row mb-3">
                                        <div class="col ms-3 me-3">
                                            <label for="Age" class="form-label-lg">
                                                <span class="fw-bold">Do you engage in recreational drug use ?</span>
                                            </label>
                                            <!-- =============== the other radio button will be here ======== -->
                                            <div class="form-check form-check-inline ms-3">
                                                <input class="form-check-input" type="radio" name="recreational_drugs" id="inlineRadio1" value="Yes">
                                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                                            </div>
                                            <!-- ============== the radio buttons will be here -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="recreational_drugs" id="inlineRadio2" value="No">
                                                <label class="form-check-label" for="inlineRadio2">No</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ================== recreationa drugs how often here ============= -->
                                    <div class="row mb-3">
                                        <div class="col ms-3 me-3">
                                            <label for="Yes" class="form-label-lg">
                                                <span class="fw-bold">if YES, How often ?</span>
                                            </label>
                                            <!-- =============== the other radio button will be here ======== -->
                                            <div class="form-check form-check-inline ms-3">
                                                <input class="form-check-input" type="radio" name="how_often" id="inlineRadio1" value="Daily">
                                                <label class="form-check-label" for="inlineRadio1">Daily</label>
                                            </div>
                                            <!-- ============== the radio buttons will be here -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="how_often" id="inlineRadio2" value="Weekly">
                                                <label class="form-check-label" for="inlineRadio2">Weekly</label>
                                            </div>
                                            <!-- ============== the radio buttons will be here -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="how_often" id="inlineRadio2" value="Monthly">
                                                <label class="form-check-label" for="inlineRadio2">Monthly</label>
                                            </div>
                                            <!-- ============== the radio buttons will be here -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="how_often" id="inlineRadio2" value="Infrequently">
                                                <label class="form-check-label" for="inlineRadio2">Infrequently</label>
                                            </div>
                                        </div>
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