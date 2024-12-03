// Initialize Swiper
var swiper = new Swiper(".testimonialSwiper", {
    // Enable loop mode
    loop: true,
    
    // Space between slides
    spaceBetween: 30,
    
    // Default is 1 slide per view
    slidesPerView: 1,
    
    // Enable pagination
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    
    // Enable navigation buttons
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    
    // Responsive breakpoints
    breakpoints: {
        // When window width is >= 768px
        768: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        // When window width is >= 1024px
        1024: {
            slidesPerView: 3,
            spaceBetween: 30,
        },
    },
});