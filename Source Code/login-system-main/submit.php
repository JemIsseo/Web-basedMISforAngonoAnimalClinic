<?php
session_start();
include 'connect.php';

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
        <div class="accountrecordsbg">
            <div class="accountrecords ">
                <form action="useraccount.php" method="POST" enctype="multipart/form-data">
                    <div class="profilepicture">
                        <div class="updatephoto">
                            <img src="uploads/<?php echo $img; ?>">
                        </div>
                        <input type="hidden" name="username" placeholder="Enter Username" value="<?= $un;  ?>" readonly>
                        <input type="file" name="image" title="Insert photo..." value=" <?= $img; ?> ">
                    </div>
                    <button type="submit" name="uploadphoto" class="uploadbtn">Upload</button>
                </form>
                <form action="useraccount.php" method="POST">
                    <div class="formprofile">
                        <div>
                            <input type="text" name="username" placeholder="Enter Username" value="<?= $un;  ?>" readonly>
                            <span>Username</span>
                        </div>
                        <div>
                            <input type="password" name="password" placeholder="Contact Admin" id="passwordup" value="<?= $pw;  ?>" readonly>
                            <span>Password</span>
                        </div>
                        <div>
                            <select class="radiobtn" name="usertype" id="ut">
                                <option selected="" disabled="" value="<?= $ut; ?>"><?php echo $ut; ?></option>
                                <?php
                                while ($r = mysqli_fetch_array($s)) {
                                ?>
                                    <option value="<?= $r['usertype']; ?>"><?= $r['usertype']; ?> </option>
                                <?php
                                }
                                ?>
                            </select>Usertype
                        </div>
                        <div>
                            <input type="email" name="email" placeholder="Enter Email" value="<?= $ea;  ?>">
                            <span>Email Address</span>
                        </div>

                        <div class="buttonflex">
                            <button name="updateaccount" type="submit" class="yes" title="Save Record">Update</button>
                            <button name="clear" class="cancel" title="Cancel input">Cancel</button>
                        </div>
                </form>
            </div>
        </div>
    </section>
<?php
}

if (isset($_POST['archiveID'])) {
    $archiveID = $_POST['archiveID'];
    $sql = "Select * from tbluseraccount where username ='$archiveID'";
    $res = mysqli_query($conn, $sql);
    $arRow = mysqli_fetch_assoc($res);
    $img = $arRow['image'];
    $un = $arRow['username'];
    $pw = $arRow['password'];
    $ut = $arRow['usertype'];
    $ea = $arRow['email'];
    $s = mysqli_query($conn, "select * from tblusertype");

?>
    <form action="useraccount.php" method="POST" enctype="multipart/form-data">
        <section class="tableaccountrecords">
            <div class="accountrecordsbg formarchive">
                <div class="accountrecords ">
                    <div class="profilepicture">
                        <input type="file" name="image" title="Insert photo..." value=" <?= $img; ?> ">
                    </div>
                    <div class="formprofile">
                        <div>
                            <input type="text" name="username" placeholder="Enter Username" value="<?= $un;  ?>" readonly>
                            <span>Username</span>
                        </div>
                        <div>
                            <input type="password" name="password" placeholder="Enter Password" value="<?= $pw;  ?>">
                            <span>Password</span>
                        </div>
                        <div>
                            <input type="text" name="usertype" placeholder="Enter Password" value="<?= $ut;  ?>">
                        </div>
                        <div>
                            <input type="email" name="email" placeholder="Enter Email" value="<?= $ea;  ?>">
                            <span>Email Address</span>
                        </div>
                    </div>

                </div>
            </div>
        </section>
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
    $sql = "Select * from tblarcuseraccount where username ='$restoreID'";
    $res = mysqli_query($conn, $sql);
    $reRow = mysqli_fetch_assoc($res);
    $img = $reRow['image'];
    $un = $reRow['username'];
    $pw = $reRow['password'];
    $ut = $reRow['usertype'];
    $ea = $reRow['email'];
?>
    <form action="useraccount.php" method="POST" enctype="multipart/form-data">
        <section class="tableaccountrecords">
            <div class="accountrecordsbg formarchive">
                <div class="accountrecords ">
                    <div class="profilepicture">
                        <input type="file" name="image" title="Insert photo..." value=" <?= $img; ?> ">
                    </div>
                    <div class="formprofile">
                        <div>
                            <input type="text" name="username" placeholder="Enter Username" value="<?= $un;  ?>" readonly>
                            <span>Username</span>
                        </div>
                        <div>
                            <input type="password" name="password" placeholder="Enter Password" value="<?= $pw;  ?>">
                            <span>Password</span>
                        </div>
                        <div>
                            <input type="text" name="usertype" placeholder="Enter Password" value="<?= $ut;  ?>">
                        </div>
                        <div>
                            <input type="email" name="email" placeholder="Enter Email" value="<?= $ea;  ?>">
                            <span>Email Address</span>
                        </div>
                    </div>

                </div>
            </div>
        </section>
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
                        <select class="radiobtn" name="category" id="ut">
                            <option value="<?= $cat; ?>">Select Category</option>
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
                        <input type="number" name="quantity" placeholder="Enter Quantity" value="<?= $qty; ?>">
                        <span>Quantity</span>
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
    $sql = "Select * from tblstock where proid ='$proarchiveID'";
    $res = mysqli_query($conn, $sql);
    $arRow = mysqli_fetch_assoc($res);
    $pid = $arRow['proid'];
    $pname = $arRow['prodname'];
    $cat = $arRow['category'];
    $desc = $arRow['description'];
    $prc = $arRow['price'];
    $qty = $arRow['quantity'];
    $s = mysqli_query($conn, "select * from tblcategory");

?>
    <section class="tableproduct">
        <div>
            <form action="stockandaddstock.php" method="POST">

                <div class="formprofile formarchive">

                    <input type="hidden" name="proid" placeholder="Enter Product ID" value="<?= $pid; ?>">

                    <div>
                        <input type="text" name="prodname" placeholder="Enter Item Name" value="<?= $pname; ?>">
                        <span>Item Name</span>
                    </div>
                    <div>
                        <select class="radiobtn" name="category" id="ut">
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
                        <input type="text" name="price" placeholder="Enter Price" value="<?= $prc; ?>">
                        <span>Price</span>
                    </div>
                    <div>
                        <input type="text" name="quantity" placeholder="Enter Quantity" value="<?= $qty; ?>">
                        <span>Quantity</span>
                    </div>

                </div>
                <h3>Are you sure you want to archive this product?</h3>
                <div class="buttonflex">
                    <button name="archiveproduct" type="submit" class="yes" title="Archive the record">Yes</button>
                    <button type="submit" class="no" title="Cancel activity">No</button>
                </div>
            </form>
        </div>
    </section>
<?php
}

// STOCK SQL STATEMENTS // RESTORE STOCK STATEMENT
if (isset($_POST['prorestoreID'])) {
    $prorestoreID = $_POST['prorestoreID'];
    $sql = "Select * from tblarcstock where proid ='$prorestoreID'";
    $res = mysqli_query($conn, $sql);
    $reRow = mysqli_fetch_assoc($res);
    $pid = $reRow['proid'];
    $pname = $reRow['prodname'];
    $cat = $reRow['category'];
    $desc = $reRow['description'];
    $prc = $reRow['price'];
    $qty = $reRow['quantity'];
    $s = mysqli_query($conn, "select * from tblcategory");

?>
    <section class="tableproduct">
        <div>
            <form action="stockandaddstock.php" method="POST">

                <div class="formprofile formarchive">

                    <input type="hidden" name="proid" placeholder="Enter Product ID" value="<?= $pid; ?>">

                    <div>
                        <input type="text" name="prodname" placeholder="Enter Item Name" value="<?= $pname; ?>">
                        <span>Item Name</span>
                    </div>
                    <div>
                        <select class="radiobtn" name="category" id="ut">
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
                        <input type="text" name="price" placeholder="Enter Price" value="<?= $prc; ?>">
                        <span>Price</span>
                    </div>
                    <div>
                        <input type="text" name="quantity" placeholder="Enter Quantity" value="<?= $qty; ?>">
                        <span>Quantity</span>
                    </div>

                </div>
                <h3>Are you sure you want to restore this product?</h3>
                <div class="buttonflex">
                    <button name="restoreproduct" type="submit" class="yes" title="Restore the record">Yes</button>
                    <button type="submit" class="no" title="Cancel activity">No</button>
                </div>
            </form>
        </div>
    </section>
<?php
}
// Line of Owners Profile Editing and Restoring statement









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
                <button type="submit" class="cancel" title="Cancel activity">Cancel</button>
            </div>
        </form>

    </section>
<?php
}
// SETTINGS

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
// Cascading Dropdown in Customer's Module
if (isset($_POST['cusid'])) {
    $cusid = $_POST['cusid'];
    $result = $conn->query("SELECT * FROM tblpet WHERE cusid = $cusid ORDER BY petname");

    if (mysqli_num_rows($result) > 0) {
        echo '<option value="">Choose Pet</option>';
        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row['petname'] . '">' . $row['petname'] . '</option>';
        }
    }
}

if (isset($_POST['pettypeid'])) {
    $pettypeid = $_POST['pettypeid'];
    $result = $conn->query("SELECT * FROM tblbreed WHERE pettypeid = $pettypeid ORDER BY breed");

    if (mysqli_num_rows($result) > 0) {
        echo '<option value="">Select Breed</option>';
        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row['bid'] . '">' . $row['breed'] . '</option>';
        }
    }
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
            <h3>Do you want to select this record?</h3>
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
            <h3>Do you want to select this record?</h3>
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


include 'scriptingfiles.php';

?>