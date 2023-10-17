<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BATTA user profile</title>
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
    <script defer src="js/bootstrap.bundle.js"></script>
    <script defer src="js/script.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

</head>

<body>
    <section>
        <?php include("./pages/components/header.php") ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-2 d-flex flex-column align-items-center profile-bg-gradient pt-5 pb-4 alg-text-h3 d-none d-md-block min-vh-100">
                    <div class="bg-white text-center w-75 p-1 rounded-1 alg-font-dark-blue fw-semibold mb-4 alg-cursor" onclick="viewChange(1);"><span>Profile</span></div>
                    <div class="bg-white text-center w-75 p-1 rounded-1 alg-font-dark-blue fw-semibold alg-cursor" onclick="viewChange(2);"><span>Purchase History</span></div>
                </div>

                <div class="col-12 col-md-10 d-flex flex-column p-3" id="profile_view">
                    <div class="row d-flex justify-content-between text-center">
                        <span class="text-center col-5 col-md-2 alg-bg-dark-blue p-1 mx-lg-5 text-white rounded-1  alg-text-h3 fw-bold" onclick="viewChange(1);">Profile</span>
                        <span class="col-5 d-md-none d-block alg-bg-dark-blue opacity-75 p-1 text-white rounded-1 text-center alg-text-h3" onclick="viewChange(2);">Purchase History</span>
                    </div>
                    <div class="row d-flex flex-column flex-lg-row align-items-center pb-4 mt-4 m-0">
                        <div class="col-12 col-lg-4">
                            <div class="d-flex justify-content-center">
                                <img src="resources/image/profile.png" class="profile-img" alt="profile_img" />
                            </div>
                        </div>
                        <div class="col-7 col-lg-4 d-flex flex-column gap-2 pt-4 pt-lg-0 p-0 m-0">
                            <input type="text" class="alg-input alg-bg-light-blue p-1 px-2 alg-text-h3 text-center" value="Nimal Perera" id="name" />
                            <input type="email" class="alg-input alg-bg-light-blue p-1 px-2 alg-text-h3 text-center" value="nimal@gmail.com" id="email" />
                            <input type="text" class="alg-input alg-bg-light-blue p-1 px-2 alg-text-h3 text-center" value="0775421456" id="mobile" />
                        </div>
                    </div>
                    <div class="alg-text-h3 mt-3 ms-lg-4">
                        <span class="fw-bold">Address line one</span><br />
                        <input type="text" class="col-12 col-lg-8 alg-input alg-bg-light-blue p-2 px-2 alg-text-h3 alg-bg-light-blue" id="address_one" />
                    </div>
                    <div class="alg-text-h3 mt-3 ms-lg-4">
                        <span class="fw-bold">Address line two</span><br />
                        <input type="text" class="col-12 col-lg-8 alg-input alg-bg-light-blue p-2 px-2 alg-text-h3 alg-bg-light-blue" id="address_one" />
                    </div>
                    <div class="alg-text-h3 mt-3 ms-lg-4">
                        <span class="fw-bold">City</span><br />
                        <input type="text" class="col-12 col-lg-8 alg-input alg-bg-light-blue p-2 px-2 alg-text-h3 alg-bg-light-blue" id="address_one" />
                    </div>
                    <div class="alg-text-h3 mt-3 ms-lg-4">
                        <span class="fw-bold">Province</span><br />
                        <input type="text" class="col-12 col-lg-8 alg-input alg-bg-light-blue p-2 px-2 alg-text-h3 alg-bg-light-blue" id="address_one" />
                    </div>
                    <div class="alg-text-h3 mt-3 ms-lg-4">
                        <span class="fw-bold">Postal Code</span><br />
                        <input type="text" class="col-12 col-lg-8 alg-input alg-bg-light-blue p-2 px-2 alg-text-h3 alg-bg-light-blue" id="address_one" />
                    </div>

                    <div class="col-12 col-lg-8 d-flex justify-content-between mt-3 alg-text-h3 pt-2 pb-5 ps-lg-4">
                        <button class="profile-button px-4 alg-text-dark-blue button">Update Details</button>
                        <button class="profile-button px-4 alg-text-dark-blue button" onclick="openPasswordModel();">Change Password</button>
                    </div>
                </div>


                <!-- purchase history -->
                <div class="col-12 col-md-8 d-flex ms-md-5 flex-column d-none" id="purchasing_view">
                    <div class="row d-flex justify-content-between text-center mt-5 mb-4 mb-5 px-3 px-lg-0">
                        <span class="col-5 col-md-4 alg-bg-dark-blue p-1 text-white rounded-1 fw-bold" onclick="viewChange(2);">Purchasing History</span>
                        <span class="col-2 d-md-none d-block alg-bg-dark-blue opacity-75 p-1 text-white rounded-1 alg-text-h3 fw-bold" onclick="viewChange(1);">Profile</span>
                    </div>

                    <div>
                        <div class="d-flex justify-content-around alg-bg-blue text-white purchase-shadow alg-text-h3 p-1 rounded-1">
                            <span>Item name</span>
                            <span class="d-none d-lg-block">Qty</span>
                            <span>Price</span>
                            <span>Order date</span>
                            <span>Delivery date</span>
                            <span>Status</span>
                        </div>
                        <?php
                        for ($x = 0; $x < 4; $x++) {
                        ?>
                            <div class="d-flex justify-content-around alg-bg-light-blue my-4 alg-text-h3 purchase-shadow align-self-center rounded-1 p-1">
                                <span class="d-none d-lg-block">Item 1</span>
                                <span class="d-lg-none d-block">Item 1 (3)</span>
                                <span class="d-none d-lg-block px-5">3</span>
                                <span>Rs.1500</span>
                                <span>2023-08-29</span>
                                <span>2023-09-04</span>
                                <span>Delivered</span>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>


<!-- password model -->
        <div class="modal fade" id="passwordModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">


                <div class="modal-content">
                    <div class="modal-header alg-bg-light-blue">
                        <span class="modal-title alg-text-h2 alg-text-dark-blue fw-bold mx-3" id="staticBackdropLabel">Update Password</span>
                        <button type="button" class="border-0 alg-bg-light-blue" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-square-fill fs-2"></i></button>
                    </div>

                    <div class="modal-body bg-white">

                        <div class="px-4">
                            <!-- <div class="text-center col-12"><span class="alg-text-h3 fw-bold">Update Password</span></div> -->
                            <div class="row">
                                <div class="alg-text-h3 mt-3 ms-lg-4">
                                    <span class="fw-bold">Old Password</span><br />
                                    <input type="text" class="col-10 alg-input alg-bg-light-blue p-2 px-2 alg-text-h3 alg-bg-light-blue" id="address_one" />
                                </div>
                                <div class="alg-text-h3 mt-3 ms-lg-4">
                                    <span class="fw-bold">New Password</span><br />
                                    <input type="text" class="col-10 alg-input alg-bg-light-blue p-2 px-2 alg-text-h3 alg-bg-light-blue" id="address_one" />
                                </div>
                                <div class="alg-text-h3 mt-3 ms-lg-4">
                                    <span class="fw-bold">Confirm Password</span><br />
                                    <input type="text" class="col-10 alg-input alg-bg-light-blue p-2 px-2 alg-text-h3 alg-bg-light-blue" id="address_one" />
                                </div>
                                <div class="text-center col-12 mt-3">
                                    <button class="profile-button px-4 alg-text-dark-blue button">Save</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include("./pages/components/footer.php") ?>
</body>

</html>