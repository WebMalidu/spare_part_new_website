<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <!-- splide -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.0.9/dist/css/splide.min.css">
    <!-- css -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/style.css">


    <!-- js -->
    <script defer src="js/bootstrap.bundle.js"></script>
    <script defer src="js/script.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>


</head>

<body>
    <!-- header section-->

    <?php include("header.php") ?>
    
    <!--catergory section  -->
    <?php include("interfaces/category.php") ?>


    <!-- search section -->
    <section class="w-100 searchSection">
        <div class="container searchSection-mainContainer ">
            <div class="searchSection-header text-center fs-2 text-light fw-bold">Search by Vehical</div>
            <div class="searchSection-selectorBox d-flex gap-2 p-3 justify-content-center">
                <div>
                    <select class="searchSection-selector form-select form-select-sm" aria-label="Small select example">
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
                <div>
                    <select class="searchSection-selector  form-select form-select-sm" aria-label="Small select example">
                        <option selected>Select Model Line</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div>
                    <select class="searchSection-selector form-select form-select-sm" aria-label="Small select example">
                        <option selected>Select Year</option>
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
                <div>
                    <select class="searchSection-selector form-select form-select-sm" aria-label="Small select example">
                        <option selected>Select Modification</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div>
                    <button class="rounded-2 border-0 fw-bold text-light searchSection-button p-2">SEARCH PARTS</button>
                </div>
            </div>
        </div>
    </section>



    <?php include("interfaces/offerSection.php") ?>




    <!-- Why Choose Us secction -->
    <section class=" WCU-s1 w-100">
        <div class="container ">
            <div class="WCU-s1-upperBox w-100 text-light fw-bold fs-2 text-center">
                <p>Why Choose Us</p>
            </div>
            <div class="WCU-s1-bottomBox w-100 d-flex justify-content-center p-3 gap-5">
                <div class="WCU-s1-sBox d-flex flex-column justify-content-center align-items-center rounded-2 gap-4 text-center">
                    <div class="w-100 ">
                        <img src="resources/image/home/test.jpeg" alt="" class="WCU-s1-image">
                    </div>
                    <div class="w-100 WCU-s1-box-para text-primary fw-bold">Accuracy</div>
                </div>
                <div class="WCU-s1-sBox d-flex flex-column justify-content-center align-items-center rounded-2 gap-4 text-center">
                    <div class="w-100 ">
                        <img src="resources/image/home/test.jpeg" alt="" class="WCU-s1-image">
                    </div>
                    <div class="w-100 WCU-s1-box-para text-primary fw-bold">Accuracy</div>
                </div>
                <div class="WCU-s1-sBox d-flex flex-column justify-content-center align-items-center rounded-2 gap-4 text-center">
                    <div class="w-100  ">
                        <img src="resources/image/home/test.jpeg" alt="" class="WCU-s1-image">
                    </div>
                    <div class="w-100 WCU-s1-box-para text-primary fw-bold">Accuracy</div>
                </div>

            </div>
        </div>
    </section>



    <!-- Review section -->
    <section class="review-section">
        <div class="container review-section-container">
            <div class="review-header text-light fs-2 fw-bold">Review</div>
            <!-- Swiper -->
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="review-box p-5 w-100 h-100 d-flex flex-column justify-content-center align-items-center">
                            <div class="w-100 p-5 bg-light">Lorem ipsum dolor sit amet consectetur adipisicing elit.</div>
                            <div class="w-100 bg-light text-center p-2">malindu</div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="review-box p-5 w-100 h-100 d-flex flex-column justify-content-center align-items-center">
                            <div class="w-100 p-5 bg-light">Lorem ipsum dolor sit amet consectetur adipisicing elit. </div>
                            <div class="w-100 bg-light text-center p-2">Daham</div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="review-box p-5 w-100 h-100 d-flex flex-column justify-content-center align-items-center">
                            <div class="w-100 p-5 bg-light">Lorem ipsum dolor sit amet consectetur adipisicing elit.</div>
                            <div class="w-100 bg-light text-center p-2">madusha</div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="review-box p-5 w-100 h-100 d-flex flex-column justify-content-center align-items-center">
                            <div class="w-100 p-5 bg-light">Lorem ipsum dolor sit amet consectetur adipisicing elit.</div>
                            <div class="w-100 bg-light text-center p-2">nirmal</div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="review-box p-5 w-100 h-100 d-flex flex-column justify-content-center align-items-center">
                            <div class="w-100 p-5 bg-light">Lorem ipsum dolor sit amet consectetur adipisicing elit.</div>
                            <div class="w-100 bg-light text-center p-2">janith</div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="review-box p-5 w-100 h-100 d-flex flex-column justify-content-center align-items-center">
                            <div class="w-100 p-5 bg-light">Lorem ipsum dolor sit amet consectetur adipisicing elit.</div>
                            <div class="w-100 bg-light text-center p-2">kavindu</div>
                        </div>
                    </div>
                </div>
                <div class="swiper-button-next text-light"></div>
                <div class="swiper-button-prev text-light"></div>
            </div>
        </div>
    </section>


    <!-- Brand we trust section -->

    <section>
        <div class="container pb-3">
            <h1 class="py-2  fw-bold" style="color: #00447B;">Brand We Trust</h1>
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
    </section>



    <footer style="background-color: #002848;">
        <div class="container">
            <div class="row">
                <div class="col-sm ">
                    <img src="resources/image/logo.png" alt="" srcset="" class="my-5 w-75">
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
                    </div>
                </div>
            </div>
        </div>
    </footer>



    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.0.9/dist/js/splide.min.js"></script>
</body>