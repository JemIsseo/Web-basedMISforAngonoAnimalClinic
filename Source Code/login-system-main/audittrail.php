<?php
session_start();

include 'connect.php';
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
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="shortcut icon" type="image/x-icon" href="../images/aac.jpg" />
</head>

<body>
    <div class="container">
        <?php include 'aside.php'; ?>

        <!--  Main Tag  -->
        <main>
            <section class="tableaudittrail">
                <div class="accrecsearch">
                    <h1>Audit Trail</h1>
                    <div class="searchbar">
                        <input type="text" placeholder="Search here" id="search-box"><span class="material-symbols-sharp">search</span>
                    </div>
                </div>
                <div class="table-profiletrail">
                    <table class="content-table content-tabletrail" id="auditTrail">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>DateTime</th>
                                <th>IP Address</th>
                                <th>Action Mode</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "Select * from tblaudittrail order by atid desc";
                            $res = mysqli_query($conn, $sql);

                            if ($res) {
                                while ($row = mysqli_fetch_assoc($res)) {
                                    $atid = $row['atid'];
                                    $un = $row['username'];
                                    $dt = $row['datetime'];
                                    $ip = $row['ipaddress'];
                                    $am = $row['actionmode'];
                                    echo '<tr>
                                    <td>' . $atid . '</td>
                                    <td>' . $un . '</td>
                                    <td>' . $dt . '</td>
                                    <td>' . $ip . '</td>
                                    <td>' . $am . '</td>
                                    </tr>';
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
        <!--  End of Main Tag  -->

        <?php include 'systemaccountanddate.php'; ?>

        <!--  Start of Retrive section  -->
        <h1>Refresh Table</h1>

        <div class="buttonmodify">
            <button name="refreshaudittrail" title="Update the lists"><span class="material-symbols-sharp">refresh</span>Refresh List</button>
        </div>
    </div>

    <?php include 'scriptingfiles.php'; ?>
    <script>
        $(document).ready(function() {
            $('#search-box').on('keyup', function() {
                var queryaudittrail = $(this).val();
                $.ajax({
                    url: 'search.php',
                    method: 'POST',
                    data: {
                        search: 1,
                        queryaudittrail: queryaudittrail
                    },
                    success: function(data) {
                        $('#auditTrail').html(data);
                    }
                });
            });
        });
    </script>
</body>

</html>