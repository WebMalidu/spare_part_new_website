<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BATTA</title>
    <link rel="icon" href="resources/image/home/engineImage.png" />

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <!-- splide -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.0.9/dist/css/splide.min.css">
    <!-- css -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/style.css">

    <!-- icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alegreya:wght@500&family=Lato:wght@300&family=Roboto&family=Rubik&display=swap" rel="stylesheet">


    <!-- js -->
    <script src="https://kit.fontawesome.com/79961d807c.js" crossorigin="anonymous"></script>
    <script defer src="js/bootstrap.bundle.js"></script>
    <script defer src="js/script.js"></script>
    <script defer src="js/slider.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>



</head>

<body>
    <!-- header section-->

    <?php include("./pages/components/header.php") ?>

    <!-- hero section slider -->

    <section class="main-img">
        <div class="ma-img-overlay">
            <div class="container">
                <div class="d-flex flex-column flex-lg-row justify-content-start align-items-center gap-3 pt-md-5">
                    <div class="col-10 col-lg-5 d-flex flex-column gap-lg-5 order-2 order-lg-1 pt-md-5">
                        <div class="pb-3 pb-lg-5">
                            <div class="d-flex align-items-center">
                                <input type="text" class="col-10 col-lg-11 hr-se1-input px-3 p-2 hr-s1-rl" placeholder="Search here......" />
                                <div class="col-2 col-lg-1 d-flex justify-content-center p-2 align-items-center hr-s1-rr alg-bg-blue"><i class="bi bi-search text-white"></i></div>
                            </div>
                        </div>
                        <div>
                            <p class="text-white alg-text-h3">our hope is find you to get best solution no matter what you want every component have in our hand</p>
                            <div class="col-12 hr-bd-parah m-0">
                                <div class="row pb-md-3 pb-lg-0  p-0 gap-2 gap-md-0 gap-lg-0 pt-3 pt-md-0 pt-lg-0 pb-5">
                                    <div class="col-12 col-md-6 col-lg-6 d-grid hr-bd-btn pb-2 pb-md-0">
                                        <button class="main-btn-1 alg-bg-blue rounded-1 alg-text-h3 alg-button-hover fw-bold">ADD CAR</button>
                                    </div>
                                    <div class="col-12 col-md-6  col-lg-6 d-grid hr-bd-btn">
                                        <button class="main-btn-2 rounded-1 alg-text-h3">Learn More</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-10 col-lg-6 order-1 order-lg-2 pt-md-5">
                        <!-- main slider -->
                        <div class="swiper ld-hero mySwiperld" style="height: 478px; width: 100%;">
                            <div class="swiper-wrapper d-block d-lg-none">
                                <div class="swiper-slide ld-hero">
                                    <img src="./resources/image/home/engineImage.png" />
                                </div>
                                <div class="swiper-slide ld-hero">
                                    <img src="./resources/image/home/engineImage.png" />
                                </div>
                                <div class="swiper-slide ld-hero">
                                    <img src="./resources/image/home/engineImage.png" />
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="d-flex justify-content-end align-items-center text-white">
        <div class="d-flex flex-column gap-2 fs-5 position-fixed alg-cursor alg-bg-blue p-2 rounded-2">
            <span><i class="bi bi-facebook"></i></span>
            <span><i class="bi bi-youtube"></i></span>
            <span><i class="bi bi-instagram"></i></span>
            <span><i class="bi bi-whatsapp"></i></span>
        </div>
    </div>
    <!-- offer section -->
    <section class="offerSection py-2 py-lg-4">
        <div class="container pb-5">
            <div class="col-12">
                <div class="d-flex flex-column align-items-center mb-2">
                    <div class="col-4 col-md-3 col-lg-2 d-flex flex-column align-items-center">
                        <span class="alg-text-blue mt-1 fw-bolder alg-text-h2 pb-1">OUR OFFERS</span>
                        <div class="alg-line1 alg-bg-blue d-flex align-self-center"></div>
                        <div class="alg-line2 alg-bg-blue d-flex align-self-center"></div>
                    </div>
                </div>

                <div class="swiper mySwiperk pt-3">
                    <div class="swiper-wrapper">
                        <?php
                        for ($x = 0; $x < 4; $x++) {
                        ?>
                            <div class="swiper-slide d-flex gap-5 p-3">
                                <div>
                                    <img src="resources/image/offer.png" class="alg-slider-img alg-shadow" alt="">
                                </div>
                                <div>
                                    <img src="resources/image/offer.png" class="alg-slider-img alg-shadow" alt="">
                                </div>
                            </div>
                        <?php
                        }

                        ?>
                        <!-- <div class="swiper-pagination bg-succes"></div> -->
                    </div>

                </div>

            </div>
        </div>
    </section>


    <!-- search section -->
    <section class="w-100 searchSectio alg-bg-light-blue bg-n py-2 py-lg-5">
        <div class="container searchSection-mainContainer pb-5">
            <div class="d-flex flex-column align-items-center mb-4">
                <div class="col-6 col-md-4 col-lg-3 d-flex flex-column align-items-center">
                    <span class="alg-text-blue mt-1 fw-bolder alg-text-h2 pb-1">SEARCH BY VEHICAL</span>
                    <div class="alg-line1 alg-bg-blue d-flex align-self-center"></div>
                    <div class="alg-line2 alg-bg-blue d-flex align-self-center"></div>
                </div>
            </div>
            <div class="searchSection-selectorBox d-flex justify-content-center gap-2 p-3">
                <div class="col-12 d-flex flex-column flex-lg-row align-items-center justify-content-lg-center gap-3">
                    <div class="w-100">
                        <select class="searchSection-selector form-select form-select-sm alg-shadow" aria-label="Small select example">
                            <option selected>Select Car Maker</option>
                            <option class="fw-bold" value="1" disabled>popular car makers</option>
                            <option value="3">CHARVELOT</option>
                            <option value="2">FORD</option>
                            <option value="2">HONDA</option>
                            <option value="2">KIA</option>
                            <option value="2">MARUTI</option>
                            <option value="2">NISSAN</option>
                            <option value="2">RENAULT</option>
                            <option value="2">TOYOTA</option>
                            <option value="2">TATA</option>
                        </select>
                    </div>
                    <div class="w-100">
                        <select class="searchSection-selector  form-select form-select-sm alg-shadow" aria-label="Small select example">
                            <option selected>Select Model Line</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="w-100">
                        <select class="searchSection-selector form-select form-select-sm alg-shadow" aria-label="Small select example">
                            <option selected>Select Car Year</option>
                            <option value="1">2000</option>
                            <option value="2">2001</option>
                            <option value="3">2003</option>
                            <option value="3">2004</option>
                            <option value="3">2005</option>
                            <option value="3">2006</option>
                            <option value="3">2007</option>
                            <option value="3">2008</option>
                            <option value="3">2009</option>
                            <option value="3">2010</option>
                            <option value="3">2011</option>
                            <option value="3">2012</option>
                            <option value="3">2013</option>
                            <option value="3">2014</option>
                            <option value="3">2015</option>
                            <option value="3">2016</option>
                            <option value="3">2017</option>
                            <option value="3">2018</option>
                            <option value="3">2019</option>
                            <option value="3">2020</option>
                        </select>
                    </div>
                    <div class="w-100">
                        <select class="searchSection-selector form-select form-select-sm alg-shadow" aria-label="Small select example">
                            <option selected>Select Modification</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="w-100 d-grid">
                        <button class="rounded-2 border-0 fw-bold text-light searchSection-butto alg-bg-blue p-2 alg-button-hover">SEARCH PARTS</button>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--catergory section  -->
    <section class="py-5">
        <div class="container">
            <div class="d-flex flex-column align-items-center mb-4">
                <div class="col-6 col-md-4 col-lg-3 d-flex flex-column align-items-center">
                    <span class="alg-text-blue mt-1 fw-bolder alg-text-h2 pb-1">SEARCH BY CATEGORY</span>
                    <div class="alg-line1 alg-bg-blue d-flex align-self-center"></div>
                    <div class="alg-line2 alg-bg-blue d-flex align-self-center"></div>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-12 d-flex justify-content-center flex-wrap gap-2 gap-lg-5" id="category">

                    <?php
                    $num_row = 10;

                    if ($num_row >= 4) {
                        for ($x = 0; $x < 4; $x++) {
                    ?>
                            <div class="col-6 col-md-4 col-lg-2 alg-bg-categor alg-shadow mb-1 rounded mt-3 mx-4 px-3 alg-card-hover">
                                <a href="category.php" class="text-decoration-none">
                                    <div class="d-flex flex-column align-items-center">
                                        <img src="resources/image/car.jpg" alt="" class="alg-category-img mt-4 mb-4 img-fluid">
                                        <span class="mt-1 p-3 fw-bold text-whit pb-5 alg-text-h3">Air Condition</span>
                                    </div>
                            </div></a>
                        <?php
                        }
                    } else {
                        for ($x = 0; $x < $num_row; $x++) {
                        ?>
                            <div class="col-6 col-md-4 col-lg-2 alg-bg-categor alg-shadow mb-1 rounded mt-3 mx-4 px-3 alg-card-hover">
                                <a href="category.php" class="text-decoration-none">
                                    <div class="d-flex flex-column align-items-center">
                                        <img src="resources/image/car.jpg" alt="" class="alg-category-img mt-4 mb-4 img-fluid">
                                        <span class="mt-1 p-3 fw-bold text-whit pb-5 alg-text-h3">Air Condition</span>
                                    </div>
                            </div></a>
                    <?php
                        }
                    }

                    ?>

                </div>

                <div class="d-flex justify-content-center mt-5 p-3">
                    <button class="se3-btn fw-semibold px-3 p-1 rounded-2 alg-text-h3" onclick='increaseCategory(<?php echo $num_row ?>)'>Load More</button>
                </div>

            </div>
        </div>
    </section>


    <!-- about us -->

    <section class="alg-bg-light-blue py-2 py-lg-4">
        <div class="container pb-5">
            <div class="row ">
                <div class="col-12 ">
                    <div class="d-flex flex-column align-items-center mb-4">
                        <div class="col-6 col-md-4 col-lg-3 d-flex flex-column align-items-center">
                            <span class="alg-text-blue mt-1 fw-bolder alg-text-h2 pb-1">ABOUT US</span>
                            <div class="alg-line1 alg-bg-blue d-flex align-self-center"></div>
                            <div class="alg-line2 alg-bg-blue d-flex align-self-center"></div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center pt-3">
                        <div class="col-8 col-lg-3 bg-white d-flex justify-content-center align-items-center rounded-1 alg-shadow">
                            <!-- <img src="./resources/image/home/about_us.jpg" class="img-fluid" alt="about_us_img" /> -->
                            <div class="abt-us"></div>
                        </div>
                        <div class="col-12 col-lg-7 d-flex justify-content-center pt-5 pt-lg-0">
                            <div class="col-8 ">
                                <p class="alg-text-h3 abt-txt-alin">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor aspernatur corporis error, iusto tenetur natus voluptates hic at rem repudiandae sint, omnis aliquam itaque corrupti, laborum quae earum nisi rerum officia quos eligendi quod. Autem aliquam saepe nesciunt. Magni nam quod quasi! Suscipit, officiis ullam odio pariatur temporibus quasi tempore amet laborum tempora minima ut dolorum quos excepturi beatae consequatur? Modi eaque corporis delectus, voluptatum quasi dolorum! Perferendis, reprehenderit accusamus?
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor aspernatur corporis error, iusto tenetur natus voluptates hic at rem repudiandae sint, omnis aliquam itaque corrupti, laborum quae earum nisi rerum officia quos eligendi quod. Autem aliquam saepe nesciunt. Magni nam quod quasi! Suscipit, officiis ullam odio pariatur temporibus quasi tempore amet laborum tempora minima ut dolorum quos excepturi beatae consequatur? Modi eaque corporis delectus, voluptatum quasi dolorum! Perferendis, reprehenderit accusamus?
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- why chose us -->

    <section class="WCU-s w-100 py-2 py-lg-5">
        <div class="container ">
            <div class="d-flex flex-column align-items-center mb-4">
                <div class="col-6 col-md-4 col-lg-3 d-flex flex-column align-items-center">
                    <span class="alg-text-blue mt-1 fw-bolder alg-text-h2 pb-1">WHY CHOOSE US</span>
                    <div class="alg-line1 alg-bg-blue d-flex align-self-center"></div>
                    <div class="alg-line2 alg-bg-blue d-flex align-self-center"></div>
                </div>
            </div>
            <div class="w-100 d-flex justify-content-center p-1 p-lg-3 gap-3 gap-lg-5 pb-5">
                <div class="WCU-s1-sBox alg-shadow d-flex flex-column justify-content-center align-items-center rounded-2 gap-4 text-center">
                    <div class="w-100 ">
                        <img src="resources/image/home/test.jpeg" alt="" class="WCU-s1-image">
                    </div>
                    <div class="w-100 WCU-s1-box-para text-primary fw-bold">Accuracy</div>
                </div>
                <div class="WCU-s1-sBox alg-shadow  d-flex flex-column justify-content-center align-items-center rounded-2 gap-4 text-center">
                    <div class="w-100 ">
                        <img src="resources/image/home/test.jpeg" alt="" class="WCU-s1-image">
                    </div>
                    <div class="w-100 WCU-s1-box-para text-primary fw-bold">Accuracy</div>
                </div>
                <div class="WCU-s1-sBox alg-shadow  d-flex flex-column justify-content-center align-items-center rounded-2 gap-4 text-center">
                    <div class="w-100  ">
                        <img src="resources/image/home/test.jpeg" alt="" class="WCU-s1-image">
                    </div>
                    <div class="w-100 WCU-s1-box-para text-primary fw-bold">Accuracy</div>
                </div>

            </div>
        </div>
    </section>


    <!--review section  -->
    <section class="alg-bg-light-blue py-4">
        <div class="container review-section-container">
            <div class="d-flex flex-column align-items-center mb-4">
                <div class="col-6 col-md-4 col-lg-3 d-flex flex-column align-items-center">
                    <span class="alg-text-blue mt-1 fw-bolder alg-text-h2 pb-1">REVIEW</span>
                    <div class="alg-line1 alg-bg-blue d-flex align-self-center"></div>
                    <div class="alg-line2 alg-bg-blue d-flex align-self-center"></div>
                </div>
            </div>
            <!-- Swiper -->
            <div class="review-section-b swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="review-section-b swiper-slide rounded-5">
                        <div class="review-bo p-5 w-100 h-100 d-flex flex-column justify-content-center align-items-center">
                            <div class="w-100 p-5 bg-light rounded-top"><span class="alg-text-h1 fw-bold">"</span>Lorem ipsum dolor sit amet consectetur adipisicing elit.<span class="alg-text-h1 fw-bold">"</span></div>
                            <div class="w-100 bg-light text-center p-2 rounded-bottom">nimal</div>
                        </div>
                    </div>
                    <div class="review-section-b swiper-slide rounded-5">
                        <div class="review-bo p-5 w-100 h-100 d-flex flex-column justify-content-center align-items-center">
                            <div class="w-100 p-5 bg-light rounded-top"><span class="alg-text-h1 fw-bold">"</span>Lorem ipsum dolor sit amet consectetur adipisicing elit.<span class="alg-text-h1 fw-bold">"</span></div>
                            <div class="w-100 bg-light text-center p-2 rounded-bottom">kamal</div>
                        </div>
                    </div>
                    <div class="review-section-b swiper-slide rounded-5">
                        <div class="review-bo p-5 w-100 h-100 d-flex flex-column justify-content-center align-items-center">
                            <div class="w-100 p-5 bg-light rounded-top"><span class="alg-text-h1 fw-bold">"</span>Lorem ipsum dolor sit amet consectetur adipisicing elit.<span class="alg-text-h1 fw-bold">"</span></div>
                            <div class="w-100 bg-light text-center p-2 rounded-bottom">malindu</div>
                        </div>
                    </div>
                </div>
                <div class="swiper-button-next text-black-50"></div>
                <div class="swiper-button-prev text-black-50"></div>
            </div>
        </div>
    </section>

    <!-- brands -->
    <div class="container pb-5 py-4">
        <div class="d-flex flex-column align-items-center mb-4">
            <div class="col-6 col-md-4 col-lg-3 d-flex flex-column align-items-center">
                <span class="alg-text-blue mt-1 fw-bolder alg-text-h2 pb-1">BRAND WE TRUST</span>
                <div class="alg-line1 alg-bg-blue d-flex align-self-center"></div>
                <div class="alg-line2 alg-bg-blue d-flex align-self-center"></div>
            </div>
        </div>
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




    <!-- footer -->
    <?php include("./pages/components/footer.php") ?>


    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.0.9/dist/js/splide.min.js"></script>
</body>