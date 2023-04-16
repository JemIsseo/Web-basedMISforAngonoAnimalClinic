<?php
include '../connect.php';
$result = $conn->query("SELECT * FROM tblappointments ORDER BY queueno DESC");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="theme-color" content="#000000" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Newsreader:opsz@6..72&family=Poppins:wght@400;800&family=Special+Elite&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>


    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-1.13.4/b-2.3.6/sl-1.6.2/datatables.min.css" />
    <link rel="stylesheet" type="text/css" href="Editor-2.1.2/css/editor.dataTables.css">


    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.4.0/css/dataTables.dateTime.min.css" />
    <link rel="shortcut icon" type="image/x-icon" href="aac.jpg" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/datetime/1.4.0/js/dataTables.dateTime.min.js"></script>


    <script type="text/javascript" src="Editor-2.1.2/js/dataTables.editor.js"></script>

    <title>MEDICAL HISTORY REPORT</title>
</head>
<style>
    body {
        font-family: 'Poppins', sans-serif;
        margin: 0;
        display: flex;
        justify-content: center;
    }

    .reportPage {
        width: 1000px;
    }

    .centerreceipt {
        margin-top: 2em;
        text-align: center;
        font-size: 1.2em;
    }


    .reportHeader {
        font-weight: 800;
        font-size: 1.5em;
    }

    .reportSubtext {
        font-size: 1em;
    }

    .reportContainer {

        height: 800px;
    }

    .tblTitle {

        font-size: 1.5em;
        font-weight: 800;
    }

    .tblReportData {
        margin-top: 2vw;
        width: 100%;
        border-collapse: collapse;
    }

    .tblReportData thead {
        background-color: rgb(144, 197, 232);
        padding: 0;
        margin: 0;
    }

    .tblReportData th,
    .tblReportData td {
        border: 1px solid black;
        padding: 0.5vw;
        text-align: center;
    }


    .fab-wrapper {
        position: fixed;
        bottom: 3rem;
        right: 3rem;
    }

    .fab-wrapperleft {
        position: fixed;
        bottom: 3rem;
        left: 11rem;
    }

    .fab {
        display: flex;
        justify-content: center;
        align-items: center;
        position: absolute;
        bottom: -1rem;
        right: -1rem;
        width: 10vw;
        height: 4vw;
        border-radius: 10px;
        transition: all 0.3s ease;
        z-index: 1;
        background-color: rgb(79, 163, 219);
    }

    .fab:hover {
        cursor: pointer;
    }

    .fc-clear {
        background-color: rgb(170, 192, 175, 0.3);
    }

    .fc-toolbar {
        background-color: rgb(0, 0, 0, 0.3);
    }

    .print-button {
        font-family: 'Poppins', sans-serif;
        font-size: 1.5vw;
        color: white;

    }

    @media only print {

        .tblFilter,
        .noprint,
        .dataTables_filter,
        .dataTables_paginate,
        .dataTables_info,
        .print-button {
            visibility: hidden;
        }
    }
</style>
<script>
    $(document).ready(function() {
        $("#print").click(function() {
            window.print();
        });
    });
</script>
<!-- onload="print();" onafterprint="close();" -->

<body>
    <div class="fab-wrapper">
        <label class="fab" for="print" id="print">
            <center>
                <span class="print-button">Print</span>
            </center>
        </label>
    </div>
    <div class="fab-wrapperleft">
        <label class="fab">
            <center>
                <a href="../reports.php" class="print-button">Go back</a>
            </center>
        </label>
    </div>
    <div class="reportPage">
        <div class="centerreceipt">
            <h2><b>ANGONO ANIMAL CLINIC AND PET GROOMING CENTER</b></h2>
            <p>173 Ingal Bldg. M. L. Quezon Ave. </p>
            <p>San Isidro Angono, Rizal </p>
            <p>Cell. No.: 0921-502-2956 / 0966-456-8460</p>
        </div>
        <div class="reportContainer">
            <label class="tblTitle">Medical History</label>

            <table class="tblReportData" id="tblReportData">
                <thead>
                    <tr>
                        <th>Client Name</th>
                        <th>Pet Name</th>
                        <th>Services</th>
                        <th>Date and Time</th>
                    </tr>
                </thead>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['clientname']; ?></td>
                        <td><?php echo $row['petname']; ?></td>
                        <td><?php echo $row['services']; ?></td>
                        <td><?php echo $row['dateandtime']; ?></td>
                    </tr>
                <?php } ?>


            </table>
        </div>
    </div>

</body>
<script>
    $(document).ready(function() {
        // Create date inputs
        minDate = new DateTime($('#min'), {
            format: 'MMMM Do YYYY'
        });
        maxDate = new DateTime($('#max'), {
            format: 'MMMM Do YYYY'
        });

        // DataTables initialisation
        var table = $('#tblReportData').DataTable();

        // Refilter the table
        $('#min, #max').on('change', function() {
            table.draw();
        });
    });
</script>

</html>