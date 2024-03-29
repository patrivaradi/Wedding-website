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
