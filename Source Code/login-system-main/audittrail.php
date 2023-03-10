<?php
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Audit Trail</title>
    <!-- Materical Icons Link -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!-- Stylesheet  -->
    <link rel="stylesheet" href="../css/audittrail.css">
    <link rel="shortcut icon" type="image/x-icon" href="../images/aac.jpg"/>
</head>
<body>
    <div class="container">
        <?php  include 'aside.php'; ?>    

        <!--  Main Tag  -->
        <main>
           
            <section class="tableaudittrail">
                <div class="accrecsearch">
                    <h1>Audit Trail</h1>
                    <div class="searchbar">
                        <input type="text" placeholder="Search here"><span class="material-symbols-sharp">search</span>
                    </div>
                </div>
                <div class="table-profile">
                        <table class="content-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>DateTime</th>
                                    <th>Username</th>
                                    <th>Action Mode</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>11/25/22 8:35</td>
                                    <td>Mimi</td>
                                    <td>Logged in</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>11/25/22 10:54</td>
                                    <td>Yoru</td>
                                    <td>Logged in</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>11/26/22 4:46</td>
                                    <td>Jake</td>
                                    <td>Logged out</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>11/27/22 6:50</td>
                                    <td>Ben</td>
                                    <td>Added stock Quantity</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>11/27/22 6:50</td>
                                    <td>Yoru</td>
                                    <td>Edited a customer profile</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>11/27/22 3:32</td>
                                    <td>Mimi</td>
                                    <td>Logged out</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>11/30/22 3:32</td>
                                    <td>Ben</td>
                                    <td>Edited stock quantity</td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>11/30/22 5:30</td>
                                    <td>Ben</td>
                                    <td>Logged out</td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td>11/30/22 6:50</td>
                                    <td>Yoru</td>
                                    <td>Edited a customer profile</td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>11/30/22 8:40</td>
                                    <td>Yoru</td>
                                    <td>Logged out</td>
                                </tr>
                                <tr>
                                    <td>11</td>
                                    <td>11/30/22 10:32</td>
                                    <td>Jake</td>
                                    <td>Restored account</td>
                                </tr>
                                <tr>
                                    <td>12</td>
                                    <td>12/2/22 3:32</td>
                                    <td>Mimi</td>
                                    <td>Edited a profile</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Choco</td>
                                    <td>3</td>
                                    <td>Male</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Choco</td>
                                    <td>3</td>
                                    <td>Male</td>
                                </tr>
                            </tbody>
                        </table>
                </div>
            </section>
        </main>
        <!--  End of Main Tag  -->
    
        <?php   include 'systemaccountanddate.php'; ?>
         
        <!--  Start of Retrive section  -->
        <h1>Refresh Table</h1>
    
            <div class="buttonmodify">
                <button name="refreshaudittrail" title="Update the lists"><span class="material-symbols-sharp">refresh</span>Refresh List</button> 
            </div>
        <a href="a.php"></a>
        
    </div>

    <?php include 'scriptingfiles.php'; ?>
</body>
</html>

