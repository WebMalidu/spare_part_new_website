<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>single Page View</title>

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <!-- splide -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.0.9/dist/css/splide.min.css">
    <!-- css -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alegreya:wght@500&family=Lato:wght@300&family=Roboto&family=Rubik&display=swap" rel="stylesheet">


    <!-- js -->
    <script defer src="js/bootstrap.bundle.js"></script>
    <script defer src="js/script.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>


</head>

<body>


    <div class="container ">
        <!-- section 1 (spv-s1) -->
        <section class="spv-s1  gap-5">
            <!-- images sector -->
            <div class="">
                <div class="spv-s1-img-box alg-bg-light-blue d-flex justify-content-center align-items-center ">
                    <div class="spv-s1-img"></div>
                </div>
                <div class="d-flex flex-row gap-3 py-3">
                    <div class="spv-s1-img-sbox d-flex justify-content-center align-items-center">
                        <div class="spv-s1-simg"></div>
                    </div>
                    <div class="spv-s1-img-sbox d-flex justify-content-center align-items-center">
                        <div class="spv-s1-simg"></div>
                    </div>
                    <div class="spv-s1-img-sbox d-flex justify-content-center align-items-center">
                        <div class="spv-s1-simg"></div>
                    </div>
                    <div class="spv-s1-img-sbox d-flex justify-content-center align-items-center">
                        <div class="spv-s1-simg"></div>
                    </div>
                </div>
            </div>
            <!-- details sector -->
            <div class="spv-s1-right">
                <div class="d-flex flex-row gap-3">
                    <div class="spv-s1-right-logo"></div>
                    <div class="d-flex flex-column">
                        <span class="alg-text-h2 alg-bold">NISSAN</span>
                        <span class="alg-text-h3 alg-text-blue alg-bold-medium">DISTRIBUTION CONTROL UNIT</span>
                        <div class="spv-s1-review-img"></div>
                    </div>
                </div>
                <div>
                    <span class="alg-bold alg-text-h3">Rs. 120,000</span>
                </div>
                <div class="d-flex flex-column py-2">
                    <span class="alg-text-yellow alg-text-h3">Currently Unavailable</span>
                    <span class="alg-bold alg-text-h3">We don't know when or if this item will be back in stock</span>
                </div>
                <div class="d-flex flex-column py-2">
                    <span class="alg-text-p alg-text-blue alg-bold">Seller Name : Sirimal Kaldera</span>
                    <span class="alg-text-h3">Brand Name : Jalthara Production</span>
                </div>
                <div class="">
                    <span class="alg-text-yellow alg-text-p alg-bold">Compatibility :</span>
                    <div class="d-flex flex-row">
                        <div class="w-50 d-flex flex-column ">
                            <span class="alg-text-h3">Car Market : HONDA</span>
                            <span class="alg-text-h3">Year : 2018</span>
                            <div class="py-2 d-flex flex-column">
                                <span class="alg-text-blue alg-text-h3">Part Number : ZRK3KS452 </span>
                                <span class="alg-text-blue alg-text-h3">Class : Timing Belt </span>
                            </div>
                        </div>
                        <div class="d-flex flex-column">
                            <span class="alg-text-h3">Model Line : FIT GP - 1</span>
                            <span class="alg-text-h3">Modification : 1.6L </span>
                            <span class="py-2 alg-text-blue alg-text-h3">Origin : Aftermarket </span>
                        </div>
                    </div>
                </div>
                <div class="py-2">
                    <div class="spv-s1-right-vehicleImg"></div>
                </div>
                <div>
                    <button class="spv-s1-right-button border-0 alg-bg-green alg-text-light alg-rounded-small spv-s1-right-button1 alg-text-h3">Add to Card</button>
                    <button class="spv-s1-right-button alg-rounded-small border-5 alg-text-green spv-s1-right-button2 alg-text-h3">Add Watchlist</button>
                </div>
            </div>
        </section>

        <!-- section 2 (spv-s2) featured product-->
        <section class="">
            <div class="d-flex p-4">
                <span class="spv-s2-heading alg-text-h2 alg-text-blue alg-bolder">Featured Product</span>
            </div>
            <div>
                <!-- swper slider -->
                <div class="spv-s2 swiper mySwiper p-3 ">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide gap-5">
                            <div class="spv-s2-container alg-rounded-small alg-shadow">
                                <div class="spv-s2-box-top d-flex justify-content-center align-items-center">
                                    <div class="spv-s2-box-top-img"></div>
                                </div>
                                <div class="spv-s2-box-bottom d-flex flex-column align-items-start alg-bg-dark-blue p-2">
                                    <span class="alg-text-light alg-bolder alg-text-h3">Product Name</span>
                                    <span class="alg-text-light alg-text-h3">Rs.4500</span>
                                    <div class="spv-s2-box-bottom-img"></div>
                                </div>
                            </div>

                            <div class="spv-s2-container spv-s2-container-2 alg-rounded-small alg-shadow">
                                <div class="spv-s2-box-top d-flex justify-content-center align-items-center">
                                    <div class="spv-s2-box-top-img"></div>
                                </div>
                                <div class="spv-s2-box-bottom d-flex flex-column align-items-start alg-bg-dark-blue p-2">
                                    <span class="alg-text-light alg-bolder alg-text-h3">Product Name</span>
                                    <span class="alg-text-light alg-text-h3">Rs.4500</span>
                                    <div class="spv-s2-box-bottom-img"></div>
                                </div>
                            </div>
                            <div class="spv-s2-container spv-s2-container-3 alg-rounded-small alg-shadow">
                                <div class="spv-s2-box-top d-flex justify-content-center align-items-center">
                                    <div class="spv-s2-box-top-img"></div>
                                </div>
                                <div class="spv-s2-box-bottom d-flex flex-column align-items-start alg-bg-dark-blue p-2">
                                    <span class="alg-text-light alg-bolder alg-text-h3">Product Name</span>
                                    <span class="alg-text-light alg-text-h3">Rs.4500</span>
                                    <div class="spv-s2-box-bottom-img"></div>
                                </div>
                            </div>
                            <div class="spv-s2-container spv-s2-container-4 alg-rounded-small alg-shadow">
                                <div class="spv-s2-box-top d-flex justify-content-center align-items-center">
                                    <div class="spv-s2-box-top-img"></div>
                                </div>
                                <div class="spv-s2-box-bottom d-flex flex-column align-items-start alg-bg-dark-blue p-2">
                                    <span class="alg-text-light alg-bolder alg-text-h3">Product Name</span>
                                    <span class="alg-text-light alg-text-h3">Rs.4500</span>
                                    <div class="spv-s2-box-bottom-img"></div>
                                </div>
                            </div>
                        </div>
                        <!-- slider 2nd section -->
                        <div class="swiper-slide gap-5">
                            <div class="spv-s2-container alg-rounded-small alg-shadow">
                                <div class="spv-s2-box-top d-flex justify-content-center align-items-center">
                                    <div class="spv-s2-box-top-img"></div>
                                </div>
                                <div class="spv-s2-box-bottom d-flex flex-column align-items-start alg-bg-dark-blue p-2">
                                    <span class="alg-text-light alg-bolder alg-text-h3">Product Name</span>
                                    <span class="alg-text-light alg-text-h3">Rs.4500</span>
                                    <div class="spv-s2-box-bottom-img"></div>
                                </div>
                            </div>

                            <div class="spv-s2-container spv-s2-container-2 alg-rounded-small alg-shadow">
                                <div class="spv-s2-box-top d-flex justify-content-center align-items-center">
                                    <div class="spv-s2-box-top-img"></div>
                                </div>
                                <div class="spv-s2-box-bottom d-flex flex-column align-items-start alg-bg-dark-blue p-2">
                                    <span class="alg-text-light alg-bolder alg-text-h3">Product Name</span>
                                    <span class="alg-text-light alg-text-h3">Rs.4500</span>
                                    <div class="spv-s2-box-bottom-img"></div>
                                </div>
                            </div>
                            <div class="spv-s2-container spv-s2-container-3 alg-rounded-small alg-shadow">
                                <div class="spv-s2-box-top d-flex justify-content-center align-items-center">
                                    <div class="spv-s2-box-top-img"></div>
                                </div>
                                <div class="spv-s2-box-bottom d-flex flex-column align-items-start alg-bg-dark-blue p-2">
                                    <span class="alg-text-light alg-bolder alg-text-h3">Product Name</span>
                                    <span class="alg-text-light alg-text-h3">Rs.4500</span>
                                    <div class="spv-s2-box-bottom-img"></div>
                                </div>
                            </div>
                            <div class="spv-s2-container spv-s2-container-4 alg-rounded-small alg-shadow">
                                <div class="spv-s2-box-top d-flex justify-content-center align-items-center">
                                    <div class="spv-s2-box-top-img"></div>
                                </div>
                                <div class="spv-s2-box-bottom d-flex flex-column align-items-start alg-bg-dark-blue p-2">
                                    <span class="alg-text-light alg-bolder alg-text-h3">Product Name</span>
                                    <span class="alg-text-light alg-text-h3">Rs.4500</span>
                                    <div class="spv-s2-box-bottom-img"></div>
                                </div>
                            </div>
                        </div>
                        <!-- slider 3rd section -->
                        <div class="swiper-slide gap-5">
                            <div class="spv-s2-container alg-rounded-small alg-shadow">
                                <div class="spv-s2-box-top d-flex justify-content-center align-items-center">
                                    <div class="spv-s2-box-top-img"></div>
                                </div>
                                <div class="spv-s2-box-bottom d-flex flex-column align-items-start alg-bg-dark-blue p-2">
                                    <span class="alg-text-light alg-bolder alg-text-h3">Product Name</span>
                                    <span class="alg-text-light alg-text-h3">Rs.4500</span>
                                    <div class="spv-s2-box-bottom-img"></div>
                                </div>
                            </div>

                            <div class="spv-s2-container spv-s2-container-2 alg-rounded-small alg-shadow">
                                <div class="spv-s2-box-top d-flex justify-content-center align-items-center">
                                    <div class="spv-s2-box-top-img"></div>
                                </div>
                                <div class="spv-s2-box-bottom d-flex flex-column align-items-start alg-bg-dark-blue p-2">
                                    <span class="alg-text-light alg-bolder alg-text-h3">Product Name</span>
                                    <span class="alg-text-light alg-text-h3">Rs.4500</span>
                                    <div class="spv-s2-box-bottom-img"></div>
                                </div>
                            </div>
                            <div class="spv-s2-container spv-s2-container-3 alg-rounded-small alg-shadow">
                                <div class="spv-s2-box-top d-flex justify-content-center align-items-center">
                                    <div class="spv-s2-box-top-img"></div>
                                </div>
                                <div class="spv-s2-box-bottom d-flex flex-column align-items-start alg-bg-dark-blue p-2">
                                    <span class="alg-text-light alg-bolde alg-text-h3">Product Name</span>
                                    <span class="alg-text-light alg-text-h3">Rs.4500</span>
                                    <div class="spv-s2-box-bottom-img"></div>
                                </div>
                            </div>
                            <div class="spv-s2-container spv-s2-container-4 alg-rounded-small alg-shadow">
                                <div class="spv-s2-box-top d-flex justify-content-center align-items-center">
                                    <div class="spv-s2-box-top-img"></div>
                                </div>
                                <div class="spv-s2-box-bottom d-flex flex-column align-items-start alg-bg-dark-blue p-2">
                                    <span class="alg-text-light alg-bolder alg-text-h3">Product Name</span>
                                    <span class="alg-text-light alg-text-h3">Rs.4500</span>
                                    <div class="spv-s2-box-bottom-img"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="swiper-button-next "></div>
                    <div class="swiper-button-prev "></div>
                </div>
            </div>
        </section>
    </div>
    <!-- section 3 Features and Specification -->
    <section class="spv-s3 alg-bg-dark-blue p-4">
        <div class="container">
            <div class="spv-s3-heading-box">
                <span class="alg-text-h2 alg-text-light alg-bolder">Features and Specification</span>
            </div>
            <div class="d-flex flex-row justify-content-between p-3 alg-text-light">
                <div class="d-flex flex-column gap-3">
                    <div class="d-flex flex-row gap-1">
                        <div class="alg-bolder alg-text-h3">Number of Teeth</div>
                        <div class=" alg-text-h3">(101)</div>
                    </div>
                    <div>
                        <div class="alg-bolder">Material</div>
                        <div class="alg-text-h3">Highly Saturated Nitrile</div>
                    </div>
                </div>
                <div class="d-flex flex-column gap-3">
                    <div class="d-flex flex-row gap-1">
                        <div class="alg-bolder alg-text-h3">Net Quantity</div>
                        <div class="alg-text-h3">(1)</div>
                    </div>
                    <div>
                        <div class="alg-bolder alg-text-h3">Fitting place</div>
                        <div class="alg-text-h3 alg-text-h3">Belt Drive</div>
                    </div>
                </div>
                <div class="d-flex flex-column gap-3">
                    <div class="d-flex flex-row gap-1">
                        <div class="alg-bolder alg-text-h3">Width [mm]</div>
                        <div class="alg-text-h3">(50)</div>
                    </div>
                    <div>
                        <div class="alg-bolder alg-text-h3">Manufacturer</div>
                        <div class="alg-text-h3 alg-text-h3">Optibelt Power
                            </br>Transmission <br>India Pvt. Ltd.</div>
                    </div>
                </div>

            </div>

            <div class="d-flex flex-row justify-content-between p-3 alg-text-light">


                </div>
            </div>
    </section>



    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.0.9/dist/js/splide.min.js"></script>
</body>