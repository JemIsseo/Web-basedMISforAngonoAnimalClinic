<?php
session_start();
include 'authcheck.php';
include 'connect.php';

$s = mysqli_query($conn, "select * from tblownersprofile");
$p = mysqli_query($conn, "select * from tblpettype");
$b = mysqli_query($conn, "select * from tblbreed");

// Save Owners Name Profile
if (isset($_POST['saveownersprofile'])) {
    $op = $_POST['ownersprofile'];
    $cn = $_POST['contactno'];
    $add = $_POST['address'];
    $emailadd = $_POST['emailaddress'];

    $sqls = "Select * from tblownersprofile where ownersname = '$op'";
    $result = mysqli_query($conn, $sqls);

    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num > 0) { ?>
            <div class="statusmessageerror message-box" id="close">
                <h2>Sorry owner's name <?php echo $op; ?> already exist!</h2>
                <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
            </div>
            <?php
        } else {
            // Insert into database
            $sql = "insert into tblownersprofile(ownersname, contactno, address, emailaddress, archive) 
                                        values('$op',' $cn',' $add','$emailadd', 'false')";
            $res = mysqli_query($conn, $sql);
            if ($res) {
                $ipaddress = $_SERVER['REMOTE_ADDR'];
                $result = mysqli_query($conn, "INSERT INTO tblaudittrail (username, ipaddress, actionmode) 
                    VALUES ('" . $_SESSION['username'] . "','$ipaddress','Added owners profile in customer module')");
            ?>
                <div class="statusmessagesuccess message-box" id="close">
                    <h2>Owner Profile Added Successfully!</h2>
                    <button class="icon"><span class="material-symbols-sharp">close</span></button>
                </div>
        <?php
            }
        }
    }
}

// UPDATE OWNERSPROFILE STATEMENT 
if (isset($_POST['updateownersprofile'])) {
    $cid = $_POST['cusid'];
    $op = $_POST['ownersprofile'];
    $cno = $_POST['contactno'];
    $add = $_POST['address'];
    $ea = $_POST['emailaddress'];

    $sql = "update tblownersprofile set ownersname ='$op',
                contactno ='$cno', address='$add', emailaddress='$ea'
                where cusid= '$cid'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        $ipaddress = $_SERVER['REMOTE_ADDR'];
        $result = mysqli_query($conn, "INSERT INTO tblaudittrail (username, ipaddress, actionmode) 
        VALUES ('" . $_SESSION['username'] . "','$ipaddress','Updated ownersprofile in customer module')");
        ?>
        <div class="statusmessagesuccess message-box" id="close">
            <h2>Owners Profile Updated Successfully!</h2>
            <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
        </div>
    <?php
    } else {
        die(mysqli_error($conn));
    }
}


// archive statement
if (isset($_POST['savearchiveprofile'])) {
    $sql = "update tblownersprofile set archive = 'true' where ownersname ='" . $_SESSION['archiveownersprofileid'] . "'";
    $res = mysqli_query($conn, $sql);

    $ipaddress = $_SERVER['REMOTE_ADDR'];
    $result = mysqli_query($conn, "INSERT INTO tblaudittrail (username, ipaddress, actionmode) 
        VALUES ('" . $_SESSION['username'] . "','$ipaddress','Archived ownersprofile in customer module')");
    ?>
    <div class="statusmessagesuccesslight message-box" id="close">
        <h2>Profile has been archived</h2>
        <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
    </div>
<?php
}

// archive pet profile statement
if (isset($_POST['savearchivepet'])) {
    $sql = "update tblpet set archive = 'true' where petid ='" . $_SESSION['archivepetprofileID'] . "'";
    $res = mysqli_query($conn, $sql);

    $ipaddress = $_SERVER['REMOTE_ADDR'];
    $result = mysqli_query($conn, "INSERT INTO tblaudittrail (username, ipaddress, actionmode) 
        VALUES ('" . $_SESSION['username'] . "','$ipaddress','Archived petprofile in customer module')");
?>
    <div class="statusmessagesuccesslight message-box" id="close">
        <h2>Pet has been archived</h2>
        <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
    </div>
<?php
}

// restore statement
if (isset($_POST['saverestoreprofile'])) {
    $sql = "update tblownersprofile set archive = 'false' where ownersname ='" . $_SESSION['restoreownersprofileid'] . "'";
    $res = mysqli_query($conn, $sql);

    $ipaddress = $_SERVER['REMOTE_ADDR'];
    $result = mysqli_query($conn, "INSERT INTO tblaudittrail (username, ipaddress, actionmode) 
        VALUES ('" . $_SESSION['username'] . "','$ipaddress','Restored ownersprofile in customer module')");
?>
    <div class="statusmessagesuccess message-box" id="close">
        <h2>Profile has been restored!</h2>
        <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
    </div>

    <?php
}

// Save Pet Profile
if (isset($_POST['savepetprofile'])) {

    $op = $_POST['ownersname'];
    $pname = $_POST['petname'];
    $ptype = $_POST['pettype'];
    $sex = $_POST['sex'];
    $breed  = $_POST['breed'];
    $age = $_POST['age'];
    $weight = $_POST['weight'];

    $sql2 = "SELECT * FROM tblownersprofile WHERE ownersname = '$op'";
    $result = mysqli_query($conn, $sql2);
    $row2 = $result->fetch_assoc();
    $cusid = $row2['cusid'];

    $sqls1 = "SELECT * FROM tblpettype WHERE pettypeid = '$ptype'";
    $result1 = mysqli_query($conn, $sqls1);
    $row1 = $result1->fetch_assoc();
    $ptype = $row1['pettype'];
    // Insert into database

    $sql = "insert into tblpet(cusid, ownersname, petname, pettype, age, sex, breed, weight, archive) 
            values('$cusid','$op','$pname','$ptype','$age','$sex','$breed','$weight kg','false')";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        $ipaddress = $_SERVER['REMOTE_ADDR'];
        $result = mysqli_query($conn, "INSERT INTO tblaudittrail (username, ipaddress, actionmode) 
            VALUES ('" . $_SESSION['username'] . "','$ipaddress','Added pet profile in customer module')");
    ?>
        <div class="statusmessagesuccess message-box" id="close">
            <h2>Pet Profile Added Successfully!</h2>
            <button class="icon"><span class="material-symbols-sharp">close</span></button>
        </div>
        <?php
    }
}

// update pet statement
// upload photo statement 
if (isset($_POST['uploadphoto']) && isset($_FILES['image'])) {
    $pid = $_POST['petid'];

    $img_name = $_FILES['image']['name'];
    $img_size = $_FILES['image']['size'];
    $tmp_name = $_FILES['image']['tmp_name'];

    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
    $img_ex_lc = strtolower($img_ex);

    $allowed_exs = array("jpg", "jpeg", "png");

    if (in_array($img_ex_lc, $allowed_exs)) {
        $img = uniqid("IMG-", true) . '.' . $img_ex_lc;
        $img_upload_path = 'uploads/' . $img;
        move_uploaded_file($tmp_name,  $img_upload_path);

        $sql = "update tblpet set image='$img' 
                        where petid= '$pid'";
        $res = mysqli_query($conn, $sql);
        if ($res) {
            $ipaddress = $_SERVER['REMOTE_ADDR'];
            $result = mysqli_query($conn, "INSERT INTO tblaudittrail (username, ipaddress, actionmode) 
                    VALUES ('" . $_SESSION['username'] . "','$ipaddress','Uploaded a photo in pet profile')");
        ?>
            <div class="statusmessagesuccess message-box" id="close">
                <h2>Pet Photo Completed!</h2>
                <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
            </div>
        <?php
        }
    } else {
        ?>
        <div class="statusmessageerror message-box" id="close">
            <h2>Uploading failed. Only image is allowed!</h2>
            <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
        </div>
    <?php
    }
}

// account update statement 
if (isset($_POST['updatepet'])) {
    $pid = $_POST['petid'];
    $op = $_POST['ownersname'];
    $pname = $_POST['petname'];
    $pt = $_POST['pettype'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $breed = $_POST['breed'];
    $weight = $_POST['weight'];

    $sql1 = "SELECT * FROM tblpettype WHERE pettypeid = '$pt'";
    $res1 = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_assoc($res1);
    $pettype = $row['pettype'];

    $sql = "update tblpet set petname ='$pname', pettype='$pettype', age ='$age', sex='$sex', breed ='$breed', weight='$weight' where petid= '$pid'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        $ipaddress = $_SERVER['REMOTE_ADDR'];
        $result = mysqli_query($conn, "INSERT INTO tblaudittrail (username, ipaddress, actionmode) 
                VALUES ('" . $_SESSION['username'] . "','$ipaddress','Edited pet profile in customers module')");
    ?>
        <div class="statusmessagesuccess message-box" id="close">
            <h2>Pet Profile Updated Successfully!</h2>
            <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
        </div>
    <?php
    } else {
        die(mysqli_error($conn));
    }
}




// restore statement
if (isset($_POST['saverestorepet'])) {
    $sql = "update tblpet set archive = 'false' where petid ='" . $_SESSION['restorepetprofileid'] . "'";
    $res = mysqli_query($conn, $sql);

    $ipaddress = $_SERVER['REMOTE_ADDR'];
    $result = mysqli_query($conn, "INSERT INTO tblaudittrail (username, ipaddress, actionmode) 
        VALUES ('" . $_SESSION['username'] . "','$ipaddress','Restored ownersprofile in customer module')");
    ?>
    <div class="statusmessagesuccess message-box" id="close">
        <h2>Pet Profile has been restored!</h2>
        <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
    </div>

<?php
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer</title>
    <!-- Materical Icons Link -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!-- Stylesheet  -->
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="shortcut icon" type="image/x-icon" href="../images/aac.jpg" />
</head>

<body>
    <div class="container">
        <?php include 'aside.php'; ?>

        <!--  Main Tag  -->
        <main>
            <h1 class="primary-variant">ANGONO<span class="success"> ANIMAL CLINIC</span> & PET GROOMING CENTER</h1>
            <section class="table-profile" id="editPet">
                <!-- Modal of Owners Profile -->
                <div class="profile">
                    <div>
                        <div class="flexadd">
                            <h1>Owners Profile</h1>
                            <div class="searchbar">
                                <input type="text" placeholder="Search here" id="search-box"><span class="material-symbols-sharp">search</span>
                            </div>
                            <h2>Add Profile <span class="material-symbols-sharp add modal-open" data-modal="modal1">add_circle</span></h2>


                        </div>
                        <div>
                                <div class="table-profile-sample" id="ownersName">
                                    <table class="content-table table-archive">
                                        <thead>
                                            <tr>
                                                <th>Owner's Name</th>
                                                <th>Contact No.</th>
                                                <th>Address</th>
                                                <th>Email Address</th>
                                                <th> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = "Select * from tblownersprofile where archive = 'false' order by ownersname";
                                            $res = mysqli_query($conn, $sql);

                                            if ($res) {
                                                while ($row = mysqli_fetch_assoc($res)) {
                                                    $op = $row['ownersname'];
                                                    $cn = $row['contactno'];
                                                    $add = $row['address'];
                                                    $emailadd = $row['emailaddress'];
                                                    echo '<tr>
                                        <td>' . $op . '</td>
                                        <td>' . $cn . '</td>
                                        <td>' . $add . '</td>
                                        <td>' . $emailadd . '</td>
                                        <td>
                                        <button class="modal-open showUpdateProfile" data-modal="modal6" value="' . $op . '" ><span class="material-symbols-sharp edit" title="Edit this account">edit</span></button>
                                        <button class="modal-open showArchiveProfile" data-modal="modal9" value="' . $op . '"><span class="material-symbols-sharp archive" title="Archive the record">archive</span></button>
                                        <button class="modal-open showPetProfile" data-modal="modal3" value="' . $op . '"><span class="material-symbols-sharp pet">sound_detection_dog_barking</span></button>
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

                    <!-- TABLE OF OWNERS  -->

                </div>

            </section>

            <!--  End of profile   -->
        </main>

        <!--  End of Main Tag  -->
        <?php include 'systemaccountanddate.php'; ?>
        <!--  Start of Retrieve section  -->
        <h1>Retrieve Record</h1>
        <div class="buttons">
            <div class="buttonmodify">
                <button class="modal-open" data-modal="modal8" title="View Owners Archive"><span class="material-symbols-sharp">table_view</span>View Archive Owner</button>
            </div>
        </div>
        <div class="buttons">
            <div class="buttonmodify">
                <button class="modal-open" data-modal="modal10" title="View and Restore Pet"><span class="material-symbols-sharp">table_view</span>View Archive Pet</button>
            </div>
        </div>
        <!-- Start of Modal -->
        <!-- Modal of Profile -->
        <div class="modal" id="modal1">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Create Profile</h1>
                    <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                </div>
                <div class="modal-body">
                        <form action="" method="POST"> 
                            <div class="formprofile formmodify">
                                <div>
                                    <input type="text" name="ownersprofile" placeholder="Enter Name" required>
                                    <span>Owner's Name</span>
                                </div>
                                <div>
                                    <input type="number" name="contactno" placeholder="Enter Phone Number" required>
                                    <span>Contact No.</span>
                                </div>
                                <div>
                                    <input type="text" name="address" placeholder="Enter Address" required>
                                    <span>Address</span>
                                </div>
                                <div>
                                    <input type="text" name="emailaddress" placeholder="Enter Email Address" required>
                                    <span>Email Address</span>
                                </div>
                            </div>
                            <div class="buttonflexright">
                                <button name="saveownersprofile" type="submit" class="save" title="Save the record">Save</button>
                                <button class="cancel modal-close" title="Clear all inputs">Cancel</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>


        <!-- Modal of Pet Med History MessageBox INCOMPLETEEEEEE -->
        <div class="modal" id="modal2">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Pet Medical History</h1>
                    <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                </div>
                <div class="modal-body" id="archiveProfile">
                    <div class="radiobtn">
                        <select class="radiobtn" name="selectowners" id="utservices">
                            <option value="">Select Owner's Name</option>
                            <?php
                            while ($r = mysqli_fetch_array($s)) {
                            ?>
                                <option value="<?php echo $r['ownersname']; ?>"><?php echo $r['ownersname']; ?> </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div>
                        <div class="searchbar">
                            <input type="text" placeholder="Search here" onkeyup="searchProfile(this.value)"><span class="material-symbols-sharp">search</span>
                        </div>
                        <div class="table-profile-sample">
                            <table class="content-table table-archive">
                                <thead>
                                    <tr>
                                        <th>Medical History No.</th>
                                        <th>Client Name</th>
                                        <th>Pet Name</th>
                                        <th>Services</th>
                                        <th>Date and Time</th>
                                        <th> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "Select * from tblappointments order by dateandtime desc";
                                    $res = mysqli_query($conn, $sql);

                                    if ($res) {
                                        while ($row = mysqli_fetch_assoc($res)) {
                                            $medhisno = $row['queueno'];
                                            $cname = $row['clientname'];
                                            $pname = $row['petname'];
                                            $services = $row['services'];
                                            $dnt = $row['dateandtime'];
                                            echo '<tr>
                                        <td>' . $medhisno . '</td>
                                        <td>' . $cname . '</td>
                                        <td>' . $pname . '</td>
                                        <td>' . $services . '</td>
                                        <td>' . $dnt . '</td>
                                        <td>
                                        <button class="modal-open showUpdateProfile" data-modal="modal1" value="' . $medhisno . '" ><span class="material-symbols-sharp edit" title="Edit this account">edit</span></button>
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
        </div>

        <!-- Modal of Pet Profile -->
        <div class="modal" id="modal4">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Pet Registration</h1>
                    <div class="accrecsearch">
                        <div class="searchbar">
                            <button class="icon modal-close "><span class="material-symbols-sharp">close</span></button>
                        </div>
                    </div>
                </div>
                <?php
                $s = mysqli_query($conn, "select * from tblownersprofile where archive ='false' ");
                $p = mysqli_query($conn, "select * from tblpettype");
                $b = mysqli_query($conn, "select * from tblbreed");
                ?>
                <div class="modal-body" id="viewArchive">
                    <div class="table-profile-sample profile-sample-short">
                        <!-- PASTE REGISTRATION FORM HERE -->
                        <form action="" method="POST">
                            <div class="formprofile">
                                <div>
                                    <input type="text" name="ownersname" disabled value="<?php echo $op; ?>" required>
                                    <span>Ownersname</span>
                                </div>

                                <div>
                                    <input type="text" name="petname" placeholder="Enter Pet Name" required>
                                    <span>Pet Name</span>
                                </div>
                                <div>
                                    <select class="radiobtn cbo" name="sex" id="ut" required>
                                        <option disabled selected style="display: none" value="">Select Sex</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select> <span>Sex</span>
                                </div>
                                <div>
                                    <select class="radiobtn cbo" name="pettype" id="pettypeid" required>
                                        <option disabled selected style="display: none" value="">Select Pet Type</option>
                                        <?php
                                        while ($r = mysqli_fetch_array($p)) {
                                        ?>
                                            <option value="<?php echo $r['pettypeid']; ?>"><?php echo $r['pettype']; ?> </option>
                                        <?php
                                        }
                                        ?>
                                    </select> <span>Pet Type</span>
                                </div>
                                <div>
                                    <select class="radiobtn" name="breed" id="bid" required>
                                        <option value="">Select Breed</option>
                                    </select> <span>Breed</span>
                                </div>
                                <div>
                                    <input type="number" name="age" placeholder="Enter Age" required>
                                    <span>Age</span>
                                </div>
                                <div>
                                    <input type="text" name="weight" placeholder="Enter Weight" required>
                                    <span>Weight (in kg)</span>
                                </div>
                            </div>
                            <div class="buttonflexright">
                                <button name="savepetprofile" type="submit" class="yes" title="Add record">Add</button>
                                <button class="cancel modal-close" title="Clear all inputs">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal of Owners Profile -->
        <div class="modal" id="modal3">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Pet Profile</h1>
                    <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                </div>
                <div class="modal-body">
                    <div>
                        <div class="searchbar">
                            <input type="text" placeholder="Search here" id="search-boxpet"><span class="material-symbols-sharp">search</span>
                            <h2 style="margin: 0 15em">Add Pet<span class="material-symbols-sharp add modal-open" data-modal="modal4">add_circle</span></h2>
                        </div>
                        
                        <div class="table-profile-sample profile-sample-short" id="viewPet">
                            
                        </div>
                    </div>

                </div>

            </div>

            <!-- TABLE OF OWNERS  -->

        </div>

        <!-- Modal of Edit Profile -->
        <div class="modal" id="modal6">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Edit Owners Profile</h1>
                    <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                </div>
                <div class="table-product" id="updateOwner">

                </div>
                </section>
            </div>
        </div>

        <!-- Modal of Restore Owners Profile  -->
        <div class="modal" id="modal8">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Restore Owners Profile</h1>
                    <div class="accrecsearch">
                        <div class="searchbar">
                            <input type="text" placeholder="Search here" id="search-boxrestoreowner"><span class="material-symbols-sharp">search</span>
                            <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                        </div>
                    </div>
                </div>

                <div class="modal-body">
                    <section class="tableproduct">
                        <div class="table-product" id="searchRestoreProfile">
                            <table class="content-table">
                                <thead>
                                    <tr>
                                        <th>Owner's Name</th>
                                        <th>Contact No.</th>
                                        <th>Address</th>
                                        <th>Email Address</th>
                                        <th> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "Select * from tblownersprofile where archive = 'true' order by ownersname desc";
                                    $res = mysqli_query($conn, $sql);

                                    if ($res) {
                                        while ($row = mysqli_fetch_assoc($res)) {
                                            $op = $row['ownersname'];
                                            $cn = $row['contactno'];
                                            $add = $row['address'];
                                            $emailadd = $row['emailaddress'];
                                            echo '<tr>
                                        <td>' . $op . '</td>
                                        <td>' . $cn . '</td>
                                        <td>' . $add . '</td>
                                        <td>' . $emailadd . '</td>
                                        <td>
                                        <button class="modal-open showRestoreProfile" data-modal="modal7" value="' . $op . '" ><span class="material-symbols-sharp restore" title="Restore this account">unarchive</span></button>
                                        </td>
                                        </tr>';
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </section>
                    <div class="modal-footer">
                        <div class="buttonflexright">
                            <button type="submit" class="cancel modal-close" title="Cancel">Cancel</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Modal of Edit Product -->
        <div class="modal" id="modal7">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Restore Owners Profile</h1>
                    <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                </div>
                <div class="table-product" id="restoreOwner">

                </div>
                </section>
            </div>
        </div>

        <!-- Modal of Archive Profile -->
        <div class="modal" id="modal9">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Archiving Owners Profile</h1>
                    <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                </div>
                <div class="table-product" id="archiveOwner">

                </div>
                </section>
            </div>
        </div>



        <!-- Modal of Archive Pet Profile -->
        <div class="modal" id="modal11">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Archiving Pet Profile</h1>
                    <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                </div>
                <div class="table-product" id="archivePet">

                </div>
                </section>
            </div>
        </div>

        <!-- Modal of Restore Profile MessageBox -->
        <div class="modal" id="modal5">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Unarchive Owners Profile</h1>
                    <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                </div>
                <div class="modal-body" id="restoreProfile">
                </div>
            </div>
        </div>


        <!-- Modal of Restore Owners Profile  -->
        <div class="modal" id="modal10">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Restore Pet Profile</h1>
                    <div class="accrecsearch">
                        <div class="searchbar">
                            <input type="text" placeholder="Search here" id="search-boxrestorepet"><span class="material-symbols-sharp">search</span>
                            <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                        </div>
                    </div>
                </div>

                <div class="modal-body">
                    <section class="tableproduct">
                        <div class="table-product" id="searchPetProfile">
                            <table class="content-table">
                                <thead>
                                    <tr>
                                        <th>Pet ID</th>
                                        <th>Owner's Name</th>
                                        <th>Pet Name</th>
                                        <th>Pet Type</th>
                                        <th>Age</th>
                                        <th>Sex</th>
                                        <th>Breed</th>
                                        <th>Weight</th>
                                        <th> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "Select * from tblpet where archive = 'true' order by petname";
                                    $res = mysqli_query($conn, $sql);

                                    if ($res) {
                                        while ($row = mysqli_fetch_assoc($res)) {
                                            $pid = $row['petid'];
                                            $op = $row['ownersname'];
                                            $pname = $row['petname'];
                                            $pt = $row['pettype'];
                                            $age = $row['age'];
                                            $sex = $row['sex'];
                                            $breed = $row['breed'];
                                            $weight = $row['weight'];
                                            echo '<tr>
                                        <td>' . $pid . '</td>
                                        <td>' . $op . '</td>
                                        <td>' . $pname . '</td>
                                        <td>' . $pt . '</td>
                                        <td>' . $age . '</td>
                                        <td>' . $sex . '</td>
                                        <td>' . $breed . '</td>
                                        <td>' . $weight . '</td>
                                        <td>
                                        <button class="modal-open showRestorePet" data-modal="modal12" value="' . $pid . '" ><span class="material-symbols-sharp restore" title="Restore this account">unarchive</span></button>
                                        </td>
                                        </tr>';
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </section>
                    <div class="modal-footer">
                        <div class="buttonflexright">
                            <button type="submit" class="cancel modal-close" title="Cancel">Cancel</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Modal of Restore Profile MessageBox -->
        <div class="modal" id="modal12">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Unarchive Pet Profile</h1>
                    <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                </div>
                <div class="modal-body" id="restorePet">
                </div>
            </div>
        </div>

        <?php include 'scriptingfiles.php'; ?>
        <script>
            $(document).ready(function() {
                // USERACCOUNT DOCUMENT FORMS
                $(".showUpdateProfile").click(function() {
                    var ownersprofileid = this.value;
                    $("#updateOwner").load("submit.php", {
                        ownersprofileID: ownersprofileid
                    })
                })
                $(".showArchiveProfile").click(function() {
                    var archiveownersprofileid = this.value;
                    $("#archiveOwner").load("submit.php", {
                        archiveownersprofileID: archiveownersprofileid
                    })
                })
                $(".showRestoreProfile").click(function() {
                    var restoreownersprofileid = this.value;
                    $("#restoreOwner").load("submit.php", {
                        restoreownersprofileID: restoreownersprofileid
                    })
                })
                $(".showPetProfile").click(function() {
                    var petviewid = this.value;
                    $("#viewPet").load("submit.php", {
                        petviewID: petviewid
                    })
                })
                $(".showUpdatePet").click(function() {
                    var updatepetid = this.value;
                    $("#editPet").load("submit.php", {
                        updatepetID: updatepetid
                    })
                })
                $(".showArchivePet").click(function() {
                    var archivepetprofileid = this.value;
                    $("#archivePet").load("submit.php", {
                        archivepetprofileID: archivepetprofileid
                    })
                })
                $(".showRestorePet").click(function() {
                    var restorepetprofileid = this.value;
                    $("#restorePet").load("submit.php", {
                        restorepetprofileID: restorepetprofileid
                    })
                })
            })


            $(document).ready(function() {
                $("#pettypeid").on('click', function() {
                    var pettypeid = $(this).val();
                    if (pettypeid) {
                        $.ajax({
                            type: 'POST',
                            url: 'cascadingdropdown.php',
                            data: 'pettypeid=' + pettypeid,
                            success: function(html) {
                                $("#bid").html(html);
                            }
                        });
                    }
                });
            });
            $(document).ready(function() {
                $('#search-box').on('keyup', function() {
                    var queryownersname = $(this).val();
                    $.ajax({
                        url: 'search.php',
                        method: 'POST',
                        data: {
                            search: 1,
                            queryownersname: queryownersname
                        },
                        success: function(data) {
                            $('#ownersName').html(data);
                        }
                    });
                });
            });
            $(document).ready(function() {
                $('#search-boxrestoreowner').on('keyup', function() {
                    var queryrestoreowner = $(this).val();
                    $.ajax({
                        url: 'search.php',
                        method: 'POST',
                        data: {
                            search: 1,
                            queryrestoreowner: queryrestoreowner
                        },
                        success: function(data) {
                            $('#searchRestoreProfile').html(data);
                        }
                    });
                });
            });
            $(document).ready(function() {
                $('#search-boxpet').on('keyup', function() {
                    var querypetprofile = $(this).val();
                    $.ajax({
                        url: 'search.php',
                        method: 'POST',
                        data: {
                            search: 1,
                            querypetprofile: querypetprofile
                        },
                        success: function(data) {
                            $('#petProfile').html(data);
                        }
                    });
                });
            });

            $(document).ready(function() {
                $('#search-boxrestorepet').on('keyup', function() {
                    var queryrestorepet = $(this).val();
                    $.ajax({
                        url: 'search.php',
                        method: 'POST',
                        data: {
                            search: 1,
                            queryrestorepet: queryrestorepet
                        },
                        success: function(data) {
                            $('#searchPetProfile').html(data);
                        }
                    });
                });
            });

            function previewImage(event) {
                var input = event.target;
                var preview = document.getElementById("image-preview");
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
</body>

</html>