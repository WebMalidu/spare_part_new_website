<?php
if (!isset($_GET["category_id"])) {
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
    <script defer src="js/categoryItem.js"></script>
    <script defer src="js/toast.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
</head>

<body data-category_id="<?php echo $_GET['category_id']; ?>">
    <!-- header section-->
    <?php include("./pages/components/header.php") ?>

    <!-- content  of page -->
    <div class="cp-main-box d-flex flex-row">

        <!-- right box section(image slider part) -->
        <div class="cp-right-box  w-100">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb p-3">
                    <li class="breadcrumb-item nav-link"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">category page</li>
                </ol>
            </nav>
            <div class="p-2">
                <button type="button" class="btn btn-primary cp-side-bar-button" data-toggle="modal" data-target="#leftSideModal">
                    <i class="fa-solid fa-filter" style="color: #ffffff;"></i>
                    Filter
                </button>
            </div>

            <!-- category slide -->
            <div class="d-flex flex-column align-items-center gap-5">

                <div class="col-12 d-flex justify-content-center flex-wrap gap-2 " id="categoryItemContainer">


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

            <!-- toast container -->
            <div id="toastContainer"></div>
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