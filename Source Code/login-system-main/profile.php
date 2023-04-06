    <?php 
        session_start();
        include 'connect.php'; 

        $s=mysqli_query($conn,"select * from tblownersprofile");
        $p=mysqli_query($conn,"select * from tblpettype");
        $b=mysqli_query($conn,"select * from tblbreed");

        // Save Owners Name Profile
        if(isset($_POST['saveownersprofile'])){
        $op = $_POST['ownersprofile'];
        $cn = $_POST['contactno'];
        $add = $_POST['address'];
        $emailadd = $_POST['emailaddress'];

                            $sqls = "Select * from tblownersprofile where ownersname = '$op'"; 
                            $result = mysqli_query($conn, $sqls);
                            
                            if ($result) {
                                $num= mysqli_num_rows($result);
                                if ($num > 0) { ?> 
                                    <div class="statusmessageerror message-box" id="close">
                                    <h2>Sorry owner's name <?php echo $op;?> already exist!</h2>
                                    <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                                    </div>
                                <?php   
                                } else {
                                        // Insert into database
                                        $sql = "insert into tblownersprofile(ownersname, contactno, address, emailaddress) 
                                        values('$op',' $cn',' $add','$emailadd')";
                                $res = mysqli_query($conn,$sql);
                                if($res) { ?>
                                        <div class="statusmessagesuccess message-box" id="close">
                                                <h2>Owner Profile Added Successfully!</h2>
                                                <button class="icon"><span class="material-symbols-sharp">close</span></button>
                                        </div>
                                        <?php
                                            }
                                } 
                            }

                    }

        // archive statement
        if(isset($_POST['savearchiveprofile'])){
            $pname = $_POST['petname'];
            $age = $_POST['age'];
            $sex = $_POST['sex'];
            $weight = $_POST['weight'];
            $owner = $_POST['owner'];
            $phone = $_POST['phone']; 
            $email = $_POST['email'];
            
            $sql = "insert into tblarcprofile(petname, age, sex, weight, owner, phone, email) 
                    values('$pname','$age','$sex','$weight','$owner','$phone','$email')";
            $res = mysqli_query($conn,$sql);
            if($res) {
                if ($proid = $_POST['profileid']) {
                    $sql = "delete from tblprofile where profileid= $proid";
                    $res = mysqli_query($conn, $sql);
                }
                ?>  
                <div class="statusmessagesuccess message-box" id="close">
                    <h2>Profile has been archived</h2>
                    <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                </div>
                
            <?php  
            } else {
                die(mysqli_error($conn));
            }
        }

        // restore statement
        if(isset($_POST['saverestoreprofile'])){
            $pname = $_POST['petname'];
            $age = $_POST['age'];
            $sex = $_POST['sex'];
            $weight = $_POST['weight'];
            $owner = $_POST['owner'];
            $phone = $_POST['phone']; 
            $email = $_POST['email'];
            
            $sql = "insert into tblprofile(petname, age, sex, weight, ownername, phone, email) 
                    values('$pname','$age','$sex','$weight','$owner','$phone','$email')";
            $res = mysqli_query($conn,$sql);
            if($res) {
                if ($proid = $_POST['profileid']) {
                    $sql = "delete from tblarcprofile where profileid= $proid";
                    $res = mysqli_query($conn, $sql);
                    ?>  
                <div class="statusmessagesuccess message-box" id="close">
                    <h2>Profile has been restored!</h2>
                    <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                </div>
                
            <?php  
                }
            } 
            else {
                die(mysqli_error($conn));
            }
        }

        // Save Pet Profile
        if(isset($_POST['savepetprofile'])){
           
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

                    // Insert into database
            $sql = "insert into tblpet(cusid, ownersname, petname, pettype, age, sex, breed, weight) 
            values('$cusid','$op','$pname','$ptype','$age','$sex','$breed','$weight')";
            $res = mysqli_query($conn,$sql);
            if($res) { ?>
                    <div class="statusmessagesuccess message-box" id="close">
                        <h2>Pet Profile Added Successfully!</h2>
                        <button class="icon"><span class="material-symbols-sharp">close</span></button>
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
        <title>Customer</title>
        <!-- Materical Icons Link -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
        <!-- Stylesheet  -->
        <link rel="stylesheet" href="../css/profile.css">
        <link rel="shortcut icon" type="image/x-icon" href="../images/aac.jpg"/>
    </head>
    <body>
        <div class="container">
            <?php  include 'aside.php'; ?>    

            <!--  Main Tag  -->
            <main>   
            <h1>Customers</h1>     
            <section class="table-profile">
            <div class="allbuttons">
                <div class="buttons">
                    <div class="buttonmodify">
                        <button class="modal-open" data-modal="modal1" title="Owner's Profile"><img src="../images/ownersprofile.jpg" alt=""></button> 
                        <h2>Owner's Profile</h2>
                    </div>
                </div>
                <div class="buttons">
                    <div class="buttonmodify">
                        <button class="modal-open" data-modal="modal2" title="Pet Medical History"><img src="../images/medicalhistory.png"></button> 
                        <h2>Pet Medical History</h2>
                    </div>
                </div>
                <div class="buttons">
                    <div class="buttonmodify">
                        <button class="modal-open" data-modal="modal3" title="Pet Profile"><img src="../images/petprofile.jpg"></button> 
                        <h2>Pet Profile</h2>
                    </div>
                </div>
                <div class="buttons">
                    <div class="buttonmodify">
                    <button class="modal-open" data-modal="modal4" title="Pet Registration"><img src="../images/petregistration.png"></button> 
                        <h2>Pet Registration</h2>
                    </div>
                </div>
            </div>
            </section>
            
                <!--  End of profile   -->
            </main>

            <!--  End of Main Tag  -->
            <?php   include 'systemaccountanddate.php'; ?>
            <!--  Start of Retrieve section  -->
            <h1>Retrieve Record</h1>
            <div class="buttons">
                <div class="buttonmodify">
                    <button class="modal-open" data-modal="modal4" title="View Owners Archive"><span class="material-symbols-sharp">table_view</span>View Archive Owner</button> 
                </div>
            </div>
            <div class="buttons">
                <div class="buttonmodify">
                    <button class="modal-open" data-modal="modal4" title="View and Restore Pet"><span class="material-symbols-sharp">table_view</span>View Archive Pet</button> 
                </div>
            </div>
            <!-- Start of Modal --> 
        
    <!-- Modal of Owners Profile -->
    <div class="modal" id="modal1">
                <div class="modal-content">
                    <div class="modal-header"><h1>Owners Profile</h1>
                        <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                    </div>
                    <div class="modal-body">
                    
                            <form action="" method="POST" >
                                <div class="searchbar">
                                <input type="text" placeholder="Search here"  onkeyup="searchProfile(this.value)"><span class="material-symbols-sharp">search</span>
                                </div>
                            <div class="table-profile-sample">
                            <table class="content-table table-archive">
                                <thead>
                                    <tr>
                                        <th>Owner's Name</th>
                                        <th>Contact No.</th>
                                        <th>Address</th>
                                        <th>Email Address</th>
                                        <th>         </th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                        $sql = "Select * from tblownersprofile order by ownersname";
                                        $res= mysqli_query($conn,$sql);

                                        if($res){
                                        while($row=mysqli_fetch_assoc($res)){
                                        $op=$row['ownersname'];
                                        $cn=$row['contactno'];
                                        $add=$row['address'];
                                        $emailadd=$row['emailaddress']; 
                                        echo '<tr>
                                        <td>'.$op.'</td>
                                        <td>'.$cn.'</td>
                                        <td>'.$add.'</td>
                                        <td>'.$emailadd.'</td>
                                        <td>
                                        <button class="modal-open showUpdateProfile" data-modal="modal1" value="'.$op.'" ><span class="material-symbols-sharp edit" title="Edit this account">edit</span></button>
                                        <button class="modal-open showArchiveProfile" data-modal="modal2" value="'.$op.'"><span class="material-symbols-sharp archive" title="Archive the record">archive</span></button>
                                        </td>
                                        </tr>';
                                    }
                                } 
                                ?>
                                </tbody>
                            </table>
                            </div>
                            <div class="formprofile formmodify">
                                    <div> 
                                        <input type="text" name="ownersprofile" placeholder="Enter Name" required>
                                        <span>Owner's Name</span>
                                    </div>
                                    <div> 
                                        <input type="text" name="contactno" placeholder="Enter Phone Number" required>
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
                                        <button class="cancel" title="Clear all inputs" onclick="clearBtnOwnersProfile()">Clear</button>
                                    </div>
                            </form>

                    </div>

                </div>

                <!-- TABLE OF OWNERS  -->
                
    </div>

    <!-- Modal of Pet Profile MessageBox -->
    <div class="modal" id="modal2">
                <div class="modal-content">
                    <div class="modal-header"><h1>Pet Medical History</h1>
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
                                <input type="text" placeholder="Search here"  onkeyup="searchProfile(this.value)"><span class="material-symbols-sharp">search</span>
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
                                        <th>         </th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                        $sql = "Select * from tblappointments order by dateandtime desc";
                                        $res= mysqli_query($conn,$sql);

                                        if($res){
                                        while($row=mysqli_fetch_assoc($res)){
                                        $medhisno=$row['queueno'];
                                        $cname=$row['clientname'];
                                        $pname=$row['petname'];
                                        $services=$row['services'];
                                        $dnt=$row['dateandtime']; 
                                        echo '<tr>
                                        <td>'.$medhisno.'</td>
                                        <td>'.$cname.'</td>
                                        <td>'.$pname.'</td>
                                        <td>'.$services.'</td>
                                        <td>'.$dnt.'</td>
                                        <td>
                                        <button class="modal-open showUpdateProfile" data-modal="modal1" value="'.$medhisno.'" ><span class="material-symbols-sharp edit" title="Edit this account">edit</span></button>
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
                            <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                            </div> 
                        </div>
                    </div> 
                    <?php 
                        $s=mysqli_query($conn,"select * from tblownersprofile");
                        $p=mysqli_query($conn,"select * from tblpettype");
                        $b=mysqli_query($conn,"select * from tblbreed");
                    ?>
                    <div class="modal-body" id="viewArchive" >
                        <div class="table-profile-sample">
                    <!-- PASTE REGISTRATION FORM HERE -->
                    <form action="" method="POST" >
                                <div class="formprofile">
                                    <div> 
                                        <select class="radiobtn" name="ownersname" id="ut"> 
                                                <option value="">Select Owner's Name</option>
                                        <?php
                                                while ($r = mysqli_fetch_array($s)) {
                                        ?>
                                                <option value="<?php echo $r['ownersname']; ?>"><?php echo $r['ownersname']; ?> </option>
                                                <?php
                                                    }
                                                ?>
                                        </select>
                                        <span>Ownersname</span>
                                    </div>  
                                    
                                    <div> 
                                        <input type="text" name="petname" placeholder="Enter Pet Name" required>
                                        <span>Pet Name</span>
                                    </div>
                                    <div> 
                                        <select class="radiobtn" name="sex" id="ut" required> 
                                                <option value="">Select Sex</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                        </select> <span>Sex</span>
                                    </div>
                                    <div> 
                                        <select class="radiobtn" name="pettype" id="pettypeid" required> 
                                                <option value="">Select Pet Type</option>
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
                                        <input type="text" name="age" placeholder="Enter Age" required>
                                        <span>Age</span>
                                    </div>
                                    <div> 
                                        <input type="text" name="weight" placeholder="Enter Weight" required>
                                        <span>Weight</span>
                                    </div>
                                </div>
                                    <div class="buttonflexright">
                                        <button name="savepetprofile" type="submit" class="yes" title="Add record">Add</button>
                                        <button class="cancel" title="Clear all inputs" onclick="clearBtnPetProfile()">Cancel</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>

    <!-- Modal of Owners Profile -->
    <div class="modal" id="modal3">
                <div class="modal-content">
                    <div class="modal-header"><h1>Pet Profile</h1>
                        <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <div class="searchbar">
                                <input type="text" placeholder="Search here"  onkeyup="searchProfile(this.value)"><span class="material-symbols-sharp">search</span>
                            </div>
                            <div class="table-profile-sample">
                            <table class="content-table table-archive">
                                <thead>
                                    <tr>
                                        <th>Owner's Name</th>
                                        <th>Pet Name</th>
                                        <th>Pet Type</th>
                                        <th>Age</th>
                                        <th>Sex</th>
                                        <th>Breed</th>
                                        <th>Weight</th>
                                        <th>         </th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                        $sql = "Select * from tblpet order by petname";
                                        $res= mysqli_query($conn,$sql);

                                        if($res){
                                        while($row=mysqli_fetch_assoc($res)){
                                        $pid=$row['petid'];
                                        $op=$row['ownersname'];
                                        $pname=$row['petname'];
                                        $pt=$row['pettype'];
                                        $age=$row['age']; 
                                        $sex=$row['sex'];
                                        $breed=$row['breed'];
                                        $weight=$row['weight']; 
                                        echo '<tr>
                                        <td>'.$op.'</td>
                                        <td>'.$pname.'</td>
                                        <td>'.$pt.'</td>
                                        <td>'.$age.'</td>
                                        <td>'.$sex.'</td>
                                        <td>'.$breed.'</td>
                                        <td>'.$weight.'</td>
                                        <td>
                                        <button class="modal-open showUpdateProfile" data-modal="modal1" value="'.$pid.'" ><span class="material-symbols-sharp edit" title="Edit this account">edit</span></button>
                                        <button class="modal-open showArchiveProfile" data-modal="modal2" value="'.$pid.'"><span class="material-symbols-sharp archive" title="Archive the record">archive</span></button>
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




                    
        <!-- Modal of Restore Profile MessageBox -->
        <div class="modal" id="modal5">
                <div class="modal-content">
                    <div class="modal-header"><h1>Unarchive Profile</h1>
                        <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                    </div>
                    <div class="modal-body" id="restoreProfile">     
                    </div>
                </div>
        </div>
        <?php include 'scriptingfiles.php'; ?>
        <script>
        $(document).ready(function() {
        $("#pettypeid").on('click', function() {
        var pettypeid = $(this).val();
        if (pettypeid) {
            $.ajax({
            type: 'POST',
            url: 'submit.php',
            data: 'pettypeid=' + pettypeid,
            success: function(html) {
                $("#bid").html(html);
                }
                });
            }
            });
        });
        </script>
    </body>
    </html>

