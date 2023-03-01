<?php 
    include 'connect.php';

     // Save Usertype 
     if(isset($_POST['saveusertype'])){
        $ut = $_POST['usertype'];
                            
        // Insert into database
        $sql = "insert into tblusertype(usertype) 
        values('$ut')";
         $res = mysqli_query($conn,$sql);
         if($res) { 
                ?>
                <div class="statusmessagesuccess" id="close">
                    <h2>Usertype Added Successfully!</h2>
                     <button class="icon"><span class="material-symbols-sharp">close</span></button>
                </div>
                 <?php
                     }
                                
                            
    
                    }


    // Usertype Update Statement
    if(isset($_POST['updateusertype'])){
        $utid = $_POST['utid'];
        $ut = $_POST['usertype'];

        $sql = "update tblusertype set usertype ='$ut' 
                where utid= $utid";
        $res = mysqli_query($conn,$sql);
        if($res) {?>  
            <div class="statusmessagesuccess" id="close">
                <h2>Usertype Updated Successfully!</h2>
                <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
            </div>
            
        <?php  
        } 
        else {
            die(mysqli_error($conn));
        }
    }

    //   // usertype remove statement
    //   if(isset($_POST['removeusertype'])){
    //     $rutid = $_POST['rutid'];
            
    //             $sql = "delete from tblusertype where utid = '$rutid'";
    //             $res = mysqli_query($conn, $sql);
    //         ?>  
           <!-- <div class="statusmessageerror" id="close">
               <h2>Usertype has been removed</h2>
               <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
           </div>
             -->
       <?php  
    //     } else {
    //         die(mysqli_error($conn));
        
    // }

  
         // Save Pettype
     if(isset($_POST['savepettype'])){
        $pt = $_POST['pettype'];
                            
        // Insert into database
        $sql = "insert into tblpettype(pettype) 
        values('$pt')";
         $res = mysqli_query($conn,$sql);
         if($res) { 
                ?>
                <div class="statusmessagesuccess" id="close">
                    <h2>Pettype Added Successfully!</h2>
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
    <title>Settings</title>
    <!-- Materical Icons Link -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!-- Stylesheet  -->
    <link rel="stylesheet" href="../css/settings.css">
    <link rel="shortcut icon" type="image/x-icon" href="../images/aac.jpg"/>
</head>
<body>
    <div class="container">
        <?php  include 'aside.php'; ?>    

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
        <?php   include 'systemaccountanddate.php'; ?>
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
                    <div class="modal-header"><h1>Pet Type</h1>
                        <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                    </div>
                    <div class="modal-body">
                <form action="" method="POST">
                    <div class="formusertype">
                        <div>
                            <input type="text" name="pettype" placeholder="Add New Pet Type" required>
                            <span>Usertype</span>
                        </div>
                        <div class="buttonflex">
                            <button name="savepettype" type="submit" class="save" title="Update usertype">Save</button>
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
                                    <th>       </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $sql = "Select * from tblpettype";
                                $res= mysqli_query($conn,$sql);

                                if($res){
                                while($row=mysqli_fetch_assoc($res)){
                                $petid=$row['petid'];
                                $pt=$row['pettype'];
                            ?>  
                                <tr>
                                <td><?php echo $petid; ?></td>
                                <td><?php echo $pt; ?></td>
                                <?php echo '
                                <td>
                                    <button class="modal-open showUpdateUsertype" data-modal="modal7" value="'.$petid.'" ><span class="material-symbols-sharp edit" title="Edit this account">edit</span></button>
                                    <button class="modal-open showRemoveUsertype" data-modal="modal8" value="'.$petid.'"><span class="material-symbols-sharp remove" title="Remove the record">delete</span></button>
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
           <div class="modal" id="modal3">
                <div class="modal-content">
                    <div class="modal-header"><h1>Add Breed</h1>
                        <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                    </div>
                    <div class="modal-body">
                    <form action="" method="POST">
                            <div class="formbreed">
                                <div>
                                    <input type="text" name="breed" placeholder="Add New Breed" required>
                                    <span>Breed</span>
                                </div>
                                <div class="buttonflex">
                                    <button name="savebreed" type="submit" class="save" title="Update breed">Save</button>
                                    <button class="cancel modal-close" title="Cancel">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

          <!-- Modal of Product Category -->
          <div class="modal" id="modal4">
                <div class="modal-content">
                    <div class="modal-header"><h1>Product Category</h1>
                        <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                    </div>
                    <div class="modal-body">
                    <form action="" method="POST">
                            <div class="formproductcat">
                                <div>
                                    <input type="text" name="productcat" placeholder="Add New Product Category" required>
                                    <span>Product Category</span>
                                </div>
                                <div class="buttonflex">
                                    <button name="saveproductcat" type="submit" class="save" title="Update productcat">Save</button>
                                    <button class="cancel modal-close" title="Cancel">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


          <!-- Modal of Services -->
          <div class="modal" id="modal5">
                <div class="modal-content">
                    <div class="modal-header"><h1>Services</h1>
                        <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                    </div>
                    <div class="modal-body">
                    <form action="" method="POST">
                            <div class="formservices">
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
                    </div>
                </div>
            </div>

         <!-- Modal of Charges and Fees -->
         <div class="modal" id="modal6">
                <div class="modal-content">
                    <div class="modal-header"><h1>Charges and Fees</h1>
                        <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                    </div>
                    <div class="modal-body">
                    <form action="" method="POST">
                            <div class="formchargesandfees">
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
            <!-- FORM OF UPDATE USERTYPE -->
            <div class="modal" id="modal7">
                <div class="modal-content">
                    <div class="modal-header"><h1>Edit Usertype</h1>
                        <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                    </div>
                    <div class="modal-body" id="updateUsertype">
                    
                    </div>
                </div>
            </div>

            <!-- FORM OF REMOVE USERTYPE -->
            <div class="modal" id="modal8">
                <div class="modal-content">
                    <div class="modal-header"><h1>Remove Usertype</h1>
                        <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                    </div>
                    <div class="modal-body" id="removeUsertype">
                    
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

                            <div class="formusertype">
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
                                            <th>       </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                            $sql = "Select * from tblusertype";
                                            $res= mysqli_query($conn,$sql);

                                            if($res){
                                            while($row=mysqli_fetch_assoc($res)){
                                            $utid=$row['utid'];
                                            $ut=$row['usertype'];
                            ?>  
                                            <tr>
                                            <td><?php echo $utid; ?></td>
                                            <td><?php echo $ut; ?></td>
                                            <?php echo '
                                            <td>
                                                <button class="modal-open showUpdateUsertype" data-modal="modal7" value="'.$utid.'" ><span class="material-symbols-sharp edit" title="Edit this account">edit</span></button>
                                                <button class="modal-open showRemoveUsertype" data-modal="modal8" value="'.$utid.'"><span class="material-symbols-sharp remove" title="Remove the record">delete</span></button>
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


        <!-- Modal of Usertype -->
        <div class="modal" id="modal1">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Usertype</h1>
                    <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                </div> 

                <div class="modal-body">
                        <form action="" method="POST">

                            <div class="formusertype">
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
                                        <th>       </th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                        $sql = "Select * from tblusertype";
                                        $res= mysqli_query($conn,$sql);

                                        if($res){
                                        while($row=mysqli_fetch_assoc($res)){
                                        $utid=$row['utid'];
                                        $ut=$row['usertype'];
                        ?>  
                                        <tr>
                                        <td><?php echo $utid; ?></td>
                                        <td><?php echo $ut; ?></td>
                                        <?php echo '
                                        <td>
                                            <button class="modal-open showUpdateUsertype" data-modal="modal7" value="'.$utid.'" ><span class="material-symbols-sharp edit" title="Edit this account">edit</span></button>
                                            <button class="modal-open showRemoveUsertype" data-modal="modal8" value="'.$utid.'"><span class="material-symbols-sharp remove" title="Remove the record">delete</span></button>
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

    <?php  include 'scriptingfiles.php';  ?>
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

