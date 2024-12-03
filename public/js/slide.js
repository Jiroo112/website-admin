const carousel = document.querySelector(".carousel");
const slides = document.querySelectorAll(".slide");
const dots = document.querySelectorAll(".dot");
let currentSlide = 0;
const slideWidth = slides[0].offsetWidth;
const totalSlides = slides.length;

function moveSlide(direction) {
  currentSlide = (currentSlide + direction + totalSlides) % totalSlides;
  updateActiveSlide();
  resetInterval();
}

function updateActiveSlide() {
  // Menggeser carousel sehingga slide aktif berada di tengah
  const offset = carousel.offsetWidth / 2 - slideWidth / 2;
  carousel.style.transform = `translateX(${
    -currentSlide * slideWidth + offset
  }px)`;

  slides.forEach((slide, index) => {
    slide.classList.toggle("active", index === currentSlide);
  });

  dots.forEach((dot, index) => {
    dot.classList.toggle("active", index === currentSlide);
  });
}

function nextSlide() {
  currentSlide = (currentSlide + 1) % totalSlides;
  updateActiveSlide();
}

// Auto slide
let slideInterval = setInterval(nextSlide, 3000);

// Dot navigation
dots.forEach((dot, index) => {
  dot.addEventListener("click", () => {
    currentSlide = index;
    updateActiveSlide();
    resetInterval();
  });
});

function resetInterval() {
  clearInterval(slideInterval);
  slideInterval = setInterval(nextSlide, 3000);
}

// Pause on hover
carousel.addEventListener("mouseenter", () => {
  clearInterval(slideInterval);
});

carousel.addEventListener("mouseleave", () => {
  slideInterval = setInterval(nextSlide, 3000);
});

// Initial slide setup
updateActiveSlide();
