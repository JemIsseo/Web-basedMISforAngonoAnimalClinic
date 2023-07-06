<?php
session_start();
include 'connect.php';

    $s = mysqli_query($conn, "select * from tblownersprofile");
    $p = mysqli_query($conn, "select * from tblpettype");
    $b = mysqli_query($conn, "select * from tblbreed");

// USER ACCOUNT SQL STATEMENTSSSSSSS
if (isset($_POST['accountID'])) {
    $accountID = $_POST['accountID'];
    $sql = "Select * from tbluseraccount where username ='$accountID'";
    $res = mysqli_query($conn, $sql);
    $upRow = mysqli_fetch_assoc($res);
    $img = $upRow['image'];
    $un = $upRow['username'];
    $pw = $upRow['password'];
    $ut = $upRow['usertype'];
    $ea = $upRow['email'];
    $s = mysqli_query($conn, "select * from tblusertype");

?>
    <section class="tableaccountrecords">
        <div class="accountrecordsbgr">
            <div class="accountrecords">
                <form action="useraccount.php" method="POST" enctype="multipart/form-data">
                    <div class="fleximage">
                        <div class="updatephotoedit">
                            <label for="file-upload" class="custom-file-uploadedit">
                                <span class="material-symbols-sharp"> upload </span>
                            </label>
                            <img src="uploads/<?php echo $img; ?>">
                
                        </div>
                        <div class="upload">
                            <h2>Insert jpg, jpeg, and png files only.</h2>
                            <button type="submit" name="uploadphoto" class="uploadbtn">Upload</button>
                        </div>
                        <input type="hidden" name="username" placeholder="Enter Username" value="<?= $un;  ?>" readonly>
                        <input type="file" id="file-upload" name="image" title="Insert photo..." value="<?= $img;  ?>" onchange="previewImage(event)" required />
                    </div>
                </form>
                <form action="useraccount.php" method="POST">
                    <div class="formprofileedit">
                        <div>
                            <input type="text" name="username" placeholder="Enter Username" value="<?= $un;  ?>" readonly>
                            <h2>Username</h2>
                        </div>
                        <div>
                            <select class="radiobtn" name="usertype" id="utedit" value="<?= $ut; ?>">
                                <option><?php echo $ut; ?></option>
                                <?php
                                while ($r = mysqli_fetch_array($s)) {
                                ?>
                                    <option value="<?= $r['usertype']; ?>"><?= $r['usertype']; ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                            <h2>Usertype</h2>
                        </div>
                        <div>
                            <input type="email" name="email" placeholder="Enter Email" value="<?= $ea;  ?>">
                            <h2>Email Address</h2>
                        </div>

                        <div class="buttonflex">
                            <button name="updateaccount" type="submit" class="yesedit" title="Save Record">Update</button>
                            <button name="clear" class="canceledit" title="Cancel input">Cancel</button>
                        </div>
                </form>
            </div>
        </div>
    </section>
<?php
}

if (isset($_POST['archiveID'])) {
    $archiveID = $_POST['archiveID'];
    $_SESSION['archiveid'] = $archiveID;
?>
    <form action="useraccount.php" method="POST" enctype="multipart/form-data">
        <h3>Are you sure you want to archive this record?</h3>
        <div class="buttonflex">
            <button name="savearchiveaccount" type="submit" class="yes">Yes</button>
            <button class="no modal-close">No</button>
        </div>
    </form>
<?php
}
// Display Restore Account Records
if (isset($_POST['restoreID'])) {
    $restoreID = $_POST['restoreID'];
    $_SESSION['restoreid'] = $restoreID;
?>
    <form action="useraccount.php" method="POST" enctype="multipart/form-data">
        <h3>Are you sure you want to restore this record?</h3>
        <div class="buttonflex">
            <button name="saverestoreaccount" type="submit" class="yes">Yes</button>
            <button class="no modal-close">No</button>
        </div>
    </form>
<?php
}


// STOCK SQL STATEMENTS
if (isset($_POST['productID'])) {
    $productID = $_POST['productID'];
    $sql = "Select * from tblstock where proid ='$productID'";
    $res = mysqli_query($conn, $sql);
    $upRow = mysqli_fetch_assoc($res);
    $pid = $upRow['proid'];
    $pname = $upRow['prodname'];
    $cat = $upRow['category'];
    $desc = $upRow['description'];
    $prc = $upRow['price'];
    $qty = $upRow['quantity'];
    $s = mysqli_query($conn, "select * from tblcategory");

?>
    <section class="tableproduct">
        <div class="table-profile">
            <form action="stockandaddstock.php" method="POST">
                <div class="formprofile">
                    <div>
                        <input type="text" name="proid" placeholder="Enter Product ID" value="<?= $pid; ?>" readonly>
                        <span>Product ID</span>
                    </div>
                    <div>
                        <input type="text" name="prodname" placeholder="Enter Item Name" value="<?= $pname; ?>">
                        <span>Item Name</span>
                    </div>
                    <div>
                        <select class="radiobtn" name="category" id="ut" value="<?= $cat; ?>">
                            <option><?php echo $cat; ?></option>
                            <?php
                            while ($r = mysqli_fetch_array($s)) {
                            ?>
                                <option value="<?php echo $r['category']; ?>"><?php echo $r['category']; ?> </option>
                            <?php
                            }
                            ?>
                        </select>Category
                    </div>

                    <div>
                        <input type="text" name="description" placeholder="Enter Description" value="<?= $desc; ?>">
                        <span>Description</span>
                    </div>
                    <div>
                        <input type="number" name="price" placeholder="Enter Price" value="<?= $prc; ?>">
                        <span>Price</span>
                    </div>
                    <div>
                        <input type="number" name="quantity" placeholder="Enter Quantity" value="0">
                        <span>Quantity</span>
                    </div>
                    <div>
                        <input type="date" name="expirydate">
                        <span>Expiration Date</span>
                    </div>

                </div>
                <div class="buttonflex">
                    <button name="updateproduct" type="submit" class="yes" title="Update the record">Update Record</button>
                    <button type="submit" class="cancel" title="Cancel activity">Cancel</button>
                </div>
            </form>
        </div>
    </section>
<?php
}


// STOCK SQL STATEMENTS // ARCHIVE STOCK STATEMENT
if (isset($_POST['proarchiveID'])) {
    $proarchiveID = $_POST['proarchiveID'];
    $_SESSION['proarchiveid'] = $proarchiveID;
?>
    <form action="stockandaddstock.php" method="POST">
        <h3>Are you sure you want to archive this product?</h3>
        <div class="buttonflex">
            <button name="archiveproduct" type="submit" class="yes" title="Archive the record">Yes</button>
            <button type="submit" class="no" title="Cancel activity">No</button>
        </div>
    </form>
<?php
}

// STOCK SQL STATEMENTS // RESTORE STOCK STATEMENT
if (isset($_POST['prorestoreID'])) {
    $prorestoreID = $_POST['prorestoreID'];
    $_SESSION['prorestoreid'] = $prorestoreID;
?>
    <form action="stockandaddstock.php" method="POST">
        <h3>Are you sure you want to restore this product?</h3>
        <div class="buttonflex">
            <button name="restoreproduct" type="submit" class="yes" title="Restore the record">Yes</button>
            <button type="submit" class="no" title="Cancel activity">No</button>
        </div>
    </form>
<?php
}

// Line of Owners Profile Editing and Restoring statement
// OWNERS PROFILE FORM DISPLAYING
if (isset($_POST['ownersprofileID'])) {
    $ownersprofileID = $_POST['ownersprofileID'];
    $sql = "Select * from tblownersprofile where ownersname ='$ownersprofileID'";
    $res = mysqli_query($conn, $sql);
    $upRow = mysqli_fetch_assoc($res);
    $cid = $upRow['cusid'];
    $op = $upRow['ownersname'];
    $cno = $upRow['contactno'];
    $add = $upRow['address'];
    $ea = $upRow['emailaddress'];
?>
    <section class="tableproduct">
        <form action="profile.php" method="POST">
            <div class="formprofile">
                <input type="hidden" name="cusid" placeholder="Enter Name" value="<?= $cid; ?>">
                <div>
                    <input type="text" name="ownersprofile" placeholder="Enter Name" value="<?= $op; ?>" readonly>
                    <span>Owner's Name</span>
                </div>
                <div>
                    <input type="text" name="contactno" placeholder="Enter Phone Number" value="<?= $cno; ?>">
                    <span>Contact No.</span>
                </div>
                <div>
                    <input type="text" name="address" placeholder="Enter Address" value="<?= $add; ?>">
                    <span>Address</span>
                </div>
                <div>
                    <input type="text" name="emailaddress" placeholder="Enter Email Address" value="<?= $ea; ?>">
                    <span>Email Address</span>
                </div>

            </div>
            <div class="buttonflex">
                <button name="updateownersprofile" type="submit" class="yes" title="Update the record">Update Record</button>
                <button type="submit" class="cancel modal-close" title="Cancel activity">Cancel</button>
            </div>
        </form>

    </section>
<?php
}

// PET PROFILEL SQL STATEMENTSSSSSSS
if (isset($_POST['updatepetID'])) {
    $updatepetID = $_POST['updatepetID'];
    $sql = "Select * from tblpet where petid ='$updatepetID'";
    $res = mysqli_query($conn, $sql);
    $upRow = mysqli_fetch_assoc($res);
    $pid = $upRow['petid'];
    $op = $upRow['ownersname'];
    $pname = $upRow['petname'];
    $pt = $upRow['pettype'];
    $age = $upRow['age'];
    $sex = $upRow['sex'];
    $breed = $upRow['breed'];
    $weight = $upRow['weight'];
  
    $s = mysqli_query($conn, "select * from tblusertype");

?>
    <section class="tableaccountrecords">
        <div class="accountrecordsbgr">
            <div class="accountrecords">
                <form action="profile.php" method="POST" enctype="multipart/form-data">
                    <div class="fleximage">
                        <div class="updatephotoedit">
                            <label for="file-upload" class="custom-file-uploadedit">
                                <span class="material-symbols-sharp"> upload </span>
                            </label>
                            <img src="../images/dog.png" class="img-style" id="image-preview" />
                        </div>
                        <div class="upload">
                            <h2>Insert jpg, jpeg, and png files only.</h2>
                            <button type="submit" name="uploadphoto" class="uploadbtn">Upload</button>
                        </div>
                        <div class="medhis">
                            <a href="medicalhistory.php?petid=<?php echo $pid;?>" class="yesmh"><h2>Medical History</h2></a>
                        </div>
                        <input type="hidden" name="petid" value="<?= $pid ?>">
                        <input type="file" id="file-upload" name="image" title="Insert photo..." onchange="previewImage(event)" required />
                    </div>
                </form>
                <form action="profile.php" method="POST">
                    <div class="formprofileedit">
                         <input type="hidden" name="petid" value="<?= $pid ?>">
                        <div>
                            <input type="text" name="ownersname" value="<?= $op;  ?>" readonly>
                            <h3>Owner's Name</h3>
                        </div>
                        <div>
                            <input type="text" name="petname" value="<?= $pname;  ?>">
                            <h3>Pet Name</h3>
                        </div>
                        <div>
                            <select class="radiobtn" name="pettype" id="pettypeid" value="<?= $pt; ?>">
                                <?php
                                    while ($r = mysqli_fetch_array($p)) {
                                ?>
                                        <option value="<?php echo $r['pettypeid']; ?>"><?php echo $r['pettype']; ?> </option>
                                <?php
                                    }
                                ?>
                            </select><h3>Pet Type</h3>
                        </div>
                        <div>
                            <input type="number" name="age" value="<?= $age;  ?>">
                            <h3>Age</h3>
                        </div>
                        <div>
                            <select class="radiobtn" name="sex" id="utedit" value="<?= $sex; ?>">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select><h3>Sex</h3>
                        </div>
                        <div>
                            <select class="radiobtn" name="breed" id="bid" value="<?= $breed; ?>">
                                <option><?php echo $breed; ?></option>
                                <?php
                                    while ($r = mysqli_fetch_array($b)) {
                                ?>
                                        <option value="<?php echo $r['breed']; ?>"><?php echo $r['breed']; ?> </option>
                                <?php
                                    }
                                ?>
                            </select><h3>Breed</h3>
                        </div>
                        <div>
                            <input type="text" name="weight" value="<?= $weight; ?>">
                            <h3>Weight</h3>
                        </div>
                        <div class="buttonflex">
                            <button name="updatepet" type="submit" class="yesedit" title="Save Record">Update</button>
                            <button name="clear" class="canceledit" title="Cancel input">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
<?php
}



// archive owners profile statement
if (isset($_POST['archiveownersprofileID'])) {
    $archiveownersprofileID = $_POST['archiveownersprofileID'];
    $_SESSION['archiveownersprofileid'] = $archiveownersprofileID;
?>
    <form action="profile.php" method="POST">
        <h3>Are you sure you want to archive this record?</h3>
        <div class="buttonflex">
            <button name="savearchiveprofile" type="submit" class="yes">Yes</button>
            <button class="no modal-close">No</button>
        </div>
    </form>
<?php
}

// archive pet profile statement
if (isset($_POST['archivepetprofileID'])) {
    $archivepetprofileID = $_POST['archivepetprofileID'];
    $_SESSION['archivepetprofileID'] = $archivepetprofileID;
?>
    <form action="profile.php" method="POST">
        <h3>Are you sure you want to archive this record?</h3>
        <div class="buttonflex">
            <button name="savearchivepet" type="submit" class="yes">Yes</button>
            <button class="no modal-close">No</button>
        </div>
    </form>
<?php
}

// archive owners profile statement
if (isset($_POST['restoreownersprofileID'])) {
    $restoreownersprofileID = $_POST['restoreownersprofileID'];
    $_SESSION['restoreownersprofileid'] = $restoreownersprofileID;
?>
    <form action="profile.php" method="POST">
        <h3>Are you sure you want to restore this record?</h3>
        <div class="buttonflex">
            <button name="saverestoreprofile" type="submit" class="yes">Yes</button>
            <button class="no modal-close">No</button>
        </div>
    </form>
<?php
}


// archive owners profile statement
if (isset($_POST['restorepetprofileID'])) {
    $restorepetprofileID = $_POST['restorepetprofileID'];
    $_SESSION['restorepetprofileid'] = $restorepetprofileID;
?>
    <form action="profile.php" method="POST">
        <h3>Are you sure you want to restore this record?</h3>
        <div class="buttonflex">
            <button name="saverestorepet" type="submit" class="yes">Yes</button>
            <button class="no modal-close">No</button>
        </div>
    </form>
<?php
}


// DISPLAY SETTINGS USERTYPE SQL STATEMENTS
if (isset($_POST['utID'])) {
    $utID = $_POST['utID'];
    $sql = "Select * from tblusertype where utid ='$utID'";
    $res = mysqli_query($conn, $sql);
    $upRow = mysqli_fetch_assoc($res);
    $utid = $upRow['utid'];
    $ut = $upRow['usertype'];

?>
    <section class="tableproduct">

        <form action="settings.php" method="POST">
            <div class="formprofile">
                <div>
                    <input type="hidden" name="utid" placeholder="Enter Product ID" value="<?= $utid; ?>" readonly>
                </div>
                <div>
                    <input type="text" name="usertype" placeholder="Enter Item Name" value="<?= $ut; ?>">
                    <span>Usertype</span>
                </div>
            </div>
            <div class="buttonflex">
                <button name="updateusertype" type="submit" class="yes" title="Update the record">Update Changes</button>
                <button type="submit" class="cancel modal-close" title="Cancel activity">Cancel</button>
            </div>
        </form>

    </section>
<?php
}

// DISPLAY SETTINGS PETTYPE SQL STATEMENTS
if (isset($_POST['ptID'])) {
    $ptID = $_POST['ptID'];
    $sql = "Select * from tblpettype where pettypeid ='$ptID'";
    $res = mysqli_query($conn, $sql);
    $upRow = mysqli_fetch_assoc($res);
    $ptid = $upRow['pettypeid'];
    $pt = $upRow['pettype'];

?>
    <section class="tableproduct">

        <form action="settings.php" method="POST">
            <div class="formprofile">
                <div>
                    <input type="hidden" name="ptid" placeholder="Enter Product ID" value="<?= $ptid; ?>" readonly>
                </div>
                <div>
                    <input type="text" name="pettype" placeholder="Enter Pet type" value="<?= $pt; ?>">
                    <span>Pettype</span>
                </div>
            </div>
            <div class="buttonflex">
                <button name="updatepettype" type="submit" class="yes" title="Update the record">Update Changes</button>
                <button type="submit" class="cancel modal-close" title="Cancel activity">Cancel</button>
            </div>
        </form>

    </section>
<?php
}

// DISPLAY SETTINGS BREED SQL STATEMENTS
if (isset($_POST['bID'])) {
    $bID = $_POST['bID'];
    $sql = "Select * from tblbreed where bid ='$bID'";
    $res = mysqli_query($conn, $sql);
    $upRow = mysqli_fetch_assoc($res);
    $bid = $upRow['bid'];
    $br = $upRow['breed'];

?>
    <section class="tableproduct">
        <form action="settings.php" method="POST">
            <div class="formprofile">
                <div>
                    <input type="hidden" name="bid" placeholder="Enter Product ID" value="<?= $bid; ?>" readonly>
                </div>
                <div>
                    <input type="text" name="breed" placeholder="Enter Pet type" value="<?= $br; ?>">
                    <span>Breed</span>
                </div>
            </div>
            <div class="buttonflex">
                <button name="updatebreed" type="submit" class="yes" title="Update the record">Update Changes</button>
                <button type="submit" class="cancel modal-close" title="Cancel activity">Cancel</button>
            </div>
        </form>
    </section>
<?php
}

// DISPLAY SETTINGS REMOVE USERTYPE SQL STATEMENTS
if (isset($_POST['rutID'])) {
    $rutID = $_POST['rutID'];
    $sql = "Select * from tblusertype where utid ='$rutID'";
    $res = mysqli_query($conn, $sql);
    $deRow = mysqli_fetch_assoc($res);
    $utid = $deRow['utid'];
?>
    <section class="tableproduct">
        <div>
            <form action="settings.php" method="POST">

                <div class="formprofile formarchive">
                    <input type="text" name="rutid" placeholder="Enter Product ID" value="<?= $utid; ?>">
                </div>
                <h3>Are you sure you want to remove this record?</h3>
                <div class="buttonflex">
                    <button name="removeusertype" class="yes" title="Remove the record">Yes</button>
                    <button class="no" title="Cancel activity">No</button>
                </div>
            </form>
        </div>
    </section>
<?php
}

// DISPLAY SETTINGS CATEGORY SQL STATEMENTS
if (isset($_POST['catID'])) {
    $catID = $_POST['catID'];
    $sql = "Select * from tblcategory where catid ='$catID'";
    $res = mysqli_query($conn, $sql);
    $upRow = mysqli_fetch_assoc($res);
    $catid = $upRow['catid'];
    $cat = $upRow['category'];

?>
    <section class="tableproduct">

        <form action="settings.php" method="POST">
            <div class="formprofile">
                <div>
                    <input type="hidden" name="catid" placeholder="Enter Category ID" value="<?= $catid; ?>" readonly>
                </div>
                <div>
                    <input type="text" name="category" placeholder="Enter New Category" value="<?= $cat; ?>">
                    <span>Category</span>
                </div>
            </div>
            <div class="buttonflex">
                <button name="updatecategory" type="submit" class="yes" title="Update the record">Update Changes</button>
                <button type="submit" class="cancel modal-close" title="Cancel activity">Cancel</button>
            </div>
        </form>

    </section>
<?php
}
// DISPLAY SETTINGS SERVICES SQL STATEMENTS
if (isset($_POST['sID'])) {
    $sID = $_POST['sID'];
    $sql = "Select * from tblservices where sid ='$sID'";
    $res = mysqli_query($conn, $sql);
    $upRow = mysqli_fetch_assoc($res);
    $sid = $upRow['sid'];
    $ser = $upRow['services'];

?>
    <section class="tableproduct">

        <form action="settings.php" method="POST">
            <div class="formprofile">
                <div>
                    <input type="hidden" name="sid" placeholder="Enter Services ID" value="<?= $sid; ?>" readonly>
                </div>
                <div>
                    <input type="text" name="services" placeholder="Enter New Services" value="<?= $ser; ?>">
                    <span>Services</span>
                </div>
            </div>
            <div class="buttonflex">
                <button name="updateservices" type="submit" class="yes" title="Update the record">Update Changes</button>
                <button type="submit" class="cancel modal-close" title="Cancel activity">Cancel</button>
            </div>
        </form>

    </section>
<?php
}
// DISPLAY SETTINGS CHARGES AND FEES SQL STATEMENTS
if (isset($_POST['proID'])) {
    $proID = $_POST['proID'];
    $sql = "Select * from tblservices where sid ='$proID'";
    $res = mysqli_query($conn, $sql);
    $upRow = mysqli_fetch_assoc($res);
    $proid = $upRow['sid'];
    $caf = $upRow['price'];

?>
    <section class="tableproduct">

        <form action="settings.php" method="POST">
            <div class="formprofile">
                <div>
                    <input type="hidden" name="sid" placeholder="Enter Service ID" value="<?= $proid; ?>" readonly>
                </div>
                <div>
                    <input type="text" name="price" placeholder="Enter Service Price" value="<?= $caf; ?>">
                    <span>New Stock Price</span>
                </div>
            </div>
            <div class="buttonflex">
                <button name="updateprice" type="submit" class="yes" title="Update the record">Update Changes</button>
                <button type="submit" class="cancel modal-close" title="Cancel activity">Cancel</button>
            </div>
        </form>

    </section>
<?php
}

// DISPLAY SETTINGS REMOVE PETTYPE SQL STATEMENTS
if (isset($_POST['rptID'])) {
    $rptID = $_POST['rptID'];
    $sql = "Select * from tblpettype where pettypeid ='$rptID'";
    $res = mysqli_query($conn, $sql);
    $deRow = mysqli_fetch_assoc($res);
    $ptid = $deRow['pettypeid'];
?>
    <section class="tableproduct">
        <div>
            <form action="settings.php" method="POST">

                <div class="formprofile formarchive">
                    <input type="text" name="rptid" placeholder="Enter Product ID" value="<?= $ptid; ?>">
                </div>
                <h3>Are you sure you want to remove this record?</h3>
                <div class="buttonflex">
                    <button name="removepettype" class="yes" title="Remove the record">Yes</button>
                    <button class="no" title="Cancel activity">No</button>
                </div>
            </form>
        </div>
    </section>
<?php
}

// DISPLAY SETTINGS REMOVE BREED SQL STATEMENTS
if (isset($_POST['rbID'])) {
    $rbID = $_POST['rbID'];
    $sql = "Select * from tblbreed where bid ='$rbID'";
    $res = mysqli_query($conn, $sql);
    $deRow = mysqli_fetch_assoc($res);
    $bid = $deRow['bid'];
?>
    <section class="tableproduct">
        <div>
            <form action="settings.php" method="POST">
                <div class="formprofile formarchive">
                    <input type="text" name="bid" placeholder="Enter Product ID" value="<?= $bid; ?>">
                </div>
                <h3>Are you sure you want to remove this record?</h3>
                <div class="buttonflex">
                    <button name="removebreed" class="yes" title="Remove the record">Yes</button>
                    <button class="no" title="Cancel activity">No</button>
                </div>
            </form>
        </div>
    </section>
<?php
}

// DISPLAY SETTINGS REMOVE CATEGORY SQL STATEMENTS
if (isset($_POST['rcatID'])) {
    $rcatID = $_POST['rcatID'];
    $sql = "Select * from tblcategory where catid ='$rcatID'";
    $res = mysqli_query($conn, $sql);
    $deRow = mysqli_fetch_assoc($res);
    $catid = $deRow['catid'];
?>
    <section class="tableproduct">
        <div>
            <form action="settings.php" method="POST">

                <div class="formprofile formarchive">
                    <input type="text" name="rcatid" placeholder="Enter Category ID" value="<?= $catid; ?>">
                </div>
                <h3>Are you sure you want to remove this record?</h3>
                <div class="buttonflex">
                    <button name="removecategory" class="yes" title="Remove the record">Yes</button>
                    <button class="no" title="Cancel activity">No</button>
                </div>
            </form>
        </div>
    </section>
<?php
}

// DISPLAY SETTINGS REMOVE SERVICES SQL STATEMENTS
if (isset($_POST['rsID'])) {
    $rsID = $_POST['rsID'];
    $sql = "Select * from tblservices where sid ='$rsID'";
    $res = mysqli_query($conn, $sql);
    $deRow = mysqli_fetch_assoc($res);
    $sid = $deRow['sid'];
?>
    <section class="tableproduct">
        <div>
            <form action="settings.php" method="POST">

                <div class="formprofile formarchive">
                    <input type="text" name="rsid" placeholder="Enter Services ID" value="<?= $sid; ?>">
                </div>
                <h3>Are you sure you want to remove this record?</h3>
                <div class="buttonflex">
                    <button name="removeservices" class="yes" title="Remove the record">Yes</button>
                    <button class="no" title="Cancel activity">No</button>
                </div>
            </form>
        </div>
    </section>
<?php
}
// DISPLAY SETTINGS REMOVE CHARGES AND FEES SQL STATEMENTS
if (isset($_POST['rproID'])) {
    $rproID = $_POST['rproID'];
    $sql = "Select * from tblstock where proid ='$rproID'";
    $res = mysqli_query($conn, $sql);
    $deRow = mysqli_fetch_assoc($res);
    $proid = $deRow['proid'];
?>
    <section class="tableproduct">
        <div>
            <form action="settings.php" method="POST">

                <div class="formprofile formarchive">
                    <input type="text" name="rproid" placeholder="Enter Stock ID" value="<?= $proid; ?>">
                </div>
                <h3>Are you sure you want to remove this record?</h3>
                <div class="buttonflex">
                    <button name="removeprice" class="yes" title="Remove the record">Yes</button>
                    <button class="no" title="Cancel activity">No</button>
                </div>
            </form>
        </div>
    </section>
<?php
}




// Transaction Module Forms

// Selecting Profile form
if (isset($_POST['selectprofileID'])) {
    $selectprofileID = $_POST['selectprofileID'];
    $sql = "Select * from tblownersprofile where ownersname ='$selectprofileID'";
    $res = mysqli_query($conn, $sql);
    $upRow = mysqli_fetch_assoc($res);
    $op = $upRow['ownersname'];
    $_SESSION['ownersname'] = $op = $upRow['ownersname'];
?>
    <section class="tableproduct">
        <div>
            <h3>Do you want to select this profile?</h3>
            <form action="productsandservices.php" method="POST">
                <div class="buttonflex">
                    <button name="saveselectprofile" type="submit" class="yes" title="Confirm activity">Yes</button>
                    <button class="no modal-close" title="Cancel activity">No</button>
                </div>
            </form>
        </div>
    </section>
<?php
}

// Selecting Profile form
if (isset($_POST['selectproductID'])) {
    $selectproductID = $_POST['selectproductID'];
    $sql = "Select * from tblstock where proid ='$selectproductID'";
    $res = mysqli_query($conn, $sql);
    $upRow = mysqli_fetch_assoc($res);
    $pname = $upRow['prodname'];
    $cat = $upRow['category'];
    $prc = $upRow['price'];
    $_SESSION['price'] = $prc = $upRow['price'];
    $_SESSION['prodname'] = $pname = $upRow['prodname'];
    $_SESSION['category'] = $cat = $upRow['category'];

?>
    <section class="tableproduct">
        <div>
            <h3>Do you want to select this product?</h3>
            <form action="productsandservices.php" method="POST">
                <div class="buttonflex">
                    <button name="saveselectproduct" type="submit" class="yes" title="Confirm activity">Yes</button>
                    <button class="no modal-close" title="Cancel activity">No</button>
                </div>
            </form>
        </div>
    </section>
<?php
}


// REMOVE CART SQL STATEMENTS 
if (isset($_POST['removecartID'])) {
    $removecartID = $_POST['removecartID'];
    $sql = "update tblorder set cart = 'Removed' where orderid ='$removecartID'";
    $res = mysqli_query($conn, $sql);
} 

// REMOVE APPOINTMENT SQL STATEMENTS 
if (isset($_POST['removeappointmentID'])) {
    $removeappointmentID = $_POST['removeappointmentID'];
    $sql = "update tblappointments set scheduled = 'Removed' where queueno ='$removeappointmentID'";
    $res = mysqli_query($conn, $sql);
} 


// REPORT TRANSACTION SALES INVOICE
if (isset($_POST['printreceiptID'])) {
    $printreceiptID = $_POST['printreceiptID'];
    $sql = "Select * from tblorder where transactionid ='$printreceiptID'";
    $res = mysqli_query($conn, $sql);
?>
    <table class="content-table tblreceipt">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Transaction ID</th>
                <th>Category</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($res) {
                while ($row = mysqli_fetch_assoc($res)) {
                    $oid = $row['orderid'];
                    $tid = $row['transactionid'];
                    $cat = $row['category'];
                    $pname = $row['prodname'];
                    $prc = $row['price'];
                    $qty = $row['quantity'];
                    echo '<tr>
                                    <td>' . $oid . '</td>
                                    <td>' . $tid . '</td>
                                    <td>' . $cat . '</td>
                                    <td>' . $pname . '</td>
                                    <td>' . $qty . '</td>
                                    <td>' . number_format($prc, 2) . '</td>
                                    </tr>';
                }
                $sql1 = "select * from tbltransaction where transactionid = '$tid'";
                $res1 = mysqli_query($conn, $sql1);
                $row1 = mysqli_fetch_assoc($res1);
                $totalPrice = $row1['totalprice'];
                $date = $row1['date'];
            }
            ?>
            <div class="flex">
                <h2>Date Issued: <?php echo $date; ?></h2>
                <h2>Total Amount: <?php echo '₱ ' . number_format($totalPrice, 2); ?></h2>
            </div>
        </tbody>
    </table>
<?php

}

?>
<script>
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
</script>
<?php

include 'scriptingfiles.php';

?>