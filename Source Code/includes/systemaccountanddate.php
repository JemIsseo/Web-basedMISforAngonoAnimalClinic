        <?php 
           include 'connect.php';

          
        
            // if ($_POST['login']) {
            //     $un = $_POST['username'];
            //     $ut = $_POST['usertype'];

            //     $s=mysqli_query($conn,"select * from tbluseraccount where username = '$un'");
            // }
        
        
        
        ?>
        <div class="right">
            <div class="top">
                <button id="menu-btn">
                    <span class="material-symbols-sharp">menu</span>
                </button>
                <div class="profile" style="margin-left: 5em">
                    <div class="info">
                        <p>Welcome,  <b>veterinarian</b></p>
                        <small class="text-muted">Veterinarian</small>
                    </div>
                    <div class="profile-photo">
                        <img src="../Images/profile-1.jpg" alt="User Photo">
                    </div>
                </div>
            </div>
            <!-- End of top -->
            
            <div class="date-today">
                <div class="rectangle-border"></div>
                <div class="datetoday">
                <span class="material-symbols-sharp">event</span>
                        <?php  
                       date_default_timezone_set('Asia/Manila');  
                       echo "<br>Today is ".date("M d, Y \n l,h:i:sA ")."<br>Have a great day!&nbsp;&nbsp;&nbsp;";
                       ?>
                </div>
            </div>
            <!--  End of Date  -->       