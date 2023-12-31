<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Slider</title>
    <!-- CSS -->
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.0.9/dist/css/splide.min.css">

    <link rel="stylesheet" href="css/style.css">
    <style>
        /* h5 {
            color: white;
        }

        .item1 {
            color: white;
        } */

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
    <div class="container pb-3 py-4">
        <h1 class="py-4 fw-bold fs-2" style="color: #00447B;">Brand We Trust</h1>
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
    <!-- JavaScript -->
    <!-- <script src="js/bootstrap.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.0.9/dist/js/splide.min.js"></script>
    <script>
        
    </script> -->
</body>

</html>