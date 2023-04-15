    <script src="../js/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        const sideMenu = document.querySelector("aside");
        const menuBtn = document.querySelector("#menu-btn");
        const closeBtn = document.querySelector("#close-btn");
        const closeMessage = document.querySelector("#close");
        const warningMessage = document.querySelector("#closewarning");
        const messageBox = document.querySelector('.message-box');

        // Fade out the message box after a delay
        setTimeout(function() {
            messageBox.style.opacity = 0;
            setTimeout(function() {
                messageBox.style.display = 'none';
            }, 1000);
        }, 2000);

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

        var state = "false";

        function toggle() {
            if (state) {
                document.getElementById(
                    "password").
                setAttribute("type", "password");
                state = false;
            } else {
                document.getElementById(
                    "password").
                setAttribute("type", "text");
                state = true;
            }
        }

        function togglecp() {
            if (state) {
                document.getElementById(
                    "confirmpassword").
                setAttribute("type", "password");
                state = false;
            } else {
                document.getElementById(
                    "confirmpassword").
                setAttribute("type", "text");
                state = true;
            }
        }

        function toggleup() {
            if (state) {
                document.getElementById(
                    "passwordup").
                setAttribute("type", "password");
                state = false;
            } else {
                document.getElementById(
                    "passwordup").
                setAttribute("type", "text");
                state = true;
            }
        }

        function clearInputs() {
            var inputs = document.getElementsByTagName('input');
            for (var i = 0; i < inputs.length; i++) {
                if (inputs[i].type === 'text' || inputs[i].type === 'email' || inputs[i].type === 'password') {
                    inputs[i].value = '';
                }
            }
        }

        var clearButton = document.getElementById('clear-button');
        clearButton.addEventListener('click', clearInputs);

        function logout() {
            if (confirm("Are you sure you want to log out?")) {
                window.location.href = "index.php";
            }
        }
        
    </script>