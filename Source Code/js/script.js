let darkMode = localStorage.getItem("darkMode");
const sideMenu = document.querySelector("aside");
const menuBtn = document.querySelector("#menu-btn");
const closeBtn = document.querySelector("#close-btn");
const darkModeToggle = document.querySelector("#dark-mode-toggle");


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

