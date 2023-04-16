<?php
session_start();
include 'authcheck.php';
include 'connect.php';

$spet = mysqli_query($conn, "select * from tblpet");
$ss = mysqli_query($conn, "select * from tblownersprofile");
$s = mysqli_query($conn, "select * from tblservices");

if (isset($_POST['savequeue'])) {
    $cid = $_POST['cname'];
    $pname = $_POST['pname'];
    $ser = $_POST['services'];
    $dt = $_POST['datetime'];
    $prc = $_POST['price'];

    $sqls = "Select * from tblappointments where queueno = ''";
    $result = mysqli_query($conn, $sqls);


    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num > 0) { ?>
            <div class="statusmessageerror message-box" id="close">
                <h2>Sorry Owners Name already exist!</h2>
                <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
            </div>
            <?php
        } else {
            $sqls1 = "SELECT * FROM tblpet WHERE cusid = $cid";
            $result1 = mysqli_query($conn, $sqls1);
            $row1 = $result1->fetch_assoc();
            $cname = $row1['ownersname'];
            // Insert into database
            $sql = "insert into tblappointments(clientname,petname, services, dateandtime) 
                    values('$cname','$pname','$ser','$dt')";
            $res = mysqli_query($conn, $sql);
            if ($res) { ?>
                <div class="statusmessagesuccess message-box" id="close">
                    <h2>Appointment Confirmed!</h2>
                    <button class="icon"><span class="material-symbols-sharp">close</span></button>
                </div>
        <?php
            }
        }
    } else {
        die(mysqli_error($conn));
    }
}

if (isset($_POST['updateprofile'])) {
    $proid = $_POST['profileid'];
    $pname = $_POST['petname'];
    $age = $_POST['age'];
    $utsex = $_POST['sex'];
    $weight = $_POST['weight'];
    $owner = $_POST['owner'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $sql = "update tblprofile set profileid ='$proid',petname ='$pname', 
                age='$age',sex ='$utsex',weight ='$weight', ownername ='$owner',phone ='$phone', email='$email' 
                where profileid= $proid";
    $res = mysqli_query($conn, $sql);
    if ($res) { ?>
        <div class="statusmessagesuccess" id="close">
            <h2>Profile Updated Successfully!</h2>
            <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
        </div>

    <?php
    } else {
        die(mysqli_error($conn));
    }
}

// archive statement
if (isset($_POST['savearchiveprofile'])) {
    $pname = $_POST['petname'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $weight = $_POST['weight'];
    $owner = $_POST['owner'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $sql = "insert into tblarcprofile(petname, age, sex, weight, owner, phone, email) 
                values('$pname','$age','$sex','$weight','$owner','$phone','$email')";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        if ($proid = $_POST['profileid']) {
            $sql = "delete from tblprofile where profileid= $proid";
            $res = mysqli_query($conn, $sql);
        }
    ?>
        <div class="statusmessagesuccess" id="close">
            <h2>Appointment has been archived</h2>
            <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
        </div>

<?php
    } else {
        die(mysqli_error($conn));
    }
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments</title>
    <!-- Materical Icons Link -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!-- Stylesheet  -->
    <link rel="stylesheet" href="../css/appointments.css">
    <link rel="shortcut icon" type="image/x-icon" href="../images/aac.jpg" />
</head>

<body>
    <div class="container">
        <?php include 'aside.php'; ?>

        <!--  Main Tag  -->
        <main>
            <h1>Appointments</h1>
            <section class="table-profile">
                <div class="allbuttons">
                    <div class="buttons">
                        <div class="buttonmodify">
                            <a href="https://www.facebook.com/AACPGC">
                                <button class="olappoint" title="Online Appointment"><img src="../images/appointment.png"></button>
                                <h2>Online Appointment</h2>
                            </a>
                        </div>
                    </div>
                    <div class="buttons">
                        <div class="buttonmodify">
                            <button class="modal-open" data-modal="modal1" title="Queueing"><img src="../images/queueing.jpg"></button>
                            <h2>Queueing</h2>
                        </div>
                    </div>
                </div>
            </section>

            <!--  End of profile   -->
        </main>

        <!--  End of Main Tag  -->
        <?php include 'systemaccountanddate.php'; ?>
        
        <!-- Start of Modal -->

        <!-- Modal of Edit Profile -->
        <div class="modal" id="modal1">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Queueing</h1>
                    <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                </div>
                <div class="modal-body">

                    <form action="" method="POST">
                        <div class="formprofile">
                            <div>
                                <select class="radiobtn" name="cname" id="cusid">
                                    <option value="">Choose Client Name</option>
                                    <?php
                                    while ($re = mysqli_fetch_array($ss)) {
                                    ?>
                                        <option value="<?php echo $re['cusid']; ?>"><?php echo $re['ownersname']; ?> </option>
                                    <?php
                                    }
                                    ?>
                                </select>Client Name
                            </div>
                            <div>
                                <select class="radiobtn" name="pname" id="petid">
                                    <option value="">Choose Pet</option>
                                </select>Pet Name
                            </div>
                            <div>
                                <select class="radiobtn" name="services" id="ut">
                                    <option value="">Choose Services</option>
                                    <?php
                                    while ($r = mysqli_fetch_array($s)) {
                                    ?>
                                        <option value="<?php echo $r['services']; ?>"><?php echo $r['services']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>Services
                            </div>
                            <div>
                                <input type="datetime-local" name="datetime" placeholder="Date and Time" required>
                                <span>Date & Time</span>
                            </div>
                        </div>
                        <div class="buttonflexright">
                            <button name="savequeue" type="submit" class="save" title="Save the queueing">Save</button>
                            <button class="cancel" title="Clear all inputs">Clear</button>
                        </div>
                    </form>
                    <div>
                        <div class="searchbar">
                            <input type="text" placeholder="Search here" id="search-box"><span class="material-symbols-sharp">search</span>
                        </div>
                        <div class="table-appointments-sample">
                            <table class="content-table" id="searchAppointments">
                                <thead>
                                    <tr>
                                        <th>Queue No</th>
                                        <th>Client Name</th>
                                        <th>Pet Name</th>
                                        <th>Services</th>
                                        <th>Date and Time</th>
                                        <th> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "Select * from tblappointments order by queueno desc";
                                    $res = mysqli_query($conn, $sql);

                                    if ($res) {
                                        while ($row = mysqli_fetch_assoc($res)) {
                                            $qno = $row['queueno'];
                                            $cname = $row['clientname'];
                                            $pname = $row['petname'];
                                            $ser = $row['services'];
                                            $dt = $row['dateandtime'];


                                            echo '<tr>
                                    <td>' . $qno . '</td>
                                    <td>' . $cname . '</td>
                                    <td>' . $pname . '</td>
                                    <td>' . $ser . '</td>
                                    <td>' . $dt . '</td>
                                    <td>
                                    <button class="modal-open showUpdateAppointment" data-modal="modal1" value="' . $qno . '" ><span class="material-symbols-sharp remove" title="Delete this appointment">delete</span></button>
                                    </td>
                                    </tr>';
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>

            <!-- TABLE OF OWNERS  -->

        </div>


        <!-- Modal of Archive Profile MessageBox -->
        <div class="modal" id="modal2">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Archive Appointments</h1>
                    <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                </div>
                <div class="modal-body" id="archiveProfile">
                </div>
            </div>
        </div>

        <!-- Modal of Restore Profile -->
        <div class="modal" id="modal4">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Restore Appointment</h1>
                    <div class="accrecsearch">
                        <div class="searchbar">
                            <input type="text" placeholder="Search here" id="live-search"><span class="material-symbols-sharp">search</span>
                            <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                        </div>
                    </div>
                </div>

                <div class="modal-body" id="viewArchive">
                    <section class="tableprofile">
                        <div class="table-profile">
                            <table class="content-table table-archive">
                                <thead>
                                    <tr>
                                        <th>ProfileID</th>
                                        <th>Name</th>
                                        <th>Age</th>
                                        <th>Sex</th>
                                        <th>Weight</th>
                                        <th>Owner</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "Select * from tblarcprofile";
                                    $res = mysqli_query($conn, $sql);

                                    if ($res) {
                                        while ($row = mysqli_fetch_assoc($res)) {
                                            $proid = $row['profileid'];
                                            $pname = $row['petname'];
                                            $age = $row['age'];
                                            $sex = $row['sex'];
                                            $weight = $row['weight'];
                                            $owner = $row['owner'];
                                            $phone = $row['phone'];
                                            $email = $row['email'];
                                            echo '<tr>
                                    <td>' . $proid . '</td>
                                    <td>' . $pname . '</td>
                                    <td>' . $age . '</td>
                                    <td>' . $sex . '</td>
                                    <td>' . $weight . '</td>
                                    <td>' . $owner . '</td>
                                    <td>' . $phone . '</td>
                                    <td>' . $email . '</td>
                                    <td>
                                    <button class="modal-open viewRestoreProfile" data-modal="modal5" value="' . $proid . '" >
                                        <span class="material-symbols-sharp restore" title="Unarchiving">unarchive</span>
                                    </button> 
                                    </td>
                                    </tr>';
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                    </section>
                </div>
                <div class="modal-footer">
                    <div class="buttonflexright">
                        <button class="modal-close cancel"><span title="Cancel">Cancel</span></button>
                    </div>
                </div>

            </div>
        </div>

        <!-- Modal of Restore Profile MessageBox -->
        <div class="modal" id="modal5">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Unarchive Appointments</h1>
                    <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                </div>
                <div class="modal-body" id="restoreProfile">
                </div>
            </div>
        </div>

        <?php include 'scriptingfiles.php'; ?>
        <script>
            $(document).ready(function() {
                $("#cusid").on('click', function() {
                    var cusid = $(this).val();
                    if (cusid) {
                        $.ajax({
                            type: 'POST',
                            url: 'submit.php',
                            data: 'cusid=' + cusid,
                            success: function(html) {
                                $("#petid").html(html);
                            }
                        });
                    }
                });
            });

            $(document).ready(function() {
                    $('#search-box').on('keyup', function() {
                        var queryappointments = $(this).val();
                        $.ajax({
                            url: 'search.php',
                            method: 'POST',
                            data: {
                                search: 1,
                                queryappointments: queryappointments
                            },
                            success: function(data) {
                                $('#searchAppointments').html(data);
                            }
                        });
                    });
                });
        </script>
</body>

</html>