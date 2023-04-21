const toggleButton = document.querySelector(".toggle-button");
const toggleBIcon = document.querySelector(".toggle-button i");
const dropDownMenu = document.querySelector(".dropdown-menu");
const dropDlink = document.querySelectorAll(".dropdown-menu .nav-link");

toggleButton.onclick = function () {
  dropDownMenu.classList.toggle("open");
  const isOpen = dropDownMenu.classList.contains("open");
  if (isOpen) {
    dropDownMenu.style.display = "block";
  } else {
    dropDownMenu.style.display = "none";
    toggleBIcon.classList = "fa-solid fa-bars";
  }
  toggleBIcon.classList = isOpen ? "fa-solid fa-xmark" : "fa-solid fa-bars";
};

// TO DO - when resized dropdown menu needs to disappear
// window.addEventListener('resize', checkDropDown());
// window.onresize = checkDropDown();
// function checkDropDown() {
//     console.log(window.innerWidth)
// // if(!window.innerWidth <= 768 && dropDownMenu.classList.contains('open')){
// //     dropDownMenu.classList.remove('open');
// };

//------------- Closing dropdown menu if is clicked on ---------------------
dropDlink.forEach((link) => {
  link.onclick = function () {
    dropDownMenu.classList.remove("open");
    const isOpen = dropDownMenu.classList.contains("open");
    if (isOpen) {
      dropDownMenu.style.display = "block";
    } else {
      dropDownMenu.style.display = "none";
      toggleBIcon.classList = "fa-solid fa-bars";
    }
    toggleBIcon.classList = isOpen ? "fa-solid fa-xmark" : "fa-solid fa-bars";
  };
});

// --------------Gallery-----------------------------------
var elements = document.getElementsByClassName("column");
var i;
// ---------------Two images side by side---------------
function two() {
  for (i = 0; i < elements.length; i++) {
    elements[i].style.msFlex = "50%";
    elements[i].style.flex = "50%";
  }
}
// --------------Four images side by side---------------
function four() {
  for (i = 0; i < elements.length; i++) {
    elements[i].style.msFlex = "25%";
    elements[i].style.flex = "25%";
  }
}

// -----------------Countdown-------------------------
var countDownDate = new Date("Sep 21, 2023 12:00:00").getTime();
var countDDays = document.getElementById("days");
var countDHours = document.getElementById("hours");
var countDMinutes = document.getElementById("minutes");
var countDSeconds = document.getElementById("seconds");
var x = setInterval(function () {
  var now = new Date().getTime();
  var distance = countDownDate - now;

  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  countDDays.innerHTML = days;
  countDHours.innerHTML = hours;
  countDMinutes.innerHTML = minutes;
  countDSeconds.innerHTML = seconds;

  if (distance < 0) {
    clearInterval(x);
    countDDays.innerHTML = "00";
    countDHours.innerHTML = "00";
    countDMinutes.innerHTML = "00";
    countDSeconds.innerHTML = "00";
  }
}, 1000);

// -------------------About us section change of stories--------------
const aboutHerPics = document.getElementById("about-img-her");
const aboutHimPics = document.getElementById("about-img-him");
const aboutHerText = document.getElementById("about-her");
const aboutHimText = document.getElementById("about-him");

function test1() {
  console.log("her");
  aboutHerPics.classList.add("active-pic");
  aboutHimPics.classList.remove("active-pic");
  aboutHerText.classList.add("active-text");
  aboutHimText.classList.remove("active-text");
}
function test2() {
  console.log("him");
  aboutHimPics.classList.add("active-pic");
  aboutHerPics.classList.remove("active-pic");
  aboutHimText.classList.add("active-text");
  aboutHerText.classList.remove("active-text");
}
