<?php
session_start();
include 'authcheck.php';
include 'connect.php';
$s = mysqli_query($conn, "select * from tblpettype");

// Save Usertype 
if (isset($_POST['saveusertype'])) {
    $ut = $_POST['usertype'];

    // Insert into database
    $sql = "insert into tblusertype(usertype) 
        values('$ut')";
    $res = mysqli_query($conn, $sql);

    $ipaddress = $_SERVER['REMOTE_ADDR'];
    $result = mysqli_query($conn, "INSERT INTO tblaudittrail (username, ipaddress, actionmode) 
    VALUES ('" . $_SESSION['username'] . "','$ipaddress','Added new usertype in settings')");

    if ($res) {
?>
        <div class="statusmessagesuccess message-box" id="close">
            <h2>Usertype Added Successfully!</h2>
            <button class="icon"><span class="material-symbols-sharp">close</span></button>
        </div>
    <?php
    }
}

// Usertype Update Statement
if (isset($_POST['updateusertype'])) {
    $utid = $_POST['utid'];
    $ut = $_POST['usertype'];

    $sql = "update tblusertype set usertype ='$ut' 
                where utid= $utid";
    $res = mysqli_query($conn, $sql);

    $ipaddress = $_SERVER['REMOTE_ADDR'];
    $result = mysqli_query($conn, "INSERT INTO tblaudittrail (username, ipaddress, actionmode) 
    VALUES ('" . $_SESSION['username'] . "','$ipaddress','Update usertype in settings')");
    if ($res) { ?>
        <div class="statusmessagesuccesslight message-box" id="close">
            <h2>Usertype Updated Successfully!</h2>
            <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
        </div>
    <?php
    } else {
        die(mysqli_error($conn));
    }
}


// usertype remove statement
if (isset($_POST['removeusertype'])) {
    $rutid = $_POST['rutid'];

    $sql = "delete from tblusertype where utid = '$rutid'";
    $res = mysqli_query($conn, $sql);

    $ipaddress = $_SERVER['REMOTE_ADDR'];
    $result = mysqli_query($conn, "INSERT INTO tblaudittrail (username, ipaddress, actionmode) 
    VALUES ('" . $_SESSION['username'] . "','$ipaddress','Removed a usertype in settings')");

    if ($res) {
    ?>
        <div class="statusmessageerror message-box" id="close">
            <h2>Usertype has been removed</h2>
            <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
        </div>
    <?php
    }
}



// Save Pettype
if (isset($_POST['savepettype'])) {
    $pt = $_POST['pettype'];

    // Insert into database
    $sql = "insert into tblpettype(pettype) 
        values('$pt')";
    $res = mysqli_query($conn, $sql);

    $ipaddress = $_SERVER['REMOTE_ADDR'];
    $result = mysqli_query($conn, "INSERT INTO tblaudittrail (username, ipaddress, actionmode) 
    VALUES ('" . $_SESSION['username'] . "','$ipaddress','Added new pettype in settings')");
    if ($res) {
    ?>
        <div class="statusmessagesuccess message-box" id="close">
            <h2>Pettype Added Successfully!</h2>
            <button class="icon"><span class="material-symbols-sharp">close</span></button>
        </div>
    <?php
    }
}


// Pettype Update Statement
if (isset($_POST['updatepettype'])) {
    $ptid = $_POST['ptid'];
    $pt = $_POST['pettype'];

    $sql = "update tblpettype set pettype ='$pt' 
                where pettypeid= '$ptid'";
    $res = mysqli_query($conn, $sql);

    $ipaddress = $_SERVER['REMOTE_ADDR'];
    $result = mysqli_query($conn, "INSERT INTO tblaudittrail (username, ipaddress, actionmode) 
    VALUES ('" . $_SESSION['username'] . "','$ipaddress','Updated pettype in settings')");
    if ($res) { ?>
        <div class="statusmessagesuccesslight message-box" id="close">
            <h2>Pettype Updated Successfully!</h2>
            <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
        </div>
    <?php
    } else {
        die(mysqli_error($conn));
    }
}


// pettype remove statement
if (isset($_POST['removepettype'])) {
    $rptid = $_POST['rptid'];

    $sql = "delete from tblpettype where pettypeid = '$rptid'";
    $res = mysqli_query($conn, $sql);

    $ipaddress = $_SERVER['REMOTE_ADDR'];
    $result = mysqli_query($conn, "INSERT INTO tblaudittrail (username, ipaddress, actionmode) 
    VALUES ('" . $_SESSION['username'] . "','$ipaddress','Removed pettype in settings')");

    if ($res) {
    ?>
        <div class="statusmessageerror message-box" id="close">
            <h2>Pettype has been removed</h2>
            <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
        </div>
    <?php
    }
}

// Save Breed
if (isset($_POST['savebreed'])) {
    $ptid = $_POST['pettypeid'];
    $br = $_POST['breed'];

    // Insert into database
    $sql = "insert into tblbreed(pettypeid, breed) 
        values('$ptid','$br')";
    $res = mysqli_query($conn, $sql);

    $ipaddress = $_SERVER['REMOTE_ADDR'];
    $result = mysqli_query($conn, "INSERT INTO tblaudittrail (username, ipaddress, actionmode) 
    VALUES ('" . $_SESSION['username'] . "','$ipaddress','Added new breed in settings')");
    if ($res) {
    ?>
        <div class="statusmessagesuccess message-box" id="close">
            <h2>Breed Added Successfully!</h2>
            <button class="icon"><span class="material-symbols-sharp">close</span></button>
        </div>
    <?php
    }
}

// breed Update Statement
if (isset($_POST['updatebreed'])) {
    $bid = $_POST['bid'];
    $breed = $_POST['breed'];

    $sql = "update tblbreed set breed ='$breed' 
                    where bid= $bid";
    $res = mysqli_query($conn, $sql);

    $ipaddress = $_SERVER['REMOTE_ADDR'];
    $result = mysqli_query($conn, "INSERT INTO tblaudittrail (username, ipaddress, actionmode) 
    VALUES ('" . $_SESSION['username'] . "','$ipaddress','Updated pettype in settings')");
    if ($res) { ?>
        <div class="statusmessagesuccess message-box" id="close">
            <h2>Breed Updated Successfully!</h2>
            <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
        </div>

    <?php
    } else {
        die(mysqli_error($conn));
    }
}

// breed remove statement
if (isset($_POST['removebreed'])) {
    $rbid = $_POST['bid'];

    $sql = "delete from tblbreed where bid = '$rbid'";
    $res = mysqli_query($conn, $sql);

    $ipaddress = $_SERVER['REMOTE_ADDR'];
    $result = mysqli_query($conn, "INSERT INTO tblaudittrail (username, ipaddress, actionmode) 
             VALUES ('" . $_SESSION['username'] . "','$ipaddress','Removed breed in settings')");

    if ($res) {
    ?> <div class="statusmessageerror message-box" id="close">
            <h2>Breed has been removed</h2>
            <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
        </div>
    <?php
    }
}

// Save Category
if (isset($_POST['savecategory'])) {
    $cat = $_POST['category'];

    // Insert into database
    $sql = "insert into tblcategory(category) 
        values('$cat')";
    $res = mysqli_query($conn, $sql);

    $ipaddress = $_SERVER['REMOTE_ADDR'];
    $result = mysqli_query($conn, "INSERT INTO tblaudittrail (username, ipaddress, actionmode) 
    VALUES ('" . $_SESSION['username'] . "','$ipaddress','Added new category in settings')");
    if ($res) {
    ?>
        <div class="statusmessagesuccess message-box" id="close">
            <h2>Product Category Added Successfully!</h2>
            <button class="icon"><span class="material-symbols-sharp">close</span></button>
        </div>
    <?php
    }
}

// category Update Statement
if (isset($_POST['updatecategory'])) {
    $catid = $_POST['catid'];
    $cat = $_POST['category'];

    $sql = "update tblcategory set category ='$cat' 
                where catid= $catid";
    $res = mysqli_query($conn, $sql);

    $ipaddress = $_SERVER['REMOTE_ADDR'];
    $result = mysqli_query($conn, "INSERT INTO tblaudittrail (username, ipaddress, actionmode) 
    VALUES ('" . $_SESSION['username'] . "','$ipaddress','Updated category in settings')");
    if ($res) { ?>
        <div class="statusmessagesuccesslight message-box" id="close">
            <h2>Category Updated Successfully!</h2>
            <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
        </div>
    <?php
    } else {
        die(mysqli_error($conn));
    }
}

// category remove statement
if (isset($_POST['removecategory'])) {
    $rcatid = $_POST['rcatid'];

    $sql = "delete from tblcategory where catid = '$rcatid'";
    $res = mysqli_query($conn, $sql);

    $ipaddress = $_SERVER['REMOTE_ADDR'];
    $result = mysqli_query($conn, "INSERT INTO tblaudittrail (username, ipaddress, actionmode) 
    VALUES ('" . $_SESSION['username'] . "','$ipaddress','Removed category in settings')");

    if ($res) {
    ?>
        <div class="statusmessageerror message-box" id="close">
            <h2>Category has been removed</h2>
            <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
        </div>
    <?php
    }
}

// Save Services
if (isset($_POST['saveservices'])) {
    $ser = $_POST['services'];
    $prc = $_POST['price'];

    // Insert into database
    $sql = "insert into tblservices(services,price) 
                 values('$ser','$prc')";
    $res = mysqli_query($conn, $sql);

    $ipaddress = $_SERVER['REMOTE_ADDR'];
    $result = mysqli_query($conn, "INSERT INTO tblaudittrail (username, ipaddress, actionmode) 
    VALUES ('" . $_SESSION['username'] . "','$ipaddress','Added new services in settings')");
    if ($res) {
    ?>
        <div class="statusmessagesuccess message-box" id="close">
            <h2>Services Added Successfully!</h2>
            <button class="icon"><span class="material-symbols-sharp">close</span></button>
        </div>
    <?php
    }
}

// Services Update Statement
if (isset($_POST['updateservices'])) {
    $sid = $_POST['sid'];
    $ser = $_POST['services'];
    $prc = $_POST['price'];

    $sql = "update tblservices set services ='$ser', price = '$prc'
                where sid= $sid";
    $res = mysqli_query($conn, $sql);

    $ipaddress = $_SERVER['REMOTE_ADDR'];
    $result = mysqli_query($conn, "INSERT INTO tblaudittrail (username, ipaddress, actionmode) 
    VALUES ('" . $_SESSION['username'] . "','$ipaddress','Updated services in settings')");
    if ($res) { ?>
        <div class="statusmessagesuccesslight message-box" id="close">
            <h2>Services Updated Successfully!</h2>
            <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
        </div>
    <?php
    } else {
        die(mysqli_error($conn));
    }
}

//Services remove statement
if (isset($_POST['removeservices'])) {
    $rsid = $_POST['rsid'];

    $sql = "delete from tblservices where sid = '$rsid'";
    $res = mysqli_query($conn, $sql);

    $ipaddress = $_SERVER['REMOTE_ADDR'];
    $result = mysqli_query($conn, "INSERT INTO tblaudittrail (username, ipaddress, actionmode) 
    VALUES ('" . $_SESSION['username'] . "','$ipaddress','Removed services in settings')");

    if ($res) {
    ?>
        <div class="statusmessageerror message-box" id="close">
            <h2>Services has been removed</h2>
            <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
        </div>
    <?php
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <!-- Materical Icons Link -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!-- Stylesheet  -->
    <link rel="stylesheet" href="../css/settings.css">
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
                            <button class="modal-open" data-modal="modal1" title="View Usertype"><span class="material-symbols-sharp">person</span>Usertype</button>
                        </div>
                        <div class="buttonmodify">
                            <button class="modal-open" data-modal="modal2" title="View Pet Type"><span class="material-symbols-sharp">sound_detection_dog_barking</span>Pet type</button>
                        </div>
                        <div class="buttonmodify">
                            <button class="modal-open" data-modal="modal3" title="View Breed"><span class="material-symbols-sharp">pets</span>Breed</button>
                        </div>
                        <div class="buttonmodify">
                            <button class="modal-open" data-modal="modal4" title="View Category"><span class="material-symbols-sharp">inventory</span>Category</button>
                        </div>
                        <div class="buttonmodify">
                            <button class="modal-open" data-modal="modal5" title="View Services"><span class="material-symbols-sharp">medical_services</span>Services</button>
                        </div>
                    </div>
                </div>
            </section>

            <!--  End of profile   -->

        </main>

        <!--  End of Main Tag  -->
        <?php include 'systemaccountanddate.php'; ?>
        <!--  Start of Retrive section  -->
        <div class="rightbottom">
            <h1>Dark Theme</h1>
            <div class="buttons">
                <h2>Enable Dark Mode</h2><br>
                <button id="dark-mode-toggle" class="theme-toggler">
                    <span class="material-symbols-sharp active">light_mode</span>
                    <span class="material-symbols-sharp ">dark_mode</span>
                </button>
            </div>
        </div>

        <!-- Start of Modal -->

        <!-- Modal of Pet Type -->
        <div class="modal" id="modal2">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Pet Type</h1>
                    <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <div class="formprofile">
                            <div>
                                <input type="text" name="pettype" placeholder="Add New Pet Type" required>
                                <span>Pet Type</span>
                            </div>
                            <div class="buttonflex">
                                <button name="savepettype" type="submit" class="save" title="Update pettype">Save</button>
                                <button class="cancel modal-close" title="Cancel">Cancel</button>
                            </div>
                        </div>
                    </form>

                    <section class="tableaccountrecords">
                        <div class="accountrecordsbg">
                            <div class="accountrecords">
                                <table class="content-table table-fixed">
                                    <thead>
                                        <tr>
                                            <th>Pet ID</th>
                                            <th>Pettype</th>
                                            <th> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "Select * from tblpettype";
                                        $res = mysqli_query($conn, $sql);

                                        if ($res) {
                                            while ($row = mysqli_fetch_assoc($res)) {
                                                $petid = $row['pettypeid'];
                                                $pt = $row['pettype'];
                                        ?>
                                                <tr>
                                                    <td><?php echo $petid; ?></td>
                                                    <td><?php echo $pt; ?></td>
                                                    <?php echo '
                                <td>
                                    <button class="modal-open showUpdatePettype" data-modal="modal9" value="' . $petid . '" ><span class="material-symbols-sharp edit" title="Edit this account">edit</span></button>
                                    <button class="modal-open showRemovePettype" data-modal="modal10" value="' . $petid . '"><span class="material-symbols-sharp remove" title="Remove the record">delete</span></button>
                                </td>';   ?>
                                                </tr>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>

        <!-- Modal of Breed -->
        <!-- Start of Modal -->

        <div class="modal" id="modal3">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Breed</h1>
                    <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <div class="formprofile">
                            <div>
                                <select class="radiobtn" name="pettypeid" id="ut">
                                    <option disabled selected style="display: none">Choose</option>
                                    <?php
                                    while ($r = mysqli_fetch_array($s)) {
                                    ?>
                                        <option value="<?php echo $r['pettypeid']; ?>"><?php echo $r['pettype']; ?> </option>
                                    <?php
                                    }
                                    ?>
                                </select>Pettype
                            </div>
                            <div>
                                <input type="text" name="breed" placeholder="Add New Breed" required>
                                <span>Breed</span>
                            </div>
                            <div class="buttonflex">
                                <button name="savebreed" type="submit" class="save" title="Update pettype">Save</button>
                                <button class="cancel modal-close" title="Cancel">Cancel</button>
                            </div>
                        </div>
                    </form>

                    <section class="tableaccountrecords">
                        <div class="accountrecordsbg">
                            <div class="accountrecords">
                                <table class="content-table table-fixed">
                                    <thead>
                                        <tr>
                                            <th>Breed ID</th>
                                            <th>Breed</th>
                                            <th> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "Select * from tblbreed";
                                        $res = mysqli_query($conn, $sql);

                                        if ($res) {
                                            while ($row = mysqli_fetch_assoc($res)) {
                                                $bid = $row['bid'];
                                                $br = $row['breed'];
                                        ?>
                                                <tr>
                                                    <td><?php echo $bid; ?></td>
                                                    <td><?php echo $br; ?></td>
                                                    <?php echo '
                                <td>
                                    <button class="modal-open showUpdateBreed" data-modal="modal20" value="' . $bid . '" ><span class="material-symbols-sharp edit" title="Edit this account">edit</span></button>
                                    <button class="modal-open showRemoveBreed" data-modal="modal21" value="' . $bid . '"><span class="material-symbols-sharp remove" title="Remove the record">delete</span></button>
                                </td>';   ?>
                                                </tr>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>


        <!-- Modal of Product Category -->
        <!-- Start of Modal -->
        <div class="modal" id="modal4">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Product Category</h1>
                    <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <div class="formprofile">
                            <div>
                                <input type="text" name="category" placeholder="Add New Category" required>
                                <span>Category</span>
                            </div>
                            <div class="buttonflex">
                                <button name="savecategory" type="submit" class="save" title="Update category">Save</button>
                                <button class="cancel modal-close" title="Cancel">Cancel</button>
                            </div>
                        </div>
                    </form>

                    <section class="tableaccountrecords">
                        <div class="accountrecordsbg">
                            <div class="accountrecords">
                                <table class="content-table table-fixed">
                                    <thead>
                                        <tr>
                                            <th>Category ID</th>
                                            <th>Category</th>
                                            <th> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "Select * from tblcategory";
                                        $res = mysqli_query($conn, $sql);

                                        if ($res) {
                                            while ($row = mysqli_fetch_assoc($res)) {
                                                $catid = $row['catid'];
                                                $category = $row['category'];
                                        ?>
                                                <tr>
                                                    <td><?php echo $catid; ?></td>
                                                    <td><?php echo $category; ?></td>
                                                    <?php echo '
                                <td>
                                    <button class="modal-open showUpdateCategory" data-modal="modal13" value="' . $catid . '" ><span class="material-symbols-sharp edit" title="Edit this account">edit</span></button>
                                    <button class="modal-open showRemoveCategory" data-modal="modal14" value="' . $catid . '"><span class="material-symbols-sharp remove" title="Remove the record">delete</span></button>
                                </td>';   ?>
                                                </tr>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>

        <!-- Modal of Services -->

         <!-- Start of Modal -->
        <div class="modal" id="modal5">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Services</h1>
                    <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <div class="formprofile">
                            <div>
                                <input type="text" name="services" placeholder="Add New Services" required>
                                <span>Services</span>
                            </div>
                            <div>
                                <input type="text" name="price" placeholder="Add New Price" required>
                                <span>Price</span>
                            </div>
                            <div class="buttonflex">
                                <button name="saveservices" type="submit" class="save" title="Update services">Save</button>
                                <button class="cancel modal-close" title="Cancel">Cancel</button>
                            </div>
                        </div>
                    </form>

                    <section class="tableaccountrecords">
                        <div class="accountrecordsbg">
                            <div class="accountrecords">
                                <table class="content-table table-fixed">
                                    <thead>
                                        <tr>
                                            <th>Services ID</th>
                                            <th>Services</th>
                                            <th>Price</th>
                                            <th> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "Select * from tblservices order by sid desc";
                                        $res = mysqli_query($conn, $sql);

                                        if ($res) {
                                            while ($row = mysqli_fetch_assoc($res)) {
                                                $sid = $row['sid'];
                                                $services = $row['services'];
                                                $prc = $row['price'];
                                        ?>
                                                <tr>
                                                    <td><?php echo $sid; ?></td>
                                                    <td><?php echo $services; ?></td>
                                                    <td><?php echo $prc; ?></td>
                                                    <?php echo '
                                <td>
                                    <button class="modal-open showUpdateServices" data-modal="modal15" value="' . $sid . '" ><span class="material-symbols-sharp edit" title="Edit this account">edit</span></button>
                                    <button class="modal-open showRemoveServices" data-modal="modal16" value="' . $sid . '"><span class="material-symbols-sharp remove" title="Remove the record">delete</span></button>
                                </td>';   ?>
                                                </tr>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>


        <!-- FORM OF UPDATE PETTYPE -->
        <div class="modal" id="modal9">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Edit Pettype</h1>
                    <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                </div>
                <div class="modal-body" id="updatePettype">

                </div>
            </div>
        </div>

        <!-- FORM OF REMOVE PETTYPE -->
        <div class="modal" id="modal10">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Remove Pettype</h1>
                    <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                </div>
                <div class="modal-body" id="removePettype">

                </div>
            </div>
        </div>

        <!-- FORM OF UPDATE BREED -->
        <div class="modal" id="modal20">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Edit Breed</h1>
                    <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                </div>
                <div class="modal-body" id="updateBreed">

                </div>
            </div>
        </div>

        <!-- FORM OF REMOVE BREED -->
        <div class="modal" id="modal21">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Remove Breed</h1>
                    <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                </div>
                <div class="modal-body" id="removeBreed">

                </div>
            </div>
        </div>

        <!-- FORM OF UPDATE CATEGORY -->
        <div class="modal" id="modal13">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Edit Category</h1>
                    <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                </div>
                <div class="modal-body" id="updateCategory">

                </div>
            </div>
        </div>

        <!-- FORM OF UPDATE SERVICES -->
        <div class="modal" id="modal15">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Edit Services</h1>
                    <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                </div>
                <div class="modal-body" id="updateServices">

                </div>
            </div>
        </div>

        <!-- FORM OF UPDATE CHARGES AND FEES -->
        <div class="modal" id="modal17">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Edit Service Price</h1>
                    <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                </div>
                <div class="modal-body" id="updatePrice">

                </div>
            </div>
        </div>

        <!-- FORM OF REMOVE CATEGORY -->
        <div class="modal" id="modal14">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Remove Category</h1>
                    <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                </div>
                <div class="modal-body" id="removeCategory">

                </div>
            </div>
        </div>

        <!-- FORM OF REMOVE SERVICES -->
        <div class="modal" id="modal16">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Remove Service</h1>
                    <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                </div>
                <div class="modal-body" id="removeServices">

                </div>
            </div>
        </div>

        <!-- FORM OF REMOVE CHARGES AND FEES -->
        <div class="modal" id="modal18">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Remove Product</h1>
                    <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                </div>
                <div class="modal-body" id="removePrice">

                </div>
            </div>
        </div>

        <!-- Modal of Usertype -->
        <div class="modal" id="modal1">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Usertype</h1>
                    <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                </div>

                <div class="modal-body">
                    <form action="" method="POST">

                        <div class="formprofile">
                            <div>
                                <input type="text" name="usertype" placeholder="Add New Usertype" required>
                                <span>Usertype</span>
                            </div>
                            <div class="buttonflex">
                                <button name="saveusertype" type="submit" class="save" title="Update usertype">Save</button>
                                <button class="cancel modal-close" title="Cancel">Cancel</button>
                            </div>
                        </div>
                    </form>

                    <section class="tableaccountrecords">
                        <div class="accountrecordsbg">
                            <div class="accountrecords">
                                <table class="content-table table-fixed">
                                    <thead>
                                        <tr>
                                            <th>User ID</th>
                                            <th>Usertype</th>
                                            <th> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "Select * from tblusertype";
                                        $res = mysqli_query($conn, $sql);

                                        if ($res) {
                                            while ($row = mysqli_fetch_assoc($res)) {
                                                $utid = $row['utid'];
                                                $ut = $row['usertype'];
                                        ?>
                                                <tr>
                                                    <td><?php echo $utid; ?></td>
                                                    <td><?php echo $ut; ?></td>
                                                    <?php echo '
                                        <td>
                                            <button class="modal-open showUpdateUsertype" data-modal="modal7" value="' . $utid . '" ><span class="material-symbols-sharp edit" title="Edit this account">edit</span></button>
                                            <button class="modal-open showRemoveUsertype" data-modal="modal8" value="' . $utid . '"><span class="material-symbols-sharp remove" title="Remove the record">delete</span></button>
                                        </td>';   ?>
                                                </tr>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                </div>

                <!-- FORM OF UPDATE USERTYPE -->
                <div class="modal" id="modal7">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1>Edit Usertype</h1>
                            <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                        </div>
                        <div class="modal-body" id="updateUsertype">

                        </div>
                    </div>
                </div>


                <!-- FORM OF REMOVE USERTYPE -->
                <div class="modal" id="modal8">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1>Remove Usertype</h1>
                            <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                        </div>
                        <div class="modal-body" id="removeUsertype">

                        </div>
                    </div>
                </div>
            </div>

            <?php include 'scriptingfiles.php';  ?>
            <script>
                $(document).ready(function() {
                    // USERACCOUNT DOCUMENT FORMS
                    $(".showUpdateUsertype").click(function() {
                        var utid = this.value;
                        $("#updateUsertype").load("submit.php", {
                            utID: utid
                        })
                    })
                    $(".showUpdatePettype").click(function() {
                        var ptid = this.value;
                        $("#updatePettype").load("submit.php", {
                            ptID: ptid
                        })
                    })
                    $(".showUpdateBreed").click(function() {
                        var bid = this.value;
                        $("#updateBreed").load("submit.php", {
                            bID: bid
                        })
                    })
                    $(".showUpdateCategory").click(function() {
                        var catid = this.value;
                        $("#updateCategory").load("submit.php", {
                            catID: catid
                        })
                    })
                    $(".showUpdateServices").click(function() {
                        var sid = this.value;
                        $("#updateServices").load("submit.php", {
                            sID: sid
                        })
                    })
                    $(".showUpdatePrice").click(function() {
                        var proid = this.value;
                        $("#updatePrice").load("submit.php", {
                            proID: proid
                        })
                    })
                    $(".showRemoveUsertype").click(function() {
                        var rutid = this.value;
                        $("#removeUsertype").load("submit.php", {
                            rutID: rutid
                        })
                    })
                    $(".showRemovePettype").click(function() {
                        var rptid = this.value;
                        $("#removePettype").load("submit.php", {
                            rptID: rptid
                        })
                    })
                    $(".showRemoveBreed").click(function() {
                        var rbid = this.value;
                        $("#removeBreed").load("submit.php", {
                            rbID: rbid
                        })
                    })
                    $(".showRemoveCategory").click(function() {
                        var rcatid = this.value;
                        $("#removeCategory").load("submit.php", {
                            rcatID: rcatid
                        })
                    })
                    $(".showRemoveServices").click(function() {
                        var rsid = this.value;
                        $("#removeServices").load("submit.php", {
                            rsID: rsid
                        })
                    })
                    $(".showRemovePrice").click(function() {
                        var rproid = this.value;
                        $("#removePrice").load("submit.php", {
                            rproID: rproid
                        })
                    })
                })
            </script>
</body>

</html>