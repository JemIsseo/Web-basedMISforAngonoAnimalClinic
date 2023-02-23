
<?php 
    session_start();
    include 'connect.php';
    $s=mysqli_query($conn,"select * from tblusertype");
   
    if (isset($_POST['saveaccount']) && isset($_FILES['my_image']))  {
        $un = $_POST['username'];
        $pw = $_POST['password'];
        $cpw = $_POST['confirmpassword'];
        $ut = $_POST['usertype'];
        $ea = $_POST['email'];

        $img_name = $_FILES['my_image']['name'];
        $img_size = $_FILES['my_image']['size'];
        $tmp_name = $_FILES['my_image']['tmp_name'];
      
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);

                $allowed_exs = array("jpg", "jpeg", "png");

                if (in_array($img_ex_lc, $allowed_exs)) {
                    $img = uniqid("IMG-", true).'.'.$img_ex_lc;
                    $img_upload_path = 'uploads/'.$img;
                    move_uploaded_file($tmp_name,  $img_upload_path);

                    $sqls = "Select * from tbluseraccount where username = '$un'"; 
                                    $result = mysqli_query($conn, $sqls);
                                    
                                    if ($result) {
                                        $num= mysqli_num_rows($result);
                                        if ($num > 0) { ?> 
                                            <div class="statusmessageerror" id="close">
                                            <h2>Sorry username already exist!</h2>
                                            <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                                            </div>
                                        <?php   
                                        } else {
                                            if ($pw === $cpw) {
                                                   // Insert into database
                                                    $sql = "insert into tbluseraccount(username,password,usertype,email,image) 
                                                    values('$un','$pw','$ut','$ea','$img')";
                                                    $res = mysqli_query($conn, $sql);
                                                        if ($res) { 
                                                            ?>
                                                            <div class="statusmessagesuccess" id="close">
                                                            <h2>Account Added Successfully!</h2>
                                                            <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                                                            </div> <?php
                                                            }
                                            } else { ?>
                                                <div class="statusmessageerror" id="close">
                                                <h2>Password didn't matched!</h2>
                                                <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                                                </div> <?php
                                            }
                                         
                                        }
                                    } 
                }
            }
   
            
             // upload photo statement 
    if(isset($_POST['uploadphoto']) && isset($_FILES['image']) ){
    $un = $_POST['username'];

    $img_name = $_FILES['image']['name'];
    $img_size = $_FILES['image']['size'];
    $tmp_name = $_FILES['image']['tmp_name'];
  
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png");

            if (in_array($img_ex_lc, $allowed_exs)) {
                $img = uniqid("IMG-", true).'.'.$img_ex_lc;
                $img_upload_path = 'uploads/'.$img;
                move_uploaded_file($tmp_name,  $img_upload_path);

                $sql = "update tbluseraccount set image='$img' 
                        where username= '$un'";
                $res = mysqli_query($conn,$sql);
                if($res) {?>  
                    <div class="statusmessagesuccess" id="close">
                        <h2>Upload Photo Completed!</h2>
                        <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                    </div>
        
    <?php  
                } 
            } else {
                die(mysqli_error($conn));
                }
            }
             // account update statement 
            if(isset($_POST['updateaccount'])){
                $un = $_POST['username'];
                $pw = $_POST['password'];
                $ut = $_POST['usertype'];
                $ea = $_POST['email'];
        
                $sql = "update tbluseraccount set password ='$pw',
                        usertype ='$ut', email='$ea' 
                        where username= '$un'";
                $res = mysqli_query($conn,$sql);
                if($res) {?>  
                    <div class="statusmessagesuccess" id="close">
                        <h2>Account Updated Successfully!</h2>
                        <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                    </div>
                    
                <?php  
                } 
                else {
                    die(mysqli_error($conn));
                }
            }


           // ARCHIVE STATEMENT
           if (isset($_POST['savearchiveaccount']))  {
            $un = $_POST['username'];
            $pw = $_POST['password'];
            $ut = $_POST['usertype'];
            $ea = $_POST['email'];
    
                         // Insert into database
                          $sql = "insert into tblarcuseraccount(username,password,usertype,email) 
                          values('$un','$pw','$ut','$ea')";
                          $res = mysqli_query($conn, $sql);
                              if ($res) { 
                                  if ($un = $_POST['username']) {
                                    $sql = "delete from tbluseraccount where username = '$un'";
                                    $res = mysqli_query($conn, $sql);
                                  }
                                  ?>
                                  <div class="statusmessagesuccesslight" id="close">
                                  <h2>Account Archive Successfully!</h2>
                                  <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                                  </div> <?php
                                  }
                                             
                }

            // RESTORE STATEMENT
            
           if (isset($_POST['saverestoreaccount']))  {
            $un = $_POST['username'];
            $pw = $_POST['password'];
            $ut = $_POST['usertype'];
            $ea = $_POST['email'];
    
                         // Insert into database
                          $sql = "insert into tbluseraccount(username,password,usertype,email) 
                          values('$un','$pw','$ut','$ea')";
                          $res = mysqli_query($conn, $sql);
                              if ($res) { 
                                  if ($un = $_POST['username']) {
                                    $sql = "delete from tblarcuseraccount where username = '$un'";
                                    $res = mysqli_query($conn, $sql);
                                  }
                                  ?>
                                  <div class="statusmessagesuccess" id="close">
                                  <h2>Account Restored Successfully!</h2>
                                  <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                                  </div> <?php
                                  }
                                             
                }

            





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Account</title>
    <!-- Materical Icons Link -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" 
    integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" 
    crossorigin="anonymous">
    <!-- Stylesheet  -->
    <link rel="stylesheet" href="../css/useraccount.css">
    <link rel="shortcut icon" type="image/x-icon" href="../images/aac.jpg"/>
</head>
<body>
    <div class="container">
        
        <?php  include 'aside.php'; ?>
        <!--  Main Tag  -->
        <main>
            <section class="tableaccountrecords">
                <div class="accrecsearch">
                    <h1>Account Records</h1>
                    <div class="searchbar">
                        <input type="text" placeholder="Search here"  onkeyup="searchUserAcc(this.value)"><span class="material-symbols-sharp">search</span>
                    </div>
                </div>
                <div class="accountrecordsbg">
                    <div class="accountrecords" id="userAccount">
                        <table class="content-table table-fixed">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Usertype</th>
                                    <th>Email Address</th>
                                    <th>Image</th>
                                    <th>       </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                    $sql = "Select * from tbluseraccount";
                                    $res= mysqli_query($conn,$sql);

                                    if($res){
                                    while($row=mysqli_fetch_assoc($res)){
                                    $un=$row['username'];
                                    $pw=$row['password'];
                                    $ut=$row['usertype'];
                                    $ea=$row['email']; 
                                    $img=$row['image'];
                     ?>  
                                    <tr>
                                    <td><?php echo $un; ?></td>
                                    <td><?php echo $pw; ?></td>
                                    <td><?php echo $ut; ?></td>
                                    <td><?php echo $ea; ?></td>
                                    <td>
                                    <div class="profile-photo">
                                            <img src="uploads/<?php echo $img;?>">
                                    </div>
                                    </td>
                                    <?php echo '
                                    <td>
                                        <button class="modal-open showUpdateAccount" data-modal="modal1" value="'.$un.'" ><span class="material-symbols-sharp edit" title="Edit this account">edit</span></button>
                                        <button class="modal-open showArchiveAccount" data-modal="modal2" value="'.$un.'"><span class="material-symbols-sharp archive" title="Archive the record">archive</span></button>
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

            <!--  End of table useraccount   -->
            <section class="tableaccountrecords">
                <h1>Create An Account</h1>
                <div class="accountrecordsbg">
                    <div class="accountrecords ">
                        <form action="" method="POST" enctype="multipart/form-data" >
                            <div class="profilepicture">
                                <span class="material-symbols-sharp">account_circle</span><br><br>
                                <input type="file" name="my_image" title="Insert photo..." required>
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
                                    <option value="">Choose</option>
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
                                <button class="cancel" title="Clear all inputs" onclick="clearBtnUserAccount()">Clear</button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
            <!--  End of Create Profile  -->
        </main>
        <!--  End of Main Tag  -->

        <?php  include 'systemaccountanddate.php'; ?>
        <!--  Start of Retrieve section  -->
        <h1>Retrieve Account</h1>
            <div class="buttonmodify">
                <button class="modal-open" data-modal="modal4" title="View and Restore Account"><span class="material-symbols-sharp">table_view</span>View Archive</button> 
            </div>
        <!-- Start of Modal --> 

        <!-- Modal of Edit Account -->
        <div class="modal" id="modal1">
            <div class="modal-content">
                <h1>Edit Account</h1>
                <div class="modal-header"> 
                    <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                </div>
                <div class="modal-body" id="updateAccount">         
                </div>
            </div>
        </div>
        
        <!-- Modal of Archive Account MessageBox -->
        <div class="modal" id="modal2">
            <div class="modal-content">
                <div class="modal-header"><h1>Archive Account</h1>
                    <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                </div>
                <div class="modal-body" id="archiveAccount">
                </div>
            </div>
        </div>
         <!-- Modal of Restore Account MessageBox -->
         <div class="modal" id="modal3">
            <div class="modal-content">
                <div class="modal-header"><h1>Unarchive Account</h1>
                    <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                </div>
                <div class="modal-body" id="restoreAccount">
                </div>

            </div>
        </div>
        <!-- Modal of Restore Account -->
        <div class="modal" id="modal4">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Restore Account</h1>
                    <div class="accrecsearch">
                        <div class="searchbar">
                            <input type="text" placeholder="Search here"><span class="material-symbols-sharp">search</span>
                         <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                        </div>
                    </div>
                </div> 
                
                   <!-- Display Archive Account Records -->
                    <div class="modal-body">
                    <section class="tableaccountrecords">
                    <div class="accountrecordsbg">
                        <div class="accountrecords">
                        <table class="content-table table-fixed">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Usertype</th>
                                    <th>Email Address</th>
                                    <th>Image</th>
                                    <th>       </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                    $sql = "Select * from tblarcuseraccount";
                                    $res= mysqli_query($conn,$sql);

                                    if($res){
                                    while($row=mysqli_fetch_assoc($res)){
                                        $un=$row['username'];
                                        $pw=$row['password'];
                                        $ut=$row['usertype'];
                                        $ea=$row['email']; 
                                
                                
                     ?>  
                                    <tr>
                                    <td><?= $un; ?></td>
                                    <td><?= $pw; ?></td>
                                    <td><?= $ut; ?></td>
                                    <td><?= $ea; ?></td>
                                    <td>
                                   
                                    </td>
                                    <?php echo '
                                    <td>
                                        <button class="modal-open showRestoreAccount" data-modal="modal3" value="'.$un.'"><span class="material-symbols-sharp restore" title="Restore this account">unarchive</span></button>
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
                    <div class="modal-footer">
                        <div class="buttonflex">
                            <button class="cancel modal-close" title="Cancel">Cancel</button>
                        </div>
                    </div>
            </div>
        </div>
       
      
    </div>
  
    <?php include 'scriptingfiles.php';?>
    <script>
           $(document).ready(function() {
             // USERACCOUNT DOCUMENT FORMS
            $(".showUpdateAccount").click(function() {
                var accountid = this.value;
                $("#updateAccount").load("submit.php", {
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

    </script>
</body>
</html>



