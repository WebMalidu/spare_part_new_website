// Review section js
var swiper = new Swiper(".mySwiper", {
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});


// Brand we trust section

document.addEventListener('DOMContentLoaded', function() {
    var splide = new Splide('.splide', {
        type: 'loop',
        perPage: 6, // Adjust this value as needed
        perMove: 1,
        autoplay: true, // Enable autoplay
        pauseOnHover: false, // Keep autoplay running even when hovering
        arrows: false, // Hide arrow icons
        breakpoints: {
            768: {
                perPage: 2, // Show 2 images per page on screens with width 768px or more
            },
            992: {
                perPage: 3, // Show 3 images per page on screens with width 992px or more
            },
            1200: {
                perPage: 4, // Show 4 images per page on screens with width 1200px or more
            },
        },
    });

    splide.mount();
});
