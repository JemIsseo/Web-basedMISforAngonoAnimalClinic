<?php
include 'connect.php';
$s = mysqli_query($conn, "select * from tblusertype");
// SEARCH TABLE FOR MODULE USERACCOUNT
if (isset($_POST['query'])) {
    $query = $_POST['query'];

    $sql = "SELECT * FROM tbluseraccount WHERE archive = 'false' AND username LIKE '%" . $query . "%' ORDER BY username";
    $result = mysqli_query($conn, $sql);

    // display the results in tables
    if (mysqli_num_rows($result) > 0) {
?>
        <div class="accountrecordsbgedit" id="edituserAccount">

            <table class="content-table table-fixed">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Usertype</th>
                        <th>Email Address</th>
                        <th>Image</th>
                        <th> </th>
                    </tr>
                </thead>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tbody>
                        <?php
                        $un = $row['username'];
                        $pw = $row['password'];
                        $ut = $row['usertype'];
                        $ea = $row['email'];
                        $img = $row['image'];
                        ?>
                        <tr>
                            <td><?php echo $un; ?></td>
                            <td><?php echo $pw; ?></td>
                            <td><?php echo $ut; ?></td>
                            <td><?php echo $ea; ?></td>
                            <td>
                                <div class="profile-photo">
                                    <img src="uploads/<?php echo $img; ?>">
                                </div>
                            </td>
                            <?php echo '
                                <td>
                                    <button class="modal-open showUpdateAccount"  value="' . $un . '" ><span class="material-symbols-sharp edit" title="Edit this account">edit</span></button>
                                    <button class="modal-open showArchiveAccount" data-modal="modal2" value="' . $un . '"><span class="material-symbols-sharp archive" title="Archive the record">archive</span></button>
                                </td>';   ?>
                        </tr>
                    </tbody>
                <?php
                }
                ?>
            </table>
            <div class="createaccount">
                            <h1>Create An Account</h1>
                            <div>
                                <div class="accountrecords ">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <div class="profilepicture">
                                            <img src="../images/R.png" class="img-style" id="image-preview" />
                                            <label for="file-upload" class="custom-file-upload">
                                                <span class="material-symbols-sharp"> upload </span>
                                            </label>
                                            <input type="file" id="file-upload" name="my_image" title="Insert photo..." onchange="previewImage(event)" required />

                                        </div>
                                        <div class="formprofile">
                                            <div>
                                                <input type="text" name="username" placeholder="Enter Username" required>
                                                <span>Username</span>
                                            </div>
                                            <div>
                                                <input type="password" name="password" placeholder="Enter Password" id="password" required>
                                                <span>Password</span>
                                            </div>
                                            <div class="show">
                                                <i class="fa-solid fa-eye" aria-hidden="true" id="eye" onclick="toggle()"></i>
                                            </div>
                                            <div>
                                                <input type="password" name="confirmpassword" id="confirmpassword" placeholder="Enter Confirm Password" required>
                                                <span>Confirm Password</span>
                                            </div>
                                            <div class="showcp">
                                                <i class="fa-solid fa-eye" aria-hidden="true" id="eye" onclick="togglecp()"></i>
                                            </div>
                                            <div>
                                                <select class="radiobtn" name="usertype" id="ut">
                                                <option disabled selected style="display: none">Choose</option>
                                                    <?php
                                                    while ($r = mysqli_fetch_array($s)) {
                                                    ?>
                                                        <option value="<?php echo $r['usertype']; ?>"><?php echo $r['usertype']; ?> </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>Usertype
                                            </div>
                                            <div>
                                                <input type="email" name="email" placeholder="Enter Email" required>
                                                <span>Email Address</span>
                                            </div>
                                            <div class="buttonflex">
                                                <button name="saveaccount" type="submit" class="save" title="Save the record">Save</button>
                                                <button class="cancel" title="Clear all inputs" id="clear-button">Clear</button>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
        </div>
    <?php

    } else {
        echo "<h2 style='text-align: center'>No results found</h2>";
    }
}

// SEARCH TABLE FOR MODULE USERACCOUNT RESTORE
if (isset($_POST['queryrestore'])) {
    $queryrestore = $_POST['queryrestore'];

    $sql = "SELECT * FROM tbluseraccount WHERE archive = 'true' AND username LIKE '%" . $queryrestore . "%' ORDER BY username";
    $result = mysqli_query($conn, $sql);

    // display the results in tables
    if (mysqli_num_rows($result) > 0) {
    ?>
        <table class="content-table table-fixed">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Usertype</th>
                    <th>Email Address</th>
                    <th>Image</th>
                    <th> </th>
                </tr>
            </thead>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tbody>
                    <?php
                    $un = $row['username'];
                    $pw = $row['password'];
                    $ut = $row['usertype'];
                    $ea = $row['email'];
                    ?>
                    <tr>
                        <td><?php echo $un; ?></td>
                        <td><?php echo $pw; ?></td>
                        <td><?php echo $ut; ?></td>
                        <td><?php echo $ea; ?></td>
                        <td> </td>
                        <?php echo '
                                <td>
                                    <button class="modal-open showRestoreAccount" data-modal="modal3" value="' . $un . '"><span class="material-symbols-sharp restore" title="Restore this account">unarchive</span></button>
                                </td>';   ?>
                    </tr>
                </tbody>
            <?php
            }
            ?>
        </table>

    <?php

    } else {
        echo "<h2 style='text-align: center'>No results found</h2>";
    }
}



// SEARCH TABLE FOR STOCKS MODULE STOCKANDADDSTOCK 
if (isset($_POST['querystock'])) {
    $querystock = $_POST['querystock'];

    $sql = "SELECT * FROM tblstock WHERE archive = 'false' AND prodname LIKE '%" . $querystock . "%' ORDER BY proid desc";
    $result = mysqli_query($conn, $sql);

    // display the results in tables
    if (mysqli_num_rows($result) > 0) {
    ?>
        <table class="content-table table-fixed">
            <thead>
                <tr>
                    <th>ProductID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th> </th>
                </tr>
            </thead>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tbody>
                    <?php
                    $pid = $row['proid'];
                    $pname = $row['prodname'];
                    $cat = $row['category'];
                    $desc = $row['description'];
                    $prc = $row['price'];
                    $qty = $row['quantity'];
                    ?>
                    <tr>
                        <td><?php echo $pid; ?></td>
                        <td><?php echo $pname; ?></td>
                        <td><?php echo $cat; ?></td>
                        <td><?php echo $desc; ?></td>
                        <td><?php echo $prc; ?></td>
                        <td><?php echo $qty; ?></td>
                        <?php echo '
                                <td>
                                <button class="modal-open showUpdateProduct" data-modal="modal1" value="' . $pid . '" ><span class="material-symbols-sharp edit" title="Edit this product">edit</span></button>
                                <button class="modal-open showArchiveProduct" data-modal="modal2" value="' . $pid . '"><span class="material-symbols-sharp archive" title="Archive the record">archive</span></button>
                                </td>';  ?>
                    </tr>

                </tbody>
            <?php
            }
            ?>
        </table>

    <?php

    } else {
        echo "<h2 style='text-align: center'>No results found</h2>";
    }
}

// SEARCH TABLE FOR STOCK MODULE RESTORE 
if (isset($_POST['queryrestorestock'])) {
    $queryrestorestock = $_POST['queryrestorestock'];

    $sql = "SELECT * FROM tblstock WHERE archive = 'true' AND prodname LIKE '%" . $queryrestorestock . "%' ORDER BY proid desc";
    $result = mysqli_query($conn, $sql);

    // display the results in tables
    if (mysqli_num_rows($result) > 0) {
    ?>
        <table class="content-table table-fixed">
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th> </th>
                </tr>
            </thead>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tbody>
                    <?php
                    $pid = $row['proid'];
                    $pname = $row['prodname'];
                    $cat = $row['category'];
                    $desc = $row['description'];
                    $prc = $row['price'];
                    $qty = $row['quantity'];
                    ?>
                    <tr>
                        <td><?php echo $pid; ?></td>
                        <td><?php echo $pname; ?></td>
                        <td><?php echo $cat; ?></td>
                        <td><?php echo $desc; ?></td>
                        <td><?php echo $prc; ?></td>
                        <td><?php echo $qty; ?></td>
                        <?php echo '
                        <td>
                            <button class="modal-open showRestoreProduct" data-modal="modal3" value="' . $pid . '" ><span class="material-symbols-sharp restore" title="Restore this product">unarchive</span></button>
                        </td>';   ?>
                    </tr>
                </tbody>
            <?php
            }
            ?>
        </table>

    <?php

    } else {
        echo "<h2 style='text-align: center'>No results found</h2>";
    }
}




// SEARCH TABLE FOR CUSTOMERS MODULE PETPROFILE
if (isset($_POST['querypetprofile'])) {
    $querypetprofile = $_POST['querypetprofile'];

    $sql = "SELECT * FROM tblpet WHERE archive = 'false' AND petname LIKE '%" . $querypetprofile . "%' ORDER BY petid desc";
    $result = mysqli_query($conn, $sql);

    // display the results in tables
    if (mysqli_num_rows($result) > 0) {
    ?>
        <table class="content-table table-fixed">
            <thead>
                <tr>
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
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tbody>
                    <?php
                    $pid = $row['petid'];
                    $op = $row['ownersname'];
                    $pname = $row['petname'];
                    $pt = $row['pettype'];
                    $age = $row['age'];
                    $sex = $row['sex'];
                    $breed = $row['breed'];
                    $weight = $row['weight'];
                    ?>
                    <tr>
                        <td><?php echo $op; ?></td>
                        <td><?php echo $pname; ?></td>
                        <td><?php echo $pt; ?></td>
                        <td><?php echo $age; ?></td>
                        <td><?php echo $sex; ?></td>
                        <td><?php echo $breed; ?></td>
                        <td><?php echo $weight; ?></td>
                        <?php echo '
                                            <td>
                                                <button class="modal-open showUpdateAccount" data-modal="modal1" value="' . $pid . '" ><span class="material-symbols-sharp edit" title="Edit this account">edit</span></button>
                                                <button class="modal-open showArchiveAccount" data-modal="modal2" value="' . $pid . '"><span class="material-symbols-sharp archive" title="Archive the record">archive</span></button>
                                            </td>';   ?>
                    </tr>
                </tbody>
            <?php
            }
            ?>
        </table>

    <?php

    } else {
        echo "<h2 style='text-align: center'>No results found</h2>";
    }
}
// SEARCH TABLE FOR CUSTOMERS MODULE OWNERSNAME
if (isset($_POST['queryownersname'])) {
    $queryownersname = $_POST['queryownersname'];

    $sql = "SELECT * FROM tblownersprofile WHERE archive = 'false' AND ownersname LIKE '%" . $queryownersname . "%' ORDER BY cusid desc";
    $result = mysqli_query($conn, $sql);

    // display the results in tables
    if (mysqli_num_rows($result) > 0) {
    ?>
        <table class="content-table table-fixed">
            <thead>
                <tr>
                    <th>Owner's Name</th>
                    <th>Contact No.</th>
                    <th>Address</th>
                    <th>Email Address</th>
                    <th> </th>
                </tr>
            </thead>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tbody>
                    <?php
                    $op = $row['ownersname'];
                    $cno = $row['contactno'];
                    $add = $row['address'];
                    $ea = $row['emailaddress'];
                    ?>
                    <tr>
                        <td><?php echo $op; ?></td>
                        <td><?php echo $cno; ?></td>
                        <td><?php echo $add; ?></td>
                        <td><?php echo $ea; ?></td>
                        <?php echo '
                                                <td>
                                                    <button class="modal-open showUpdateProfile" data-modal="modal6" value="' . $op . '" ><span class="material-symbols-sharp edit" title="Edit this account">edit</span></button>
                                                    <button class="modal-open showArchiveProfile" data-modal="modal9" value="' . $op . '"><span class="material-symbols-sharp archive" title="Archive the record">archive</span></button>
                                                </td>';   ?>
                    </tr>
                </tbody>
            <?php
            }
            ?>
        </table>

    <?php

    } else {
        echo "<h2 style='text-align: center'>No results found</h2>";
    }
}


// SEARCH TABLE FOR CUSTOMERS MODULE OWNERSNAME
if (isset($_POST['queryrestoreowner'])) {
    $queryrestoreowner = $_POST['queryrestoreowner'];

    $sql = "SELECT * FROM tblownersprofile WHERE archive = 'true' AND ownersname LIKE '%" . $queryrestoreowner . "%' ORDER BY cusid desc";
    $result = mysqli_query($conn, $sql);

    // display the results in tables
    if (mysqli_num_rows($result) > 0) {
    ?>
        <table class="content-table table-fixed">
            <thead>
                <tr>
                    <th>Owner's Name</th>
                    <th>Contact No.</th>
                    <th>Address</th>
                    <th>Email Address</th>
                    <th> </th>
                </tr>
            </thead>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tbody>
                    <?php
                    $op = $row['ownersname'];
                    $cno = $row['contactno'];
                    $add = $row['address'];
                    $ea = $row['emailaddress'];
                    ?>
                    <tr>
                        <td><?php echo $op; ?></td>
                        <td><?php echo $cno; ?></td>
                        <td><?php echo $add; ?></td>
                        <td><?php echo $ea; ?></td>
                        <?php echo '
                            <td>
                            <button class="modal-open showRestoreProfile" data-modal="modal7" value="' . $op . '" ><span class="material-symbols-sharp restore" title="Restore this account">unarchive</span></button>
                            </td>';   ?>
                    </tr>
                </tbody>
            <?php
            }
            ?>
        </table>

    <?php

    } else {
        echo "<h2 style='text-align: center'>No results found</h2>";
    }
}



// SEARCH TABLE FOR TRANSACTION MODULE SELECT PROFILE
if (isset($_POST['queryselectprofile'])) {
    $queryselectprofile = $_POST['queryselectprofile'];

    $sql = "SELECT * FROM tblownersprofile WHERE archive = 'false' AND ownersname LIKE '%" . $queryselectprofile . "%' ORDER BY cusid desc";
    $result = mysqli_query($conn, $sql);

    // display the results in tables
    if (mysqli_num_rows($result) > 0) {
    ?>
        <table class="content-table table-fixed">
            <thead>
                <tr>
                    <th>Owner's Name</th>
                    <th>Contact No.</th>
                    <th>Address</th>
                    <th>Email Address</th>
                    <th> </th>
                </tr>
            </thead>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tbody>
                    <?php
                    $op = $row['ownersname'];
                    $cno = $row['contactno'];
                    $add = $row['address'];
                    $ea = $row['emailaddress'];
                    ?>
                    <tr>
                        <td><?php echo $op; ?></td>
                        <td><?php echo $cno; ?></td>
                        <td><?php echo $add; ?></td>
                        <td><?php echo $ea; ?></td>
                        <?php echo '
                        <td>
                            <button name="selectprofile" data-modal="modal2" class="modal-open showSelectProfile" value="' . $op . '"><span class="material-symbols-sharp archive">done</span></button>
                        </td>';   ?>
                    </tr>
                </tbody>
            <?php
            }
            ?>
        </table>

    <?php

    } else {
        echo "<h2 style='text-align: center'>No results found</h2>";
    }
}

// SEARCH TABLE FOR TRANSACTION MODULE SELECT PRODUCT
if (isset($_POST['queryselectproduct'])) {
    $queryselectproduct = $_POST['queryselectproduct'];

    $sql = "SELECT * FROM tblstock WHERE archive = 'false' AND prodname LIKE '%" . $queryselectproduct . "%' ORDER BY proid desc";
    $result = mysqli_query($conn, $sql);

    // display the results in tables
    if (mysqli_num_rows($result) > 0) {
    ?>
        <table class="content-table table-fixed">
            <thead>
                <tr>
                    <th>ProductID</th>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th> </th>
                </tr>
            </thead>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tbody>
                    <?php
                    $pid = $row['proid'];
                    $pname = $row['prodname'];
                    $cat = $row['category'];
                    $desc = $row['description'];
                    $prc = $row['price'];
                    $qty = $row['quantity'];
                    ?>
                    <tr>
                        <td><?php echo $pid; ?></td>
                        <td><?php echo $pname; ?></td>
                        <td><?php echo $cat; ?></td>
                        <td><?php echo $desc; ?></td>
                        <td><?php echo $prc; ?></td>
                        <td><?php echo $qty; ?></td>
                        <?php echo '
                                <td>
                                <button name="selectprofile" data-modal="modal6" class="modal-open showSelectProduct" value="' . $pid . '"><span class="material-symbols-sharp archive">done</span></button>
                                </td>';  ?>
                    </tr>

                </tbody>
            <?php
            }
            ?>
        </table>

    <?php

    } else {
        echo "<h2 style='text-align: center'>No results found</h2>";
    }
}


// SEARCH TABLE FOR TRANSACTION MODULE TRANSACTION HISTORY
if (isset($_POST['querytransaction'])) {
    $querytransaction = $_POST['querytransaction'];

    $sql = "SELECT * FROM tbltransaction WHERE ownersname LIKE '%" . $querytransaction . "%' ORDER BY transactionid desc";
    $result = mysqli_query($conn, $sql);

    // display the results in tables
    if (mysqli_num_rows($result) > 0) {
    ?>
        <table class="content-table table-fixed">
            <thead>
                <tr>
                    <th>Transaction ID</th>
                    <th>Username</th>
                    <th>Owner's Name</th>
                    <th>Total Price</th>
                    <th>Date</th>
                    <th> </th>
                </tr>
            </thead>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tbody>
                    <?php
                    $tid = $row['transactionid'];
                    $un = $row['username'];
                    $op = $row['ownersname'];
                    $tprc = $row['totalprice'];
                    $date = $row['date'];
                    ?>
                    <tr>
                        <td><?php echo $tid; ?></td>
                        <td><?php echo $un; ?></td>
                        <td><?php echo $op; ?></td>
                        <td><?php echo number_format($tprc, 2); ?></td>
                        <td><?php echo $date; ?></td>
                        <?php echo '
                        <td>
                            <button name="printreceipt" data-modal="modal9" class="modal-open showPrintReceipt" value="' . $tid . '"><span class="material-symbols-sharp print">print</span></button>
                        </td>';   ?>
                    </tr>
                </tbody>
            <?php
            }
            ?>
        </table>

    <?php

    } else {
        echo "<h2 style='text-align: center'>No results found</h2>";
    }
}



// SEARCH TABLE FOR TRANSACTION MODULE ADD TO CART
if (isset($_POST['queryaddtocart'])) {
    $queryaddtocart = $_POST['queryaddtocart'];

    $sql = "SELECT * FROM tblorder WHERE cart = 'Yes' AND prodname LIKE '%" . $queryaddtocart . "%' ORDER BY orderid desc";
    $result = mysqli_query($conn, $sql);

    // display the results in tables
    if (mysqli_num_rows($result) > 0) {
    ?>
        <table class="content-table table-fixed">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Category</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th> </th>
                </tr>
            </thead>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tbody>
                    <?php
                    $oid = $row['orderid'];
                    $cat = $row['category'];
                    $pname = $row['prodname'];
                    $prc = $row['price'];
                    $qty = $row['quantity'];
                    ?>
                    <tr>
                        <td><?php echo $oid; ?></td>
                        <td><?php echo $cat; ?></td>
                        <td><?php echo $pname; ?></td>
                        <td><?php echo number_format($prc, 2); ?></td>
                        <td><?php echo $qty; ?></td>
                        <?php echo '
                        <td>
                            <button class="modal-open showRemoveCart" data-modal="modal7" value="' . $oid . '" ><span class="material-symbols-sharp remove" title="Remove this product">delete</span></button>
                        </td>';   ?>
                    </tr>
                </tbody>
            <?php
            }
            ?>
        </table>

    <?php

    } else {
        echo "<h2 style='text-align: center'>No results found</h2>";
    }
}

// SEARCH TABLE FOR CUSTOMERS MODULE OWNERSNAME
if (isset($_POST['queryappointments'])) {
    $queryappointments = $_POST['queryappointments'];

    $sql = "SELECT * FROM tblappointments WHERE clientname LIKE '%" . $queryappointments . "%' ORDER BY queueno desc";
    $result = mysqli_query($conn, $sql);

    // display the results in tables
    if (mysqli_num_rows($result) > 0) {
    ?>
        <table class="content-table table-fixed">
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
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tbody>
                    <?php
                    $qno = $row['queueno'];
                    $cname = $row['clientname'];
                    $pname = $row['petname'];
                    $ser = $row['services'];
                    $dt = $row['dateandtime'];
                    ?>
                    <tr>
                        <td><?php echo $qno; ?></td>
                        <td><?php echo $cname; ?></td>
                        <td><?php echo $pname; ?></td>
                        <td><?php echo $ser; ?></td>
                        <td><?php echo $dt; ?></td>
                        <?php echo '
                                                <td>
                                                <button class="modal-open showUpdateAppointment" data-modal="modal1" value="' . $qno . '" ><span class="material-symbols-sharp remove" title="Delete this appointment">delete</span></button>
                                                </td>';   ?>
                    </tr>
                </tbody>
            <?php
            }
            ?>
        </table>

    <?php

    } else {
        echo "<h2 style='text-align: center'>No results found</h2>";
    }
}


// SEARCH TABLE FOR AUDIT TRAIL
if (isset($_POST['queryaudittrail'])) {
    $queryaudittrail = $_POST['queryaudittrail'];

    $sql = "SELECT * FROM tblaudittrail WHERE username LIKE '%" . $queryaudittrail . "%' ORDER BY atid desc";
    $result = mysqli_query($conn, $sql);

    // display the results in tables
    if (mysqli_num_rows($result) > 0) {
    ?>
        <table class="content-table table-fixed">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>DateTime</th>
                    <th>IP Address</th>
                    <th>Action Mode</th>
                </tr>
            </thead>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tbody>
                    <?php
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
                        </tr>';  ?>
                    </tr>
                </tbody>
            <?php
            }
            ?>
        </table>

<?php

    } else {
        echo "<h2 style='text-align: center'>No results found</h2>";
    }
}



// close the database connection
mysqli_close($conn);

include 'scriptingfiles.php';
?>
<script>
    // opening modals
    var modalBtns = document.querySelectorAll(".modal-open");

    modalBtns.forEach(function(btn) {
        btn.onclick = function() {
            var modal = btn.getAttribute("data-modal");

            document.getElementById(modal).style.display = "block";
        };
    });

    // close modals
    var closeBtns = document.querySelectorAll(".modal-close");

    closeBtns.forEach(function(btn) {
        btn.onclick = function() {
            var modal = (btn.closest(".modal").style.display = "none");
        };
    });

    // USERACCOUNT AJAX DOCUMENTS
    $(document).ready(function() {

        $(".showUpdateAccount").click(function() {
            var accountid = this.value;
            $("#edituserAccount").load("submit.php", {
                accountID: accountid
            })
        })
        $(".showArchiveAccount").click(function() {
            var archiveid = this.value;
            $("#archiveAccount").load("submit.php", {
                archiveID: archiveid
            })
        })
        $(".showRestoreAccount").click(function() {
            var restoreid = this.value;
            $("#restoreAccount").load("submit.php", {
                restoreID: restoreid
            })
        })
    })

    // STOCKS AND ADD STOCK AJAX DOCUMENTS
    $(document).ready(function() {

        $(".showUpdateProduct").click(function() {
            var productid = this.value;
            $("#updateProduct").load("submit.php", {
                productID: productid
            })
        })
        $(".showArchiveProduct").click(function() {
            var proarchiveid = this.value;
            $("#archiveProduct").load("submit.php", {
                proarchiveID: proarchiveid
            })
        })
        $(".showRestoreProduct").click(function() {
            var prorestoreid = this.value;
            $("#restoreProduct").load("submit.php", {
                prorestoreID: prorestoreid
            })
        })
    })

    // OWNERSNAME AJAX DOCUMENTS
    $(document).ready(function() {
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
    })



    // PET PROFILE AJAX DOCUMENTS







    // TRANSACTION AJAX DOCUMENTS
    $(document).ready(function() {
        // SELECT PROFILE DOCUMENT FORMS
        $(".showSelectProfile").click(function() {
            var selectprofileid = this.value;
            $("#selectProfile").load("submit.php", {
                selectprofileID: selectprofileid
            })
        })
        $(".showSelectProduct").click(function() {
            var selectproductid = this.value;
            $("#selectProduct").load("submit.php", {
                selectproductID: selectproductid
            })
        })
        $(".showRemoveCart").click(function() {
            var removecartid = this.value;
            $("#removeCart").load("submit.php", {
                removecartID: removecartid
            })
        })
    })
</script>