'use strict';

// element toggle function
const elemToggleFunc = function (elem) { elem.classList.toggle("active"); }



// navbar variables
const navbar = document.querySelector("[data-navbar]");
const navbarToggleBtn = document.querySelector("[data-navbar-toggle-btn]");

navbarToggleBtn.addEventListener("click", function () { elemToggleFunc(navbar); });



// whishlist button
const whishlistBtn = document.querySelectorAll("[data-whishlist-btn]");

for (let i = 0; i < whishlistBtn.length; i++) {

  whishlistBtn[i].addEventListener("click", function () { elemToggleFunc(this); });

}

// Menu button
const MenutBtn = document.querySelectorAll("[data-menu-btn]");
const menuModal = document.querySelectorAll("[data-menu-modal]");

for (let i = 0; i < MenutBtn.length; i++) {
  MenutBtn[i].addEventListener("click", function () {
    if (menuModal[i].style.display === 'none' || menuModal[i].style.display === '') {
      menuModal[i].style.display = 'block';
    } else {
      menuModal[i].style.display = 'none';
    }
    window.addEventListener('click', function (event) {
      if (!event.target.matches('.product-card-menu') && !event.target.closest('.product-card-menu')) {
        // const menu = document.querySelector('.menu-model');
        if (menuModal[i].style.display === 'block') {
          menuModal[i].style.display = 'none';
        }
      }
    });



  });
}




// go to top variable
const goTopBtn = document.querySelector("[data-go-top]");

  window.addEventListener("scroll", function () {

    if (this.window.scrollY >= 800) {
      goTopBtn.classList.add("active");
    } else {
      goTopBtn.classList.remove("active");
    }

  });