<?php
session_start();
include 'connect.php';

// Save Usertype 
if (isset($_POST['saveusertype'])) {
    $ut = $_POST['usertype'];

    // Insert into database
    $sql = "insert into tblusertype(usertype) 
        values('$ut')";
    $res = mysqli_query($conn, $sql);
    if ($res) {
?>
        <div class="statusmessagesuccess" id="close">
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
    if ($res) { ?>
        <div class="statusmessagesuccesslight" id="close">
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

    if ($res) {
    ?>
        <div class="statusmessageerror" id="close">
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
    if ($res) {
    ?>
        <div class="statusmessagesuccess" id="close">
            <h2>Pettype Added Successfully!</h2>
            <button class="icon"><span class="material-symbols-sharp">close</span></button>
        </div>
    <?php
    }
}

// Pettype Update Statement
if (isset($_POST['updatepettype'])) {
    $petid = $_POST['petid'];
    $pt = $_POST['pettype'];

    $sql = "update tblpettype set pettype ='$pt' 
                    where petid= $petid";
    $res = mysqli_query($conn, $sql);
    if ($res) { ?>
        <div class="statusmessagesuccess" id="close">
            <h2>Pettype Updated Successfully!</h2>
            <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
        </div>

<?php
    } else {
        die(mysqli_error($conn));
    }
}
//     // pettype remove statement
// if(isset($_POST['removepettype'])){
//     $rpetid = $_POST['rpetid'];

//             $sql = "delete from tblpettype where petid = '$rpetid'";
//             $res = mysqli_query($conn, $sql);
//         
?>
<!-- //     <div class="statusmessageerror" id="close">
        //         <h2>Pettype has been removed</h2>
        //         <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
        //     </div>
                 -->
<?php
//     } else {
//         die(mysqli_error($conn));

// }

// Save Breed
if (isset($_POST['savebreed'])) {
    $br = $_POST['breed'];

    // Insert into database
    $sql = "insert into tblbreed(breed) 
        values('$br')";
    $res = mysqli_query($conn, $sql);
    if ($res) {
?>
        <div class="statusmessagesuccess" id="close">
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
    if ($res) { ?>
        <div class="statusmessagesuccess" id="close">
            <h2>Breed Updated Successfully!</h2>
            <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
        </div>

<?php
    } else {
        die(mysqli_error($conn));
    }
}

//     // breed remove statement
// if(isset($_POST['removebreed'])){
//     $rbid = $_POST['bid'];

//             $sql = "delete from tblbreed where bid = '$rbid'";
//             $res = mysqli_query($conn, $sql);
//         
?>
<!-- //     <div class="statusmessageerror" id="close">
        //         <h2>Breed has been removed</h2>
        //         <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
        //     </div> -->

<?php
//     } else {
//         die(mysqli_error($conn));

// }

// Save Category
if (isset($_POST['savecategory'])) {
    $cat = $_POST['category'];

    // Insert into database
    $sql = "insert into tblcategory(category) 
        values('$cat')";
    $res = mysqli_query($conn, $sql);
    if ($res) {
?>
        <div class="statusmessagesuccess" id="close">
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
    if ($res) { ?>
        <div class="statusmessagesuccess" id="close">
            <h2>Category Updated Successfully!</h2>
            <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
        </div>

<?php
    } else {
        die(mysqli_error($conn));
    }
}


// // category remove statement
// if(isset($_POST['removecategory'])){
//         $rcatid = $_POST['rcatid'];

//         $sql = "delete from tblcategory where catid = '$rcatid'";
//         $res = mysqli_query($conn, $sql);
//             
?>
<!-- //         <div class="statusmessageerror" id="close">
                //     <h2>Category has been removed</h2>
                //     <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                //         </div> -->
<?php
//     } else {
//     die(mysqli_error($conn));

// }

// Save Services
if (isset($_POST['saveservices'])) {
    $ser = $_POST['services'];

    // Insert into database
    $sql = "insert into tblservices(services) 
                 values('$ser')";
    $res = mysqli_query($conn, $sql);
    if ($res) {
?>
        <div class="statusmessagesuccess" id="close">
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

    $sql = "update tblservices set services ='$ser' 
            where sid= $sid";
    $res = mysqli_query($conn, $sql);
    if ($res) { ?>
        <div class="statusmessagesuccess" id="close">
            <h2>Services Updated Successfully!</h2>
            <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
        </div>

<?php
    } else {
        die(mysqli_error($conn));
    }
}

//            //Services remove statement
// if(isset($_POST['removeservices'])){
//     $rsid = $_POST['sid'];

//             $sql = "delete from tblservices where sid = '$rsid'";
//             $res = mysqli_query($conn, $sql);
//         
?>
<!-- //     <div class="statusmessageerror" id="close">
        //         <h2>Services has been removed</h2>
        //         <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
        //     </div> -->

<?php
//     } else {
//         die(mysqli_error($conn));

// } 

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
                <h1>Settings</h1>
                <div class="table-profile">
                    <div class="table-profile-buttons">
                        <!--  Start of Settings Section  -->
                        <div class="buttonmodify">
                            <button class="modal-open" data-modal="modal1" title="View Usertype"><span class="material-symbols-sharp">table_view</span>Usertype</button>
                        </div>
                        <div class="buttonmodify">
                            <button class="modal-open" data-modal="modal2" title="View Pet Type"><span class="material-symbols-sharp">table_view</span>Pet type</button>
                        </div>
                        <div class="buttonmodify">
                            <button class="modal-open" data-modal="modal3" title="View Breed"><span class="material-symbols-sharp">table_view</span>Breed</button>
                        </div>
                        <div class="buttonmodify">
                            <button class="modal-open" data-modal="modal4" title="View Category"><span class="material-symbols-sharp">table_view</span>Category</button>
                        </div>
                        <div class="buttonmodify">
                            <button class="modal-open" data-modal="modal5" title="View Services"><span class="material-symbols-sharp">table_view</span>Services</button>
                        </div>
                        <div class="buttonmodify">
                            <button class="modal-open" data-modal="modal6" title="View Charges and Fees"><span class="material-symbols-sharp">table_view</span>Charges and Fees</button>
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
                                    <button class="modal-open showUpdatePetType" data-modal="modal7" value="' . $petid . '" ><span class="material-symbols-sharp edit" title="Edit this account">edit</span></button>
                                    <button class="modal-open showRemovePettype" data-modal="modal8" value="' . $petid . '"><span class="material-symbols-sharp remove" title="Remove the record">delete</span></button>
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
                                    <button class="modal-open showUpdateBreed" data-modal="modal7" value="' . $bid . '" ><span class="material-symbols-sharp edit" title="Edit this account">edit</span></button>
                                    <button class="modal-open showRemoveBreed" data-modal="modal8" value="' . $bid . '"><span class="material-symbols-sharp remove" title="Remove the record">delete</span></button>
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
                                    <button class="modal-open showUpdateCategory" data-modal="modal7" value="' . $catid . '" ><span class="material-symbols-sharp edit" title="Edit this account">edit</span></button>
                                    <button class="modal-open showRemoveCategory" data-modal="modal8" value="' . $catid . '"><span class="material-symbols-sharp remove" title="Remove the record">delete</span></button>
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
                                            <th> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "Select * from tblservices";
                                        $res = mysqli_query($conn, $sql);

                                        if ($res) {
                                            while ($row = mysqli_fetch_assoc($res)) {
                                                $sid = $row['sid'];
                                                $services = $row['services'];
                                        ?>
                                                <tr>
                                                    <td><?php echo $sid; ?></td>
                                                    <td><?php echo $services; ?></td>
                                                    <?php echo '
                                <td>
                                    <button class="modal-open showUpdateServices" data-modal="modal7" value="' . $sid . '" ><span class="material-symbols-sharp edit" title="Edit this account">edit</span></button>
                                    <button class="modal-open showRemoveServices" data-modal="modal8" value="' . $sid . '"><span class="material-symbols-sharp remove" title="Remove the record">delete</span></button>
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

        <!-- Modal of Charges and Fees -->
        <div class="modal" id="modal6">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Charges and Fees</h1>
                    <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <div class="formprofile">
                            <div>
                                <input type="text" name="chargesandfees" placeholder="Add New Charges and Fees" required>
                                <span>Charges and Fees</span>
                            </div>
                            <div class="buttonflex">
                                <button name="savechargesandfees" type="submit" class="save" title="Update charges and fees">Save</button>
                                <button class="cancel modal-close" title="Cancel">Cancel</button>
                            </div>
                        </div>
                    </form>
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
                    $(".showRemoveUsertype").click(function() {
                        var rutid = this.value;
                        $("#removeUsertype").load("submit.php", {
                            rutID: rutid
                        })
                    })
                })
            </script>
</body>

</html>