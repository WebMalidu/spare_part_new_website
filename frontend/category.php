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
    <script defer src="js/bootstrap.bundle.js"></script>
    <script defer src="js/script.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

</head>

<body>
    <!-- header section-->
    <?php include("./pages/components/header.php") ?>

    <!-- content  of page -->
    <div class="cp-main-box d-flex flex-row">
        <div class="cp-side-bar alg-bg-dark-blue">
            <!--fixed   left side bar -->
            <div class="cp-side-bar-s1-heading alg-text-h2 alg-bolder alg-text-light p-2">Filters</div>
            <!-- side bar section 1 -->
            <div class="cp-side-bar-s1">
                <div class="cp-side-bar-s1-content">
                    <span class="alg-text-h3 alg-bolder alg-text-light m-4">Orgin</span>
                    <div class="d-flex flex-row justify-content-center gap-4 py-2">
                        <div class="d-flex flex-column">
                            <input class="form-check-input" type="checkbox">
                            <input class="form-check-input" type="checkbox">
                        </div>
                        <div class="d-flex flex-column gap-3 p-1">
                            <span class="alg-text-p alg-text-light">Aftermarket (30)</span>
                            <span class="alg-text-p alg-text-light">OEM (6)</span>
                        </div>
                    </div>
                    <hr class="alg-text-light" style="border-top: 3px solid ;">
                </div>
            </div>
            <!-- side bar section 2 -->
            <div class="cp-side-bar-s2">
                <div class="cp-side-bar-s2-content">
                    <span class="alg-text-h3 alg-bolder alg-text-light m-4">Garage</span>
                    <div class="d-flex flex-column  gap-4 p-3">
                        <select class="form-select" name="" id="">
                            <option value="" disabled selected>select the maker</option>
                            <option value="">test 1</option>
                            <option value="">test 2</option>
                            <option value="">test 3</option>
                        </select>
                        <select class="form-select" name="" id="">
                            <option value="" disabled selected>select model</option>
                            <option value="">test 4</option>
                            <option value="">test 5</option>
                            <option value="">test 6</option>
                        </select>
                        <select class="form-select" name="" id="">
                            <option value="" disabled selected>manufacturing year</option>
                            <option value="">test 4</option>
                            <option value="">test 5</option>
                            <option value="">test 6</option>
                        </select>
                        <select class="form-select" name="" id="">
                            <option value="" disabled selected>select modification</option>
                            <option value="">test 4</option>
                            <option value="">test 5</option>
                            <option value="">test 6</option>
                        </select>
                    </div>
                    <hr class="alg-text-light" style="border-top: 3px solid ;">
                </div>
            </div>
            <!-- side bar section 3 -->
            <div class="cp-side-bar-s3">
                <div class="cp-side-bar-s3-content">
                    <span class="alg-text-h3 alg-bolder alg-text-light m-4">Product Brand</span>
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
                            <span class="alg-text-h3 alg-text-light">BRANDO (30)</span>
                            <span class="alg-text-h3 alg-text-light">BLUE PRINT (06)</span>
                            <span class="alg-text-h3 alg-text-light">CONTITECH (06)</span>
                            <span class="alg-text-h3 alg-text-light">FENNER (6)</span>
                            <span class="alg-text-h3 alg-text-light">GATES (6)</span>
                            <span class="alg-text-h3 alg-text-light">HELICORD (6)</span>
                            <span class="alg-text-h3 alg-text-light">HONDA (6)</span>
                            <span class="alg-text-h3 alg-text-light">HUTCHINSON (6)</span>
                            <span class="alg-text-h3 alg-text-light">MITSOBOSHI (6)</span>
                            <span class="alg-text-h3 alg-text-light">OPTIBELT (6)</span>
                        </div>

                    </div>
                    <hr class="alg-text-light" style="border-top: 3px solid ;">
                </div>
            </div>
            <!-- side bar section 3 -->
            <div class="cp-side-bar-s3">
                <div class="p-3">
                    <select class="form-select" name="" id="">
                        <option value="" disabled selected>select by category</option>
                        <option value="">category 1</option>
                        <option value="">category 2</option>
                        <option value="">category 3</option>
                    </select>
                </div>
            </div>
        </div>
        <!-- right box section(image slider part) -->
        <div class="cp-right-box  w-100">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb p-3">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                </ol>
            </nav>
            <div class="py-2">
                <button type="button" class="btn btn-primary cp-side-bar-button" data-toggle="modal" data-target="#leftSideModal">
                    Open Left-Side Modal
                </button>
            </div>
            <!-- left open model -->
            <div class="modal left fade" id="leftSideModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Left-Side Modal</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Modal content goes here -->
                            <p>This is your left-side modal content.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Swiper -->
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <!-- first slide -->
                    <div class="swiper-slide">
                        <div class="d-flex flex-column ">
                            <div class="cp-right-box-slide-l1 d-flex flex-row gap-5">
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
                            </div>
                            <!-- second line -->
                            <div class="d-flex flex-row gap-5 py-5">
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
                            </div>
                            <!-- third line -->
                            <div class="cp-right-box-slide-l3 d-flex flex-row gap-5">
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
                            </div>
                        </div>

                    </div>
                    <!-- second slide -->
                    <div class="swiper-slide">
                        <div class="d-flex flex-column">
                            <!-- first line -->
                            <div class="cp-right-box-slide-l1 d-flex flex-row gap-5">
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
                            </div>
                            <!-- second line -->
                            <div class="d-flex flex-row gap-5 py-5">
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
                            </div>
                            <!-- third line -->
                            <div class="cp-right-box-slide-l3 d-flex flex-row gap-5">
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
                            </div>
                        </div>

                    </div>
                    <!-- third slide -->
                    <div class="swiper-slide">
                        <div class="d-flex flex-column">
                            <div class="cp-right-box-slide-l1 d-flex flex-row gap-5">
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
                            </div>
                            <!-- second line -->
                            <div class="d-flex flex-row gap-5 py-5">
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
                            </div>
                            <!-- third line -->
                            <div class="cp-right-box-slide-l3 d-flex flex-row gap-5">
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
                            </div>
                        </div>

                    </div>

                </div>
                <div class="swiper-pagination"></div>
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