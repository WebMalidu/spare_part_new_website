// cart open
let cartModel;
function openCartModel() {
  cartModel = new bootstrap.Modal("#cartModel");
  cartModel.show();
}

// watchlist open
let watchlistModel;
function openWatchlistModel() {
  watchlistModel = new bootstrap.Modal("#watchlistModel");
  watchlistModel.show();
}

// password change open
let passwordModel;
function openPasswordModel() {
  passwordModel = new bootstrap.Modal("#passwordModel");
  passwordModel.show();
}




// swiper animation
var swiper = new Swiper(".mySwiperld", {
    direction: "vertical",
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
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
    type: 'loop',
    perPage: 6,
    perMove: 1,
    autoplay: true,
    pauseOnHover: false,
    arrows: false,

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


// profile section toggle

function viewChange(id) {

    var profile = document.getElementById("profile_view");
    var purachse = document.getElementById("purchasing_view");

    if(id==1){
        purachse.classList.add('d-none');
        profile.classList.remove('d-none');
    }else{
        profile.classList.add('d-none');
        purachse.classList.remove('d-none');
    }

}


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