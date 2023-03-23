<?php 
    session_start();
    
    // Database Connection
    include 'connect.php';

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
    <link rel="shortcut icon" type="image/x-icon" href="../images/aac.jpg"/>
</head>
<body>
    <div class="container">
        <?php  include 'aside.php'; ?>
        <!--  Main Tag  -->
        <main>
            <h1>Dashboard</h1>

            <div class="insights">
                <div class="sales">
                    <span class="material-symbols-sharp">analytics</span>
                         <div class="middle">
                            <div class="left">
                                <h3>Total Sales</h3>
                                <h1>₱435,000</h1>
                            </div>
                            <div class="progress">
                                <svg>
                                    <circle cx='38' cy='38' r='36' ></circle>
                                </svg>
                                <div class="number">
                                    <p>79%</p>
                                </div>
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
                                <h1>10,000</h1>
                            </div>
                            <div class="progress">
                                <svg>
                                    <circle cx='38' cy='38' r='36' ></circle>
                                </svg>
                                <div class="number">
                                    <p>95%</p>
                                </div>
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
                                <h1>300</h1>
                            </div>
                            <div class="progress">
                                <svg>
                                    <circle cx='38' cy='38' r='36' ></circle>
                                </svg>
                                <div class="number">
                                    <p>69%</p>
                                </div>
                            </div>
                        </div>
                        <small class="text-muted">Last 30 Days</small>
                </div>
                <!--  End of Reservation  -->
            </div>
            <section class="recenttrans">
                <h1>Recent Transactions</h1>
                <div class="listoftrans">
                    <div class="tabletransact">
                        <table class="content-table">
                            <thead>
                                <tr>
                                    <th>Transaction No.</th>
                                    <th>Item Name</th>
                                    <th>Quantity</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Dog Soap</td>
                                    <td>4</td>
                                    <td>12/01/2022</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Immunol Vitamin</td>
                                    <td>1</td>
                                    <td>12/03/2022</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Pedigree</td>
                                    <td>3</td>
                                    <td>12/04/2022</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Antibiotic</td>
                                    <td>5</td>
                                    <td>12/07/2022</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Beef Jerky Food</td>
                                    <td>10</td>
                                    <td>12/10/2022</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </main>

        <!--  End of Main Tag  -->
        <?php   include 'systemaccountanddate.php'; ?>

            <div class="schedule">
                <h2>Schedule Reservations</h2>
                <div class="schedinfo">
                        <table class="content-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Owner's Name</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Kristina Salinga</td>
                                    <td>11/24/2022</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Brill Egualada</td>
                                    <td>11/07/2022</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Jeremy Liberty</td>
                                    <td>12/15/2022</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Vann Oliveros</td>
                                    <td>12/23/2022</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Roahn Vallega</td>
                                    <td>12/29/2022</td>
                                </tr>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>

    </div>

    <?php include 'scriptingfiles.php'; ?>
</body>
</html>

