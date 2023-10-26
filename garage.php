<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" href="resources/image/home/engineImage.png" />

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

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
    <script defer src="js/vehicleFetchData.js"></script>
    <script defer src="js/garage.js"></script>
</head>

<body style="min-height: 100vh;">
    <?php include("./pages/components/header.php") ?>

    <section>
        <div class="container">
            <div class="pt-2 pt-md-4">
                <span class="fs-4 alg-text-blue fw-bold">My Garage</span>
            </div>
            <div class="d-flex justify-content-center py-3 py-md-5 position-relative">
                <div class="col-10">
                    <div class="d-flex justify-content-center gap-3 gap-md-4 flex-wrap" id="garage">
                        <div class="d-flex flex-column align-items-center justify-content-center garge-box-hei">
                            <img src="resources/image/car.jpg" class="position-absolute garage-lg-car opacity-25" alt="">
                            <p class="alg-text-h3">Add your car for quick checkup what you need</p>
                            <button class="w-50 main-btn-1 alg-bg-blue rounded-1 alg-text-h3 alg-button-hover fw-bold px-3" onclick="openGarageModel();">Add Your Car</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- garage model -->

    <div class="modal fade" id="garageModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">


            <div class="modal-content">
                <div class="modal-header alg-bg-light-blue">
                    <span class="modal-title alg-text-h2 alg-text-dark-blue fw-bold mx-3" id="staticBackdropLabel">My Garage</span>
                    <button type="button" class="border-0 alg-bg-light-blue" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-square-fill fs-2"></i></button>
                </div>

                <div class="modal-body">

                    <div class="container">
                        <div class="row">
                            <div class="col-12 ">
                                <div class="searchSection-selectorBox d-flex justify-content-center gap-2 p-3">
                                    <div class="col-12 d-flex flex-column align-items-center justify-content-lg-center gap-3">
                                        <div class="w-100">
                                            <select class="searchSection-selector form-select form-select-sm alg-shadow" aria-label="Small select example" id="vehicleMakerSelector">
                                                <option selected>Select Maker</option>
                                            </select>
                                        </div>
                                        <div class="w-100">
                                            <select class="searchSection-selector  form-select form-select-sm alg-shadow" aria-label="Small select example" id="vehicleModelNameSelector">
                                                <option selected>Select Model</option>
                                                <!-- details goes here -->
                                            </select>
                                        </div>
                                        <div class="w-100">
                                            <select class="searchSection-selector form-select form-select-sm alg-shadow" aria-label="Small select example" id="vehicleYearsContainer">
                                                <option selected>Select Year</option>
                                                <!-- details goes here -->
                                            </select>
                                        </div>
                                        <div class="w-100">
                                            <select class="searchSection-selector form-select form-select-sm alg-shadow" aria-label="Small select example" id="modificationLineContainer">
                                                <option selected>Select Modification</option>
                                                <!-- details goes here -->
                                            </select>
                                        </div>
                                        <div class="w-100 d-grid">
                                            <button class="rounded-2 border-0 fw-bold text-light searchSection-butto alg-bg-blue p-2 alg-button-hover" onclick="addCarGarage();">Add your car</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- footer -->
    <?php include("./pages/components/footer.php") ?>

</body>

</html>