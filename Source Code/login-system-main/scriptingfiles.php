  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        let darkMode = localStorage.getItem("darkMode");
        const sideMenu = document.querySelector("aside");
        const menuBtn = document.querySelector("#menu-btn");
        const closeBtn = document.querySelector("#close-btn");
        const darkModeToggle = document.querySelector("#dark-mode-toggle");
        const closeMessage = document.querySelector("#close");
        const warningMessage =document.querySelector("#closewarning");

        // opening modals
        var modalBtns = document.querySelectorAll(".modal-open");

        modalBtns.forEach(function(btn){
            btn.onclick = function() {
                var modal = btn.getAttribute("data-modal");

                document.getElementById(modal).style.display = "block";
            };
        });

        // close modals
        var closeBtns =  document.querySelectorAll(".modal-close");
        closeBtns.forEach(function(btn){
            btn.onclick = function() {
                var modal = (btn.closest(".modal").style.display = "none");
            };
        });

        // close message
        closeMessage.addEventListener('click', () => {
            closeMessage.style.display = 'none';
        });  

        // close message
        warningMessage.addEventListener('click', () => {
            warningMessage.style.display = 'none';
        });  


        

        // show sidebar
        menuBtn.addEventListener('click', () => {
            sideMenu.style.display = 'block';
        });
        // close sidebar
        closeBtn.addEventListener('click', () => {
            sideMenu.style.display = 'none';
        });  

        // change theme
        const enableDarkMode = () => {
            document.body.classList.add("darkmode");
            localStorage.setItem('darkMode', 'enabled'); 
        };

        const disableDarkMode = () => {
            document.body.classList.remove('darkmode');
            localStorage.setItem('darkMode', null); 
        };

        if (darkMode === 'enabled') {
            enableDarkMode();
        }

        darkModeToggle.addEventListener('click', () => {
            darkMode = localStorage.getItem('darkMode');
            if (darkMode !== 'enabled') { 
                enableDarkMode();
            } else {
                disableDarkMode();
            }
            darkModeToggle.querySelector('span:nth-child(2)').classList.toggle('active');
            darkModeToggle.querySelector('span:nth-child(1)').classList.toggle('active');
        });

        


                var state = "false";

                function toggle() {
                    if (state) {
                        document.getElementById(
                            "password").
                            setAttribute("type","password");
                        state = false;
                    } else {
                        document.getElementById(
                            "password").
                            setAttribute("type","text");
                        state = true;
                    }
                }
                function togglecp() {
                    if (state) {
                        document.getElementById(
                            "confirmpassword").
                            setAttribute("type","password");
                        state = false;
                    } else {
                        document.getElementById(
                            "confirmpassword").
                            setAttribute("type","text");
                        state = true;
                    }
                }

                function toggleup() {
                    if (state) {
                        document.getElementById(
                            "passwordup").
                            setAttribute("type","password");
                        state = false;
                    } else {
                        document.getElementById(
                            "passwordup").
                            setAttribute("type","text");
                        state = true;
                    }
                }

                function clearBtnUserAccount() {
                    $un = "";
                    $pw = "";
                    $ea = "";
                    $ut = "Choose";
                    $img = "";
                } 

                function clearBtnStock() {
                    $proid = "";
                    $prodname = "";
                    $cat = "Select Category";
                    $desc = "";
                    $prc = "";
                    $qty = "";
                } 

                function clearBtnOwnersProfile() {
                    $op = "";
                    $cn = "";
                    $add = "";
                    $emailadd = "";
                }

                function clearBtnPetProfile() {
                    $op = "";
                    $pname = "";
                    $ptype = "";
                    $sex = "";
                    $breed = "";
                    $age = "";
                    $weight = "";
                }


    </script>
    