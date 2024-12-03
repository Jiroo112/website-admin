// Feather icons
feather.replace();

// Hero Section Slideshow
document.addEventListener('DOMContentLoaded', function() {
    const slides = document.querySelectorAll('.hero .slide');
    let currentSlide = 0;
    
    function nextSlide() {
        slides[currentSlide].classList.remove('active');
        currentSlide = (currentSlide + 1) % slides.length;
        slides[currentSlide].classList.add('active');
    }
    
    // Change slide every 5 seconds
    setInterval(nextSlide, 5000);
});

// You can add other JavaScript functionality here
// For example, smooth scrolling for navigation links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

const navbarNav = document.querySelector(".navbar-nav");
document.querySelector("#menu").onclick = () => {
    navbarNav.classList.toggle("active");
  };
  
  const hamburger = document.querySelector("#menu");
  document.addEventListener("click", function (e) {
    if (!hamburger.contains(e.target) && !navbarNav.contains(e.target)) {
      navbarNav.classList.remove("active");
    }
    if (!searchbar.contains(e.target) && !searchForm.contains(e.target)) {
      searchForm.classList.remove("active");
    }
  });


