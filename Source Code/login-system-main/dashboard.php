<?php
session_start();

// Database Connection
include 'connect.php';

$resultSumSales = $conn->query("SELECT SUM(totalprice) AS totalsales FROM tbltransaction");
$rowSumSales = $resultSumSales->fetch_assoc();
$totalsales = $rowSumSales['totalsales'];

$resultSumStock = $conn->query("SELECT SUM(quantity) AS totalstock FROM tblstock");
$rowSumStock = $resultSumStock->fetch_assoc();
$totalstock = $rowSumStock['totalstock'];

$resultSumAppointments = $conn->query("SELECT COUNT(queueno) AS totalappointments FROM tblappointments");
$rowSumAppointments = $resultSumAppointments->fetch_assoc();
$totalappointments = $rowSumAppointments['totalappointments'];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Materical Icons Link -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!-- Stylesheet  -->
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="shortcut icon" type="image/x-icon" href="../images/aac.jpg" />
</head>

<body>
    <div class="container">
        <?php include 'aside.php'; ?>
        <!--  Main Tag  -->
        <main>
            <h1>Dashboard</h1>
            <div class="insights">
                <div class="sales">
                    <span class="material-symbols-sharp">analytics</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Total Sales</h3>
                            <h1><?php echo '₱ ' . number_format($totalsales); ?></h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx='38' cy='38' r='36'></circle>
                            </svg>
                        </div>
                    </div>
                    <small class="text-muted">Last 30 Days</small>
                </div>
                <!--  End of Sales  -->
                <div class="stock">
                    <span class="material-symbols-sharp">storage</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Total Stocks</h3>
                            <h1><?php echo $totalstock; ?></h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx='38' cy='38' r='36'></circle>
                            </svg>
                        </div>
                    </div>
                    <small class="text-muted">Last 30 Days</small>
                </div>
                <!--  End of Stock  -->
                <div class="reservation">
                    <span class="material-symbols-sharp">snippet_folder</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Total Reservations</h3>
                            <h1><?php echo $totalappointments; ?></h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx='38' cy='38' r='36'></circle>
                            </svg>
                        </div>
                    </div>
                    <small class="text-muted">Last 30 Days</small>
                </div>
                <!--  End of Reservation  -->
            </div>
         
            <section class="recenttrans">
                <h1>Recent Transactions</h1>
                <!-- Modal of Transaction History -->
                
                <div class="modal" id="modal8">
                    <div class="modal-content">
                        <div class="modal-body">
                            <section class="tableprofile">
                                <div class="table-profile">
                                    <table class="content-table tblhistory" id="searchTransaction">
                                        <thead>
                                            <tr>
                                                <th>Transaction ID</th>
                                                <th>Username</th>
                                                <th>Owner's Name</th>
                                                <th>Total Price</th>
                                                <th>Date</th>
                                                <th> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = "Select * from tbltransaction order by transactionid desc";
                                            $res = mysqli_query($conn, $sql);

                                            if ($res) {
                                                while ($row = mysqli_fetch_assoc($res)) {
                                                    $tid = $row['transactionid'];
                                                    $un = $row['username'];
                                                    $op = $row['ownersname'];
                                                    $tprc = $row['totalprice'];
                                                    $date = $row['date'];
                                                    echo '<tr>
                                        <td>' . $tid . '</td>
                                        <td>' . $un . '</td>
                                        <td>' . $op . '</td>
                                        <td>' . number_format($tprc, 2) . '</td>
                                        <td>' . $date . '</td>
                                        </tr>';
                                                }
                                            }
                                            ?>

                                        </tbody>

                                    </table>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>

            </section>
        </main>

        <!--  End of Main Tag  -->
        <?php include 'systemaccountanddate.php'; ?>

        <div class="schedule">
            <h2>Scheduled Reservations</h2>
            <div class="table-profile">
                            <table class="content-table">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "Select * from tblappointments";
                                    $res = mysqli_query($conn, $sql);

                                    if ($res) {
                                        while ($row = mysqli_fetch_assoc($res)) {
                                            $qno = $row['queueno'];
                                            $cname = $row['clientname'];
                                            $dt = $row['dateandtime'];


                                            echo '<tr>
                                    <td>' . $qno . '</td>
                                    <td>' . $cname . '</td>
                                    <td>' . $dt . '</td>
                                    <td>
                                    </td>
                                    </tr>';
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>

    </div>

    <?php include 'scriptingfiles.php'; ?>
</body>

</html>