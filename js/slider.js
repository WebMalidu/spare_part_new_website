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
  };
  request.open(
    "GET",
    "interfaces/categoryProcess.php?id=" + id + "&x=" + x,
    true
  );
  request.send();
}

// offersection
// Initialize Splide slider

// Review section js
var swiper = new Swiper(".mySwiper", {
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});

// Brand we trust section
function promotionSliderLoader() {
  var splide1 = new Splide(".splide-promotion", {
    type: "loop",
    drag: "free",
    autoplay: true,
    snap: true,
    arrows: false,
    perPage: 2,
    pagination: false,
    gap: 100, // Set the gap between slides to 20 pixels (adjust as needed)
    // Disable navigation points
  });

  // Mount the slider
  splide1.mount();
}

document.addEventListener("DOMContentLoaded", function () {
  promotionSliderLoader();
  console.log("splide1 initialized");

    var splide = new Splide('#slider-promo', {
        type: 'loop',
        perPage: 2, // Adjust this value as needed
        perMove: 1,
        autoplay: true,
        pauseOnHover: false,
        arrows: false,
        breakpoints: {
            768: {
                perPage: 1,
            },
            992: {
                perPage: 1,
            },
            1200: {
                perPage: 1,
            },
        },
    });
  var splide = new Splide(".splide", {
    type: "loop",
    perPage: 6, // Adjust this value as needed
    perMove: 1,
    autoplay: true,
    pauseOnHover: false,
    arrows: false,
    breakpoints: {
      768: {
        perPage: 2,
      },
      992: {
        perPage: 3,
      },
      1200: {
        perPage: 4,
      },
    },
  });

  splide.mount();

  console.log("splide initialized");
});

// brand

document.addEventListener("DOMContentLoaded", function () {
  var splide = new Splide(".splide", {
    type: "loop",
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
function singleProductSliderCreated() {
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
}
