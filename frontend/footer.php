<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Slider</title>
    <!-- CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.0.9/dist/css/splide.min.css">

    <link rel="stylesheet" href="css/style.css">
    <style>
        h5 {
            color: white;
        }

        .item1 {
            color: white;
        }

        .splide__pagination {
            position: absolute;
            bottom: -10px;
            /* Adjust this value as needed */
            width: 100%;
            text-align: center;
        }

        .splide__pagination__page {
            width: 8px;
            /* Set the width of each dot */
            height: 8px;
            /* Set the height of each dot */
            background-color: #ccc;
            /* Change the background color of the dots */
            display: inline-block;
            /* Display dots in a row */
            margin: 0px 5px;
            /* Add spacing between dots */
            cursor: pointer;
            /* Add pointer cursor */
            border-radius: 50%;
            /* Make dots circular */
            margin-top: 50px;
        }

        .splide__pagination__page.is-active {
            background-color: #00447B;
            /* Change the color of the active dot */
        }
    </style>
</head>

<body>
    <div class="container pb-3">
        <h1 class="py-2 fw-bold fs-2" style="color: #00447B;">Brand We Trust</h1>
        <div class="container">
            <div class="splide">
                <div class="splide__track">
                    <ul class="splide__list">
                        <!-- Slide 1 -->
                        <li class="splide__slide">
                            <img src="resources/image/brand1.jpg" alt="Brand 1" class="img-fluid p-3">
                        </li>
                        <!-- Slide 2 -->
                        <li class="splide__slide">
                            <img src="resources/image/brand2.jpg" alt="Brand 2" class="img-fluid p-3">
                        </li>
                        <li class="splide__slide">
                            <img src="resources/image/brand1.jpg" alt="Brand 2" class="img-fluid p-3">
                        </li>
                        <li class="splide__slide">
                            <img src="resources/image/brand2.jpg" alt="Brand 2" class="img-fluid p-3">
                        </li>
                        <li class="splide__slide">
                            <img src="resources/image/brand1.jpg" alt="Brand 2" class="img-fluid p-3">
                        </li>
                        <li class="splide__slide">
                            <img src="resources/image/brand2.jpg" alt="Brand 2" class="img-fluid p-3">
                        </li>
                        <li class="splide__slide">
                            <img src="resources/image/brand1.jpg" alt="Brand 2" class="img-fluid p-3">
                        </li>
                        <li class="splide__slide">
                            <img src="resources/image/brand2.jpg" alt="Brand 2" class="img-fluid p-3">
                        </li>
                        <li class="splide__slide">
                            <img src="resources/image/brand1.jpg" alt="Brand 2" class="img-fluid p-3">
                        </li>
                        </li>
                        <li class="splide__slide">
                            <img src="resources/image/brand2.jpg" alt="Brand 2" class="img-fluid p-3">
                        </li>
                        <li class="splide__slide">
                            <img src="resources/image/brand1.jpg" alt="Brand 2" class="img-fluid p-3">
                        </li>
                        <li class="splide__slide">
                            <img src="resources/image/brand2.jpg" alt="Brand 2" class="img-fluid p-3">
                        </li>
                        <li class="splide__slide">
                            <img src="resources/image/brand1.jpg" alt="Brand 2" class="img-fluid p-3">
                        </li>
                        <li class="splide__slide">
                            <img src="resources/image/brand2.jpg" alt="Brand 2" class="img-fluid p-3">
                        </li>
                        <li class="splide__slide">
                            <img src="resources/image/brand1.jpg" alt="Brand 2" class="img-fluid p-3">
                        </li>
                        <li class="splide__slide">
                            <img src="resources/image/brand2.jpg" alt="Brand 2" class="img-fluid p-3">
                        </li>
                        <!-- Add more slides as needed -->

                    </ul>
                </div>
            </div>
        </div>

    </div>
    <footer style="background-color: #002848;">
        <div class="container">
            <div class="row footer-mainBox">
                <div class="col-sm ">
                    <img src="resources/image/logo.jpg" alt="" srcset="" class="footer-logo my-5 ">
                </div>
                <div class="col-sm pt-3">
                    <h5 style="color: white;">About</h5>
                    <div class="footer-list-container py-4">
                        <div class="item1 py-2"> About us</div>
                        <div class="item1   py-2">Contact Us</div>
                        <div class="item1   py-2">Careers</div>
                        <div class="item1   py-2">FAQ</div>

                    </div>
                </div>
                <div class="col-sm pt-3">
                    <h5>policy</h5>
                    <div class="footer-list-container py-4">
                        <div class="item1 py-2"> About us</div>
                        <div class="item1   py-2">Contact Us</div>
                        <div class="item1   py-2">Careers</div>
                        <div class="item1   py-2">FAQ</div>

                    </div>
                </div>
                <div class="col-sm pt-3">
                    <h5>Usefull links</h5>
                    <div class="footer-list-container py-4">
                        <div class="item1 py-2"> About us</div>
                        <div class="item1   py-2">Contact Us</div>
                        <div class="item1   py-2">Careers</div>
                        <div class="item1   py-2">FAQ</div>
                        <div class="item1   py-2">Careers</div>
                        <div class="item1   py-2">FAQ</div>

                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="js/bootstrap.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.0.9/dist/js/splide.min.js"></script>
    <script>
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
    </script>
</body>

</html>