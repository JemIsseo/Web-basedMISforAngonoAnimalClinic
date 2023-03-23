
        <div class="right">
            <div class="top">
                <button id="menu-btn">
                    <span class="material-symbols-sharp">menu</span>
                </button>
                <div class="profile" style="margin-left: 5em">
                    <div class="info">
                        <p>Welcome,  <b><?php echo $_SESSION['username'];  ?></b></p>
                        <small class="text-muted"><?php echo $_SESSION['usertype']; ?></small>
                    </div>
                    <div class="profile-photo">
                        <img src="uploads/<?php echo $_SESSION['image'];?>">
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