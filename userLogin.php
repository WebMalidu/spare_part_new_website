<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="icon" href="resources/image/home/engineImage.png" />

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
    <script defer src="js/home.js"></script>


</head>

<body>
    <!-- header section-->
    <?php include("./pages/components/header.php") ?>

    <div class="container">
        <div class="row">
            <div class="col-12 ">
                <div class="d-flex justify-content-center align-items-center h-100 align-items-stretch py-5">
                    <div class="col-md-4 col-lg-3  d-none d-md-block  alg-bg-light-blue alg-shadow py-4 rounded-3">
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="col-9">
                                <img src="./resources/image/home/engineImage.png" class="img-fluid" />.
                                <div class="text-center"><span class="fw-semibold alg-text-dark-blue">Enter the best cat spare parts marketplace in Srilanka</span></div>
                                <p class="alg-text-h3 text-center mt-4 alg-text-dark-blue">With our advanced search functionality you can easily find any spare part for your car</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-5 d-flex justify-content-center align-items-center bg-dange alg-shadow">
                        <!-- sign In section -->
                        <div class="col-8 d-flex flex-column gap-3 py-4 py-md-0" id="signInBox">
                            <h4 class="alg-text-dark-blue fw-bold">Sign In</h4>
                            <input type="email" class="alg-input px-2 alg-bg-light-blue p-1 alg-text-h3" placeholder="Enter email" id="signInEmail" />
                            <input type="password" class="alg-input px-2 alg-bg-light-blue p-1 alg-text-h3" placeholder="Enter password" id="signInpassword">
                            <button  onclick="SignIn()" id="signInButton">click</button>
                            <div class="text-center"><span class="alg-cursor fw-semibold alg-text-dark-blue alg-text-h3" onclick="changeView();">Sign up with &nbsp;<span class="fw-bold"> ></span></span></div>
                        </div>
                        <!-- sign Up section -->
                        <div class="col-8 d-flex flex-column gap-3 d-none py-4 py-md-0" id="signUpBox">
                            <h4 class="alg-text-dark-blue fw-bold">Sign Up</h4>
                            <input type="email" class="alg-input px-2 alg-bg-light-blue p-1 alg-text-h3" placeholder="Enter email" />
                            <input type="text" class="alg-input px-2 alg-bg-light-blue p-1 alg-text-h3" placeholder="Enter Full Name" />
                            <input type="password" class="alg-input px-2 alg-bg-light-blue p-1 alg-text-h3" placeholder="Enter password">
                            <input type="password" class="alg-input px-2 alg-bg-light-blue p-1 alg-text-h3" placeholder="Confirm password">
                            <button class="button rounded-2 alg-text-h3">Register</button>
                            <div class="text-center"><span class="alg-cursor fw-semibold alg-text-dark-blue alg-text-h3" onclick="changeView();">Sign In with &nbsp;<span class="fw-bold"> ></span></span></div>
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