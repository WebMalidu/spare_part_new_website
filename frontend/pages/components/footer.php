<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Slider</title>
    <!-- CSS -->
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.0.9/dist/css/splide.min.css">

    <link rel="stylesheet" href="css/style.css">
    <style>
        h5 {
            color: white;
        }

        .item1 {
            color: white;
        }

        .splide__pagination {
            position: absolute;
            bottom: -10px;
            /* Adjust this value as needed */
            width: 100%;
            text-align: center;
        }

        .splide__pagination__page {
            width: 8px;
            /* Set the width of each dot */
            height: 8px;
            /* Set the height of each dot */
            background-color: #ccc;
            /* Change the background color of the dots */
            display: inline-block;
            /* Display dots in a row */
            margin: 0px 5px;
            /* Add spacing between dots */
            cursor: pointer;
            /* Add pointer cursor */
            border-radius: 50%;
            /* Make dots circular */
            margin-top: 50px;
        }

        .splide__pagination__page.is-active {
            background-color: #00447B;
            /* Change the color of the active dot */
        }
    </style>
</head>

<body>
    
    <footer style="background-color: #002848;" class="pb-4">
        <div class="container">
            <div class="row footer-mainBox">
                <div class="col-sm ">
                    <img src="resources/image/logo.jpg" alt="" srcset="" class="footer-logo my-5 ">
                </div>
                <div class="col-sm pt-3">
                    <h5 style="color: white;">About</h5>
                    <div class="footer-list-container py-4">
                        <div class="item1 py-2"> About us</div>
                        <div class="item1   py-2">Contact Us</div>
                        <div class="item1   py-2">Careers</div>
                        <div class="item1   py-2">FAQ</div>

                    </div>
                </div>
                <div class="col-sm pt-3">
                    <h5>policy</h5>
                    <div class="footer-list-container py-4">
                        <div class="item1 py-2"> About us</div>
                        <div class="item1   py-2">Contact Us</div>
                        <div class="item1   py-2">Careers</div>
                        <div class="item1   py-2">FAQ</div>

                    </div>
                </div>
                <div class="col-sm pt-3">
                    <h5>Usefull links</h5>
                    <div class="footer-list-container py-4">
                        <div class="item1 py-2"> About us</div>
                        <div class="item1   py-2">Contact Us</div>
                        <div class="item1   py-2">Careers</div>
                        <div class="item1   py-2">FAQ</div>
                        <div class="item1   py-2">Careers</div>
                        <div class="item1   py-2">FAQ</div>

                    </div>
                </div>
            </div>
        </div>
    </footer>

  
</body>

</html>