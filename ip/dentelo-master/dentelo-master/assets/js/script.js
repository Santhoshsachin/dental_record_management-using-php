'use strict';



/**
 * addEvent on element
 */

const addEventOnElem = function (elem, type, callback) {
  if (elem.length > 1) {
    for (let i = 0; i < elem.length; i++) {
      elem[i].addEventListener(type, callback);
    }
  } else {
    elem.addEventListener(type, callback);
  }
}



/**
 * navbar toggle
 */

const navbar = document.querySelector("[data-navbar]");
const navbarLinks = document.querySelectorAll("[data-nav-link]");
const navbarToggler = document.querySelector("[data-nav-toggler]");

const toggleNav = function () {
  navbar.classList.toggle("active");
  navbarToggler.classList.toggle("active");
}

addEventOnElem(navbarToggler, "click", toggleNav);

const closeNav = function () {
  navbar.classList.remove("active");
  navbarToggler.classList.remove("active");
}

addEventOnElem(navbarLinks, "click", closeNav);



/**
 * header active
 */

const header = document.querySelector("[data-header]");
const backTopBtn = document.querySelector("[data-back-top-btn]");

window.addEventListener("scroll", function () {
  if (window.scrollY >= 100) {
    header.classList.add("active");
    backTopBtn.classList.add("active");
  } else {
    header.classList.remove("active");
    backTopBtn.classList.remove("active");
  }
});
document.addEventListener("DOMContentLoaded", function () {
  // Select the form and the email input field
  const heroForm = document.querySelector(".hero-form");
  const ctaForm = document.querySelector(".cta-form");
  const emailFieldHero = document.querySelector(".hero-form .email-field");
  const emailFieldCTA = document.querySelector(".cta-form .email-field");

  // Function to validate email
  function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(String(email).toLowerCase());
  }

  // Function to handle form submission
  async function handleFormSubmit(event) {
    event.preventDefault();

    const emailField = event.target.querySelector(".email-field");
    const email = emailField.value;

    if (!validateEmail(email)) {
      alert("Please enter a valid email address.");
      return;
    }

    try {
      const response = await fetch("https://your-server-endpoint.com/callback", {
        method: "POST",
        headers: {
          "Content-Type": "application/json"
        },
        body: JSON.stringify({ email_address: email })
      });

      if (response.ok) {
        alert("Thank you! We will call you back soon.");
        emailField.value = ""; // Clear the input field
      } else {
        alert("Something went wrong. Please try again later.");
      }
    } catch (error) {
      console.error("Error submitting the form:", error);
      alert("Something went wrong. Please try again later.");
    }
  }

  // Attach event listeners to the forms
  heroForm.addEventListener("submit", handleFormSubmit);
  ctaForm.addEventListener("submit", handleFormSubmit);
});
