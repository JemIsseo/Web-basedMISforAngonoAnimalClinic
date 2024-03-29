<?php
session_start();
include 'authcheck.php';
include 'connect.php';

$spet = mysqli_query($conn, "select * from tblpet where archive= 'false' ");
$ss = mysqli_query($conn, "select * from tblownersprofile where archive= 'false'");
$s = mysqli_query($conn, "select * from tblservices");

if (isset($_POST['savequeue'])) {
    $cid = $_POST['cname'];
    $pname = $_POST['pname'];
    $ser = $_POST['services'];
    $dt = $_POST['datetime'];

    $sqls = "Select * from tblappointments where queueno = ''";
    $result = mysqli_query($conn, $sqls);

    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num > 0) { ?>
            <div class="statusmessageerror message-box" id="close">
                <h2>Sorry Appointment already booked!</h2>
                <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
            </div>
            <?php
        } else {
            $sqls1 = "SELECT * FROM tblpet WHERE cusid = $cid";
            $result1 = mysqli_query($conn, $sqls1);
            $row1 = $result1->fetch_assoc();
            $cname = $row1['ownersname'];

            $ipaddress = $_SERVER['REMOTE_ADDR'];
            $result = mysqli_query($conn, "INSERT INTO tblaudittrail (username, ipaddress, actionmode) 
            VALUES ('" . $_SESSION['username'] . "','$ipaddress','Booked a service in appointments module')");

            // Insert into database
            $sql = "insert into tblappointments(clientname, petname, services, dateandtime, scheduled, status) 
                    values('$cname','$pname','$ser','$dt','Yes','In Progress')";
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
            <h1 class="primary-variant">ANGONO<span class="success"> ANIMAL CLINIC</span> & PET GROOMING CENTER</h1>
            <section class="table-profile">
                <h2>Queueing</h2>
                <div class="modal-bodyy">

                    <form action="" method="POST">
                        <div class="formprofile">
                            <div>
                                <select class="radiobtn" name="cname" id="cusid" required>
                                    <option disabled selected style="display: none" value="">Choose Client Name</option>
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
                                <select class="radiobtn" name="pname" id="petid" required>
                                    <option disabled selected style="display: none" value="">Choose Pet</option>
                                </select>Pet Name
                            </div>
                            <div>
                                <select class="radiobtn" name="services" id="option" required>
                                  <option disabled selected style="display: none" value="">Choose Services</option>
                                  <?php while ($r = mysqli_fetch_array($s)) { ?>
                                    <option value="<?php echo $r['services']; ?>"><?php echo $r['services']; ?></option>
                                  <?php } ?>
                                  <option value="Others:">Other</option>
                                </select>Services
                                
                                <div id="otherOption" style="display:none;">
                                  <label for="otherOptionInput"></label>
                                  <input type="text" id="otherOptionInput" placeholder="Enter other option" name="other_services">
                                </div>

                            </div>
                            <div>
                                <input type="datetime-local" name="datetime" placeholder="Date and Time" min="2023-05-01T08:00" max="2050-12-30T16:00" required>
                                <span>Date & Time</span>
                            </div>
                        </div>
                        <div class="buttonflexright">
                            <button name="savequeue" type="submit" class="save" title="Save the queueing">Get Appointment</button>
                            <button class="cancel" title="Clear all inputs">Clear</button>
                        </div>
                    </form>
                    <div class="table-appointments">
                        <h2>Recent Booked Appointments</h2>
                        <div class="searchbar">
                            <input type="text" placeholder="Search here" id="search-box"><span class="material-symbols-sharp">search</span>
                        </div>
                        <div class="table-appointments-sample">
                            <table class="content-table" id="searchAppointments">
                                <thead>
                                    <tr>
                                        <th>Queue No</th>
                                        <th>Date and Time</th>
                                        <th>Client Name</th>
                                        <th>Pet Name</th>
                                        <th>Service to Avail</th>
                                        <th>Status</th>
                                        <th> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "Select * from tblappointments where scheduled = 'Yes' order by queueno desc";
                                    $res = mysqli_query($conn, $sql);

                                    if ($res) {
                                        while ($row = mysqli_fetch_assoc($res)) {
                                            $qno = $row['queueno'];
                                            $dt = date("M d, Y \n,h:i:sA ", strtotime($row['dateandtime']));
                                            $cname = $row['clientname'];
                                            $pname = $row['petname'];
                                            $ser = $row['services'];
                                            $stat = strtotime($row['status']);
                                            
                                        $current_date = date("M d, Y \n,h:i:sA");

                                        if ($current_date > $dt) {
                                          $curstat = "Completed";
                                        } else {
                                          $curstat = "In progress";
                                        }
                                        $_SESSION['curstat'] = $curstat;
                                            echo '<tr>
                                    <td>' . $qno . '</td>
                                    <td>' . $dt . '</td>
                                    <td>' . $cname . '</td>
                                    <td>' . $pname . '</td>
                                    <td>' . $ser . '</td>
                                    <td>' . $curstat. '</td>
                                    <td>
                                    <form action="">
                                    <button class="modal-open showRemoveAppointment" value="' . $qno . '" ><span class="material-symbols-sharp remove" title="Delete this appointment">delete</span>
                                    </button>
                                    </form>
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
            </section>

            <!--  End of profile   -->
        </main>

        <!--  End of Main Tag  -->
        <?php include 'systemaccountanddate.php'; ?>
        
        <!-- Modal of  Select Profile MessageBox -->
        <div class="modal">
            <div class="modal-content">
                <div class="modal-body" id="removeAppointment">

                </div>
            </div>
        </div>
        
        
        
        <?php include 'scriptingfiles.php';
        ?>

        <script>
            $(document).ready(function() {
                // REMOVE APPOINTMENT DOCUMENT FORMS
                $(".showRemoveAppointment").click(function() {
                    var removeappointmentid = this.value;
                    $("#removeAppointment").load("submit.php", {
                        removeappointmentID  : removeappointmentid
                    })
                })
            })
            
            $(document).ready(function() {
                $("#cusid").on('click', function() {
                    var cusid = $(this).val();
                    if (cusid) {
                        $.ajax({
                            type: 'POST',
                            url: 'cascadingdropdown.php',
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
                    var queryappointment = $(this).val();
                    $.ajax({
                        url: 'search.php',
                        method: 'POST',
                        data: {
                            search: 1,
                            queryappointment: queryappointment
                        },
                        success: function(data) {
                            $('#searchAppointments').html(data);
                        }
                    });
                });
            });
            
            $(document).ready(function() {
              $("#option").change(function() {
                if ($(this).val() == "Others:") {
                  $("#otherOption").show();
                  $("#otherOptionInput").attr("name", "services"); // update name attribute
                } else {
                  $("#otherOption").hide();
                  $("#otherOptionInput").removeAttr("name"); // remove name attribute
                }
              });
            });

        </script>
</body>

</html>