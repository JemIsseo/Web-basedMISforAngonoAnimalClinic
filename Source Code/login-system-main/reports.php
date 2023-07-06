<?php
session_start();
include 'authcheck.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports</title>
    <!-- Materical Icons Link -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!-- Stylesheet  -->
    <link rel="stylesheet" href="../css/reports.css">
    <link rel="shortcut icon" type="image/x-icon" href="../images/aac.jpg" />
</head>

<body>
    <div class="container">
        <?php include 'aside.php'; ?>

        <!--  Main Tag  -->
        <main>

        <section class="tableprofile">
                <h1 class="primary-variant">ANGONO<span class="success"> ANIMAL CLINIC</span> & PET GROOMING CENTER</h1>
                <div class="table-profile">
                    <div class="table-profile-buttons">
                        <!--  Start of Settings Section  -->
                        <div class="buttonmodify">
                            <a href="../login-system-main/reports/reporttotalsales.php" title="Print Total Sales Report"><span class="material-symbols-sharp"> analytics </span>Total Sales Report<span style="color: transparent">....</span></a>
                        </div>
                        <div class="buttonmodify">
                            <a href="../login-system-main/reports/reportuseraccount.php" title="Print Useraccount Report"><span class="material-symbols-sharp"> account_box </span>Useraccount Report<span style="color: transparent">..</span></a>
                        </div>
                        <div class="buttonmodify">
                            <a href="../login-system-main/reports/reportownersprofile.php" title="Print OwnersProfile Report"><span class="material-symbols-sharp">contact_page</span>Owners Profile Report</a>
                        </div>
                        <div class="buttonmodify">
                            <a href="../login-system-main/reports/reportpetprofile.php" title="Print PetProfile Report"><span class="material-symbols-sharp">pets</span>Pet Profile Report<span style="color: transparent">.......</span></a>
                        </div>
                        <div class="buttonmodify">
                            <a href="../login-system-main/reports/reportstock.php" title="Print Stocks Report"><span class="material-symbols-sharp"> inventory_2 </span>Print Stocks Report<span style="color: transparent">..</span></a>
                        </div>
                        <div class="buttonmodify">
                            <a href="../login-system-main/reports/reportaddedstock.php" title="Print Added Stock Report"><span class="material-symbols-sharp"> inventory </span>Added Stock Report<span style="color: transparent">..</span></a>
                        </div>
                        <div class="buttonmodify">
                            <a href="../login-system-main/reports/reportaudittrail.php" title="Print Audit Trail"><span class="material-symbols-sharp"> table_chart </span>Audit Trail Report<span style="color: transparent">.....</span></a>
                        </div>
                        <div class="buttonmodify">
                            <a href="../login-system-main/reports/reportmedicalhistory.php" title="Print Medical History Report"><span class="material-symbols-sharp">medical_information</span>Medical History Report</a>
                        </div>
                    </div>
                </div>
            </section>

        </main>
        <!--  End of Main Tag  -->

        <?php include 'systemaccountanddate.php'; ?>
    </div>

    <?php include 'scriptingfiles.php'; ?>
</body>

</html>