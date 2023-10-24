// swiper animation
var swiper = new Swiper(".mySwiperld", {
    spaceBetween: 30,
    direction: "vertical",
    centeredSlides: true,
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    centeredSlides: true,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});
// category

var newRow = 0;
var x = 0;
function increaseCategory(id) {
    x = x + 1;
    var category = document.getElementById("category");

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            var text = request.responseText;
            category.innerHTML = text;
            // alert(text);

        }
    }
    request.open("GET", "interfaces/categoryProcess.php?id=" + id + "&x=" + x, true);
    request.send();

}


// offersection

var swiper = new Swiper(".mySwiperk", {
    loop: true, // Enable loop mode if you want the slider to wrap around
    slidesPerView: 1, // Number of slides per view
    spaceBetween: 30,
    centeredSlides: true,
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
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
// Review section js
var swiper = new Swiper(".mySwiper", {
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});


// Brand we trust section

document.addEventListener('DOMContentLoaded', function () {
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



// brand

document.addEventListener('DOMContentLoaded', function () {
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

// category page image slider by swapper
var swiper = new Swiper(".mySwiper", {
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
        renderBullet: function (index, className) {
            return '<span class="' + className + '">' + (index + 1) + "</span>";
        },
    },
});

// left slider
var swiper = new Swiper(".spv-mySwiper", {
    loop: true,
    spaceBetween: 10,
    slidesPerView: 4,
    freeMode: true,
    watchSlidesProgress: true,
  });
  var swiper2 = new Swiper(".spv-mySwiper2", {
    loop: true,
    spaceBetween: 10,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    thumbs: {
      swiper: swiper,
    },
  });



  