<?php
if (!isset($_GET["parts_id"], $_GET['vh_category_item_id'], $_GET['vh_model_id'])) {
    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>single Page View</title>
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
    <script defer src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script defer src="js/bootstrap.bundle.js"></script>
    <script defer src="js/script.js"></script>
    <script defer src="js/slider.js"></script>
    <script defer src="js/singleProduct.js"></script>
    <script defer src="./js/product.js"></script>
    <script defer src="js/toast.js"></script>


</head>

<body data-parts_id="<?php echo $_GET['parts_id'] ?>" data-vh_category_item_id="<?php echo $_GET['vh_category_item_id'] ?>" data-vh_model_id="<?php echo $_GET['vh_model_id'] ?>">

    <!-- header section-->

    <?php include("./pages/components/header.php") ?>


    <div class="container">
        <!-- section 1 (spv-s1) -->
        <section class="spv-s1  gap-5 p-3">
            <!-- images sector -->
            <div class="spv-s1-left">
                <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper spv-mySwiper2">
                    <div class="swiper-wrapper" id="singleProductSliderMainContainer">
                        <div class="swiper-slide">
                            <div style="background-color: gray; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">loading...</div>
                        </div>
                        <div class="swiper-slide">
                            <div style="background-color: gray; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">loading...</div>
                        </div>
                        <div class="swiper-slide">
                            <div style="background-color: gray; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">loading...</div>
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
                <div thumbsSlider="" class="swiper spv-mySwiper">
                    <div class="swiper-wrapper" id="singleProductSliderSecondaryContainer">
                        <div class="swiper-slide">
                            <div style="background-color: gray; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">loading...</div>
                        </div>
                        <div class="swiper-slide">
                            <div style="background-color: gray; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">loading...</div>
                        </div>
                        <div class="swiper-slide">
                            <div style="background-color: gray; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">loading...</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- details sector -->
            <div class="spv-s1-right">
                <div class="W-100 d-flex flex-row gap-3">
                    <div class="log-image-container">
                        <img src="../resources/image/singleViewPage/nissan.png" class="w-75 h-75">
                    </div>
                    <div class="d-flex flex-column">
                        <span class="alg-text-h2 alg-bold" id="modelMaker"></span>
                        <span class="alg-text-h3 alg-text-blue alg-bold-medium" id="productTitle"></span>
                        <div class="spv-s1-review-img"></div>
                    </div>
                </div>
                <div>
                    <span class="alg-bold alg-text-h3" id="price"></span>
                </div>
                <div class="d-flex flex-column py-2">
                    <span class="alg-text-yellow alg-text-h3" id="qtyContainer"></span>
                    <span class="alg-bold alg-text-h3">more product come back soon in stock</span>
                </div>
                <div class="d-flex flex-column py-2">
                    <span class="alg-text-p alg-text-blue alg-bold" id="sellerName"></span>
                    <span class="alg-text-h3" id="brandName"></span>
                </div>
                <div class="w-100 gap-2">
                    <span class="alg-text-yellow alg-text-p alg-bold">Compatibility :</span>
                    <div class="d-flex flex-row">
                        <div class="w-50 d-flex flex-column ">
                            <span class="alg-text-h3" id="carMaker"></span>
                            <span class="alg-text-h3" id="carYear"></span>
                            <div class="py-2 d-flex flex-column">
                                <span class="alg-text-blue alg-text-h3" id="ProductId"></span>
                                <span class="alg-text-blue alg-text-h3" id="categotyItemName"></span>
                            </div>
                        </div>
                        <div class="d-flex flex-column">
                            <span class="alg-text-h3" id="carModel"></span>
                            <span class="alg-text-h3" id="carModelLine"></span>
                            <span class="py-2 alg-text-blue alg-text-h3" id="carOrigin"></span>
                        </div>
                    </div>
                </div>
                <div class="py-2">
                    <div class="spv-s1-right-vehicleImg"></div>
                </div>
                <div>
                    <button class="spv-s1-right-button border-0 alg-bg-green alg-text-light alg-rounded-small spv-s1-right-button1 alg-text-h3">Add to Card</button>
                    <button class="spv-s1-right-button alg-rounded-small border-5 alg-text-green spv-s1-right-button2 alg-text-h3" onclick="addWatchlist('<?php echo htmlspecialchars($_GET['parts_id']); ?>')">Add Watchlist</button>
                </div>
            </div>
        </section>

        <!-- section 2 (spv-s2) featured product-->
        <section class="py-5">
            <div class="d-flex p-2">
                <span class="spv-s2-heading alg-text-h2 alg-text-blue alg-bolder">Featured Product</span>
            </div>
            <!-- swiper feture product slider -->
            <div class="swiperCategory swiper single-product-Swiper">
                <div class="swiper-wrapper pt-2 pb-2" id="productSliders">
                    <!-- slider goes here -->

                </div>
            </div>
        </section>
    </div>
    <!-- section 3 Features and Specification -->
    <section class="spv-s3 py-4 alg-bg-light-blue">
        <div class="container">
            <div class="spv-s3-heading-box">
                <span class="alg-text-h2 alg-text-dark-blue alg-bolder">Features and Specification</span>
            </div>
            <div class="d-flex flex-row justify-content-between py-4  alg-text-b">
                <div class="d-flex flex-column gap-3 alg-bolder" id="descriptionContainer">
                    <!-- content goes here -->
                </div>
            </div>
            <div class="d-flex flex-row justify-content-between p-3 alg-text-light">
            </div>
        </div>
    </section>

    <!-- toast container -->
    <div id="toastContainer"></div>
    <!-- footer -->
    <?php include("./pages/components/footer.php") ?>


    <!-- <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.0.9/dist/js/splide.min.js"></script>


</body>