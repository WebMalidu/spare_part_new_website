<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact US</title>
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
    <script defer src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>


</head>

<body>
        <!-- header section-->
        <?php include("./pages/components/header.php") ?>

    <!-- section1 (cu-s1) -->
    <div class="cu-s1 profile-bg-gradient">
        <div class="h-100 container d-flex justify-content-center align-items-center">
            <div class="cu-s1-heading alg-text-light alg-text-h1 alg-bolder">
                Help & Support
            </div>
        </div>
    </div>

    <!-- section 2 (cu-s2) -->
    <div class="cu-s2 d-flex flex-column align-items-center p-3">
        <div class="cu-s2-heading alg-text-h2 alg-bold alg-text-blue">
            Hi, how we can help ?
        </div>
        <div class="cu-s2-email-box cu-s2-box py-3 ">
            <input class=" form-control border-primary" type="text" name="" placeholder="email">
        </div>
        <div class="cu-s2-name-box cu-s2-box py-3">
            <input class="form-control border-primary" type="text" name="" placeholder="name">

        </div>
        <div class="cu-s2-qtype-box cu-s2-box py-3">
            <select class="form-control border-primary" name="" id="">
                <option value="" disabled selected>Question type</option>
                <option value="">test 1</option>
                <option value="">test 1</option>
                <option value="">test 1</option>
            </select>

        </div>
        <div class="cu-s2-comment-box cu-s2-box py-3">
            <textarea class="form-control border-primary" name="" id="" cols="30" rows="7" placeholder="comment"></textarea>

        </div>
        <div class="cu-s2-button-box ">
            <button class="cu-s2-button alg-bg-green alg-text-light alg-rounded-small border-0">Submit</button>
        </div>
    </div>

    <!-- section 3 (cu-s3) -->
    <div class="h-100 cu-s3 alg-bg-dark-blue p-4">
        <div class="container cu-s3-container d-flex">
            <div class="cu-s3-map-box alg-bg-light-blue alg-rounded-small">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31677.316838070776!2d79.98286832877496!3d7.04864094065603!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2f93b7af51f61%3A0x8c99f4119aa9df59!2s14%20Junction!5e0!3m2!1sen!2slk!4v1695915368766!5m2!1sen!2slk" class="cu-s3-map alg-rounded-small"  style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="cu-s3-right-box h-100 d-flex flex-column ">
                <div class="h-100 cu-s3-field-box alg-bg-light-blue d-flex flex-row p-1 alg-rounded-small">
                    <div><i class="fa-solid fa-square-phone fa-lg" style="color: #000000;"></i></div>
                    <div class="d-flex justify-content-center align-items-center w-100">
                        <span class="alg-text-h3 alg-bold">
                            +94764556788
                        </span>
                    </div>
                </div>
                <div class="h-100cu-s3-field-box alg-bg-light-blue d-flex flex-row p-1 alg-rounded-small ">
                    <div><i class="fa-solid fa-envelope fa-lg" style="color: #000000;"></i></div>
                    <div class="d-flex justify-content-center align-items-center w-100">
                        <span class="alg-text-h3 alg-bold">
                            abcdef@gmail.com
                        </span>
                    </div>
                </div>
                <div class="h-100cu-s3-field-box alg-bg-light-blue d-flex flex-row p-1 alg-rounded-small">
                    <div class=""><i class="fa-solid fa-location-dot fa-lg" style="color: #0d0d0d;"></i></div>
                    <div class="d-flex justify-content-center  w-100">
                        <span class="alg-text-h3 alg-bold">
                            No: 23 Colombo 07
                        </span>
                    </div>
                </div>
            </div>

        </div>
    </div>

        <!-- footer -->
        <?php include("./pages/components/footer.php") ?>








    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.0.9/dist/js/splide.min.js"></script>
</body>