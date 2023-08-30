<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- css -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />


    <!-- js -->
    <script defer src="js/bootstrap.bundle.js"></script>
    <script defer src="js/script.js"></script>

<body>
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
                    <button class="rounded-2 border-0 fw-bold text-light searchSection-button">SEARCH PARTS</button>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
</body>

</html>