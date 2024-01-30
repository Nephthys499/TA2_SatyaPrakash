const navbarNav = document.querySelector(".navbar-nav");
document.querySelector("#hamburger-menu1").onclick = () => {
  navbarNav.classList.toggle("active");
};
const hamburger = document.querySelector("#hamburger-menu1");
document.addEventListener("click", function (e) {
  if (!hamburger.contains(e.target) && !navbarNav.contains(e.target)) {
    navbarNav.classList.remove("active");
  }
});
var swiper = new Swiper(".mySwiperservices", {
  slidesPerView: 1,
  spaceBetween: 10,
  autoplay: {
    delay: 3500,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  breakpoints: {
    640: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 3,
      spaceBetween: 10,
    },
    1024: {
      slidesPerView: 3,
      spaceBetween: 10,
    },
  },
});
// Get all the "read more" links
const readMoreLinks = document.querySelectorAll(".read-more-link");

// Function to toggle the expanded class
function toggleExpanded(serviceBox) {
  serviceBox.classList.toggle("expanded");

  // Change the text of the read more link based on the class
  const readMoreLink = serviceBox.querySelector(".read-more-link");
  if (serviceBox.classList.contains("expanded")) {
    readMoreLink.textContent = "Read Less";
  } else {
    readMoreLink.textContent = "Read More";
  }

  // Reset the expanded class after 5 seconds
  if (serviceBox.classList.contains("expanded")) {
    setTimeout(() => {
      serviceBox.classList.remove("expanded");
      readMoreLink.textContent = "Read More";
    }, 15000);
  }
}

// Add click event listener to each "read more" link
readMoreLinks.forEach(link => {
  link.addEventListener("click", function (event) {
    event.preventDefault();

    // Find the parent service-box element
    const serviceBox = this.parentElement;

    // Call the toggleExpanded function
    toggleExpanded(serviceBox);
  });
});
