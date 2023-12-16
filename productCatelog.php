<?php
if (!isset($_GET["category_item_id"])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>category page</title>

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
    <script defer src="js/vehicleFetchData.js"></script>
    <script defer src="js/product.js"></script>
    <script defer src="js/toast.js"></script>


    <script defer src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
</head>

<body data-category_item_id="<?php echo $_GET['category_item_id']; ?>">
    <!-- header section-->
    <?php include("./pages/components/header.php") ?>

    <!-- content  of page -->
    <div class="cp-main-box d-flex flex-row">
        <div class="cp-side-bar profile-bg-gradient">
            <!--fixed   left side bar -->
            <div class="cp-side-bar-s1-heading alg-text-h2 alg-bolder alg-text-light p-2">Filters</div>
            <!-- side bar section 1 -->
            <div class="cp-side-bar-s1">
                <div class="cp-side-bar-s1-content">
                    <span class="alg-text-h3 alg-bolder alg-text-light m-4">Stock</span>
                    <div class="d-flex flex-row justify-content-center gap-4 py-2">
                        <div class="d-flex flex-column gap-2" id="stockInputContainer">
                            <input class="form-check-input" for="inStock" id="productStatusCheckbox1" checked value="1" name="stockCheckbox" type="radio">
                            <input class="form-check-input" for="outOfStock" id="productStatusCheckbox2" name="stockCheckbox" type="radio" value="2">
                        </div>
                        <div class="d-flex flex-column  gap-2" id="stockNameContainer">
                            <span class="alg-text-h3 alg-text-light" for="inStock">In a Stock</span>
                            <span class="alg-text-h3 alg-text-light" for="outOfStock">Out of Stock</span>
                        </div>
                    </div>
                    <hr class="alg-text-light" style="border-top: 3px solid ;">
                </div>
            </div>
            <div class="cp-side-bar-s1">
                <div class="cp-side-bar-s1-content">
                    <span class="alg-text-h3 alg-bolder alg-text-light m-4">Origin</span>
                    <div class="d-flex flex-row justify-content-center gap-4 py-2">
                        <div class="d-flex flex-column gap-2">
                            <input class="form-check-input " name="originCheckbox" id="originCheckbox1" for="brandNew" checked type="radio" value="1">
                            <input class="form-check-input" name="originCheckbox" id="originCheckbox2" for="used" type="radio" value="2">
                        </div>
                        <div class="d-flex flex-column  gap-2" id="originNameContainer">
                            <span class="alg-text-h3 alg-text-light" for="brandNew">Brand new</span>
                            <span class="alg-text-h3 alg-text-light" for="used">Used</span>
                        </div>
                    </div>
                    <hr class="alg-text-light" style="border-top: 3px solid ;">
                </div>
            </div>
            <div class="cp-side-bar-s3">
                <div class="cp-side-bar-s3-content">
                    <span class="alg-text-h3 alg-bolder alg-text-light m-4">Product Brand</span>
                    <div class="d-flex flex-row justify-content-center py-2 gap-4">
                        <div class="d-flex flex-column justify-content-around gap-2" id="brandCheckBoxContainer">
                            <!-- container goes here -->

                        </div>
                        <div class="d-flex flex-column justify-content-around gap-2" id="brandCheckBoxNameContainer">
                            <!-- container goes here -->
                        </div>

                    </div>
                    <hr class="alg-text-light" style="border-top: 3px solid ;">
                </div>
            </div>
            <!-- side bar section 4 -->
            <div class="cp-side-bar-s3">
                <div class="p-3">
                    <select class="cp-side-bar-s2-checkbox alg-text-h3 alg-text alg-rounded-small w-100" name="" id="categoryContainer">
                        <option value="0" disabled selected>select by category</option>
                        <!-- container goes here -->
                    </select>
                </div>
            </div>
        </div>
        <!-- right box section(image slider part) -->
        <div class="cp-right-box  w-100">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb p-3">
                    <li class="breadcrumb-item nav-link"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="category.php">Category page</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Category item page</li>
                </ol>
            </nav>
            <div class="p-2">
                <button type="button" class="btn btn-primary cp-side-bar-button" data-toggle="modal" data-target="#leftSideModal">
                    <i class="fa-solid fa-filter" style="color: #ffffff;"></i>
                    Filter
                </button>
            </div>
            <!-- left open model -->
            <div class="modal left fade" id="leftSideModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header alg-bg-light-blue">
                            <h5 class="modal-title alg-text-dark-blue" id="exampleModalLongTitle">
                                Filter
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                <span aria-hidden="true" class="p-1 alg-bg-darker-blue alg-text-light">&times;</span>
                            </button>
                        </div>


                        <div class="modal-body alg-bg-light-blue" style="overflow-y: auto; max-height: 80vh;">
                            <!-- Modal content goes here -->
                            <!-- repeat side bar first section -->
                            <div class="cp-model alg-bg-light alg-rounded-small">
                                <div class="cp-side-bar-s1">
                                    <div class="cp-side-bar-s1-content">
                                        <span class="alg-text-h3 alg-bolder alg-text-dark-blue m-4">Orgin</span>
                                        <div class="d-flex flex-row justify-content-center gap-4 py-2">
                                            <div class="d-flex flex-column gap-1">
                                                <input class="form-check-input" type="checkbox">
                                                <input class="form-check-input" type="checkbox">
                                            </div>
                                            <div class="d-flex flex-column gap-2">
                                                <span class="alg-text-h3 alg-text-dark-blue">Aftermarket (30)</span>
                                                <span class="alg-text-h3 alg-text-dark-blue">OEM (6)</span>
                                            </div>
                                        </div>
                                        <hr class="alg-text-dark-blue" style="border-top: 3px solid ;">
                                    </div>
                                </div>
                                <!-- repeat side bar second section -->
                                <div class="cp-side-bar-s2">
                                    <div class="cp-side-bar-s2-content">
                                        <span class="alg-text-h3 alg-bolder alg-text-dark-blue m-4">Garage</span>
                                        <div class="d-flex flex-column  gap-4 p-3">
                                            <select class="cp-side-bar-s2-checkbox alg-text-h3 alg-rounded-small alg-text-blue" name="" id="">
                                                <option value="" disabled selected>select the maker</option>
                                                <option value="">test 1</option>
                                                <option value="">test 2</option>
                                                <option value="">test 3</option>
                                            </select>
                                            <select class="cp-side-bar-s2-checkbox alg-text-h3 alg-rounded-small alg-text-blue" name="" id="">
                                                <option value="" disabled selected>select model</option>
                                                <option value="">test 4</option>
                                                <option value="">test 5</option>
                                                <option value="">test 6</option>
                                            </select>
                                            <select class="cp-side-bar-s2-checkbox alg-text-h3 alg-rounded-small alg-text-blue" name="" id="">
                                                <option value="" disabled selected>manufacturing year</option>
                                                <option value="">test 4</option>
                                                <option value="">test 5</option>
                                                <option value="">test 6</option>
                                            </select>
                                            <select class="cp-side-bar-s2-checkbox alg-text-h3 alg-rounded-small alg-text-blue" name="" id="">
                                                <option value="" disabled selected>select modification</option>
                                                <option value="">test 4</option>
                                                <option value="">test 5</option>
                                                <option value="">test 6</option>
                                            </select>
                                        </div>
                                        <hr class="alg-text-light" style="border-top: 3px solid ;">
                                    </div>
                                </div>
                                <!-- repeat side bar third section -->
                                <div class="cp-side-bar-s3">
                                    <div class="cp-side-bar-s3-content">
                                        <span class="alg-text-h3 alg-bolder alg-text-dark-blue m-4">Product Brand</span>
                                        <div class="d-flex flex-row justify-content-center py-2 gap-4">
                                            <div class="d-flex flex-column justify-content-around gap-2">
                                                <input class="form-check-input" type="checkbox">
                                                <input class="form-check-input" type="checkbox">
                                                <input class="form-check-input" type="checkbox">
                                                <input class="form-check-input" type="checkbox">
                                                <input class="form-check-input" type="checkbox">
                                                <input class="form-check-input" type="checkbox">
                                                <input class="form-check-input" type="checkbox">
                                                <input class="form-check-input" type="checkbox">
                                                <input class="form-check-input" type="checkbox">
                                                <input class="form-check-input" type="checkbox">
                                            </div>
                                            <div class="d-flex flex-column justify-content-around gap-2">
                                                <span class="alg-text-h3 alg-text-dark-blue">BRANDO (30)</span>
                                                <span class="alg-text-h3 alg-text-dark-blue">BLUE PRINT (06)</span>
                                                <span class="alg-text-h3 alg-text-dark-blue">CONTITECH (06)</span>
                                                <span class="alg-text-h3 alg-text-dark-blue">FENNER (6)</span>
                                                <span class="alg-text-h3 alg-text-dark-blue">GATES (6)</span>
                                                <span class="alg-text-h3 alg-text-dark-blue">HELICORD (6)</span>
                                                <span class="alg-text-h3 alg-text-dark-blue">HONDA (6)</span>
                                                <span class="alg-text-h3 alg-text-dark-blue">HUTCHINSON (6)</span>
                                                <span class="alg-text-h3 alg-text-dark-blue">MITSOBOSHI (6)</span>
                                                <span class="alg-text-h3 alg-text-dark-blue">OPTIBELT (6)</span>
                                            </div>

                                        </div>
                                        <hr class="alg-text-dark-blue" style="border-top: 3px solid ;">
                                    </div>
                                </div>
                                <!-- repeat side bar fourth section -->
                                <div class="cp-side-bar-s3">
                                    <div class="p-3">
                                        <select class="cp-side-bar-s2-checkbox alg-text-h3 alg-rounded-small alg-text-blue w-100" name="" id="">
                                            <option value="" disabled selected>select by category</option>
                                            <option value="">category 1</option>
                                            <option value="">category 2</option>
                                            <option value="">category 3</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-center alg-bg-light-blue">
                            <button class="cp-model-btn alg-bg-green alg-text-light alg-rounded-small border-0">Submit</button>
                        </div>
                    </div>
                </div>
            </div>



            <!-- category slide -->
            <div class="d-flex flex-column align-items-center gap-5">

                <div class="col-12 d-flex justify-content-center  flex-wrap gap-2 " id="productCatalogContainer">
                    <!-- container goes  here -->

                </div>

                <!-- pagination section boostrap -->
                <div class="pt-4">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item" id="previous">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <span class="d-flex" id="paginationContainer">
                                <!-- pagination goes here -->
                            </span>
                            <li class="page-item" id="next">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>



        </div>
    </div>

    <!-- vehicle select Modal -->
    <div class="modal fade modal-xl" id="vhSelectModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">


            <div class="modal-content">
                <div class="modal-header alg-bg-light-blue">
                    <span class="modal-title alg-text-h2 alg-text-dark-blue fw-bold mx-3" id="staticBackdropLabel">Vehicle section</span>
                    <button type="button" class="border-0 alg-bg-light-blue" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-square-fill fs-2"></i></button>
                </div>

                <div class="modal-body alg-bg-light-blue">


                    <div class="p-4">
                        <div class="col-12 d-flex justify-content-center flex-wrap gap-5" id="selectVhMainContainer">
                            <!-- container goes here -->
                        </div>
                        <!-- <div class="d-flex justify-content-center mt-5 p-3">
                            <button class="se3-btn fw-semibold px-3 p-1 rounded-2 alg-text-h3" id="loadButton">Load More</button>
                        </div> -->

                    </div>
                </div>
            </div>
        </div>
    </div>



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

    <!-- toast message -->
    <div id="toastContainer"></div>

    <!-- Category Modal -->
    <div class="modal fade modal-xl" id="categoryLoad" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">


            <div class="modal-content">
                <div class="modal-header alg-bg-light-blue">
                    <span class="modal-title alg-text-h2 alg-text-dark-blue fw-bold mx-3" id="staticBackdropLabel">Category section</span>
                    <button type="button" class="border-0 alg-bg-light-blue" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-square-fill fs-2"></i></button>
                </div>

                <div class="modal-body alg-bg-light-blue">


                    <div class="p-4">
                        <div class="col-12 d-flex justify-content-center flex-wrap" id="categoryContaine">
                            <!-- content goes here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php include("./pages/components/footer.php") ?>

    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.0.9/dist/js/splide.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>