'use strict';



/**
 * PRELOAD
 * 
 * loading will be end after document is loaded
 */

const preloader = document.querySelector("[data-preaload]");

window.addEventListener("load", function () {
  preloader.classList.add("loaded");
  document.body.classList.add("loaded");
});



/**
 * add event listener on multiple elements
 */

const addEventOnElements = function (elements, eventType, callback) {
  for (let i = 0, len = elements.length; i < len; i++) {
    elements[i].addEventListener(eventType, callback);
  }
}



/**
 * NAVBAR
 */

const navbar = document.querySelector("[data-navbar]");
const navTogglers = document.querySelectorAll("[data-nav-toggler]");
const overlay = document.querySelector("[data-overlay]");

const toggleNavbar = function () {
  navbar.classList.toggle("active");
  overlay.classList.toggle("active");
  document.body.classList.toggle("nav-active");
}

addEventOnElements(navTogglers, "click", toggleNavbar);



/**
 * HEADER & BACK TOP BTN
 */

const header = document.querySelector("[data-header]");
const backTopBtn = document.querySelector("[data-back-top-btn]");

let lastScrollPos = 0;

const hideHeader = function () {
  const isScrollBottom = lastScrollPos < window.scrollY;
  if (isScrollBottom) {
    header.classList.add("hide");
  } else {
    header.classList.remove("hide");
  }

  lastScrollPos = window.scrollY;
}

window.addEventListener("scroll", function () {
  if (window.scrollY >= 50) {
    header.classList.add("active");
    backTopBtn.classList.add("active");
    hideHeader();
  } else {
    header.classList.remove("active");
    backTopBtn.classList.remove("active");
  }
});



/**
 * HERO SLIDER
 */

document.addEventListener('DOMContentLoaded', function () {
    const heroSlider = document.querySelector("[data-hero-slider]");
    const heroSliderItems = document.querySelectorAll("[data-hero-slider-item]");
    const heroSliderPrevBtn = document.querySelector("[data-prev-btn]");
    const heroSliderNextBtn = document.querySelector("[data-next-btn]");
  
    let currentSlidePos = 0;
    let lastActiveSliderItem = heroSliderItems[0];
  
    const updateSliderPos = function () {
      lastActiveSliderItem.classList.remove("active");
      heroSliderItems[currentSlidePos].classList.add("active");
      lastActiveSliderItem = heroSliderItems[currentSlidePos];
    }
  
    const slideNext = function () {
      if (currentSlidePos >= heroSliderItems.length - 1) {
        currentSlidePos = 0;
      } else {
        currentSlidePos++;
      }
      updateSliderPos();
    }
  
    const slidePrev = function () {
      if (currentSlidePos <= 0) {
        currentSlidePos = heroSliderItems.length - 1;
      } else {
        currentSlidePos--;
      }
      updateSliderPos();
    }
  
    heroSliderNextBtn.addEventListener("click", slideNext);
    heroSliderPrevBtn.addEventListener("click", slidePrev);
  
   /**
   * Auto slide
   */
  let autoSlideInterval;

  const autoSlide = function () {
    autoSlideInterval = setInterval(slideNext, 7000);
  }

  const addEventOnElements = function (elements, event, handler) {
    elements.forEach(element => {
      element.addEventListener(event, handler);
    });
  }

  // Convert NodeList to Array for addEventOnElements function
  const navButtons = Array.from([heroSliderNextBtn, heroSliderPrevBtn]);

  addEventOnElements(navButtons, "mouseover", function () {
    clearInterval(autoSlideInterval);
  });

  addEventOnElements(navButtons, "mouseout", autoSlide);

  window.addEventListener("load", autoSlide);
});


/**
 * PARALLAX EFFECT
 */

const parallaxItems = document.querySelectorAll("[data-parallax-item]");

let x, y;

window.addEventListener("mousemove", function (event) {

  x = (event.clientX / window.innerWidth * 10) - 5;
  y = (event.clientY / window.innerHeight * 10) - 5;

  // reverse the number eg. 20 -> -20, -5 -> 5
  x = x - (x * 2);
  y = y - (y * 2);

  for (let i = 0, len = parallaxItems.length; i < len; i++) {
    x = x * Number(parallaxItems[i].dataset.parallaxSpeed);
    y = y * Number(parallaxItems[i].dataset.parallaxSpeed);
    parallaxItems[i].style.transform = `translate3d(${x}px, ${y}px, 0px)`;
  }

});

//Validation table reservation
document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("reservation-form");
  
    form.addEventListener("submit", function (event) {
      event.preventDefault();
      let isValid = true;
  
      // Full Name validation
      const name = document.getElementById("name");
      const nameError = document.getElementById("name-error");
      if (name.value.trim() === "") {
        nameError.textContent = "Full Name is required.";
        isValid = false;
      } else {
        nameError.textContent = "";
      }
  
      // Email validation
      const email = document.getElementById("email");
      const emailError = document.getElementById("email-error");
      const emailPattern = /^[^@\s]+@[^@\s]+\.[^@\s]+$/;
      if (email.value.trim() === "") {
        emailError.textContent = "Email is required.";
        isValid = false;
      } else if (!emailPattern.test(email.value.trim())) {
        emailError.textContent = "Please enter a valid email address.";
        isValid = false;
      } else {
        emailError.textContent = "";
      }
  
      // Phone Number validation
      const phone = document.getElementById("phone");
      const phoneError = document.getElementById("phone-error");
      if (phone.value.trim() === "") {
        phoneError.textContent = "Phone Number is required.";
        isValid = false;
      } else {
        phoneError.textContent = "";
      }
  
      // Date validation
      const date = document.getElementById("date");
      const dateError = document.getElementById("date-error");
      if (date.value.trim() === "") {
        dateError.textContent = "Date is required.";
        isValid = false;
      } else {
        dateError.textContent = "";
      }
  
      // Time validation
      const time = document.getElementById("time");
      const timeError = document.getElementById("time-error");
      if (time.value.trim() === "") {
        timeError.textContent = "Time is required.";
        isValid = false;
      } else {
        timeError.textContent = "";
      }
  
      // Number of Guests validation
      const guests = document.getElementById("guests");
      const guestsError = document.getElementById("guests-error");
      if (guests.value.trim() === "") {
        guestsError.textContent = "Number of Guests is required.";
        isValid = false;
      } else if (parseInt(guests.value.trim()) <= 0) {
        guestsError.textContent = "Please enter a valid number of guests.";
        isValid = false;
      } else {
        guestsError.textContent = "";
      }
  
      if (isValid) {
        form.submit();
      }
    });
  });


  // Header section navigation
  document.addEventListener("DOMContentLoaded", () => {
    const navTogglers = document.querySelectorAll('[data-nav-toggler]');
    const navbar = document.querySelector('[data-navbar]');
    const overlay = document.querySelector('[data-overlay]');

    navTogglers.forEach(toggler => {
      toggler.addEventListener('click', () => {
        navbar.classList.toggle('active');
        overlay.classList.toggle('active');
      });
    });
  });

  function navigateTo(url) {
    window.location.href = url;
  }
  
  

  $(document).ready(function() {
    // AJAX request to load footer content
    $.ajax({
        type: 'GET',
        url: 'footer.html', // Path to your footer HTML file
        dataType: 'html',
        success: function(data) {
            $('.footer-wrapper').html(data); // Replace the content of .footer-wrapper with loaded footer.html content
        },
        error: function(xhr, status, error) {
            console.error('Error loading footer:', status, error);
        }
    });
});

document.querySelectorAll('.value-box').forEach(box => {
  box.addEventListener('click', () => {
    // Remove the clicked class from all boxes
    document.querySelectorAll('.value-box').forEach(b => b.classList.remove('clicked'));
    
    // Add the clicked class to the clicked box
    box.classList.add('clicked');
  });
});


document.addEventListener("DOMContentLoaded", function() {
  var notification = document.querySelector('.notification.success');
  if (notification) {
      setTimeout(function() {
          notification.style.display = 'none';
      }, 5000); // Adjust time in milliseconds as needed
  }
});

