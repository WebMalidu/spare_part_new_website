<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Slider</title>
    <!-- CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .dots {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }
        .dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background-color: #ccc;
            margin: 0 5px;
            cursor: pointer;
        }
        .active {
            background-color: #00447B;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="py-2" style="color: #00447B;">Brand We Trust</h1>
        <div class="brand-slider">
            <div class="slider-frame">
                <div class="image-pair">
                    <img src="resources/image/10a8568 2.png" alt="Brand 1" style="width: 15%;" class="p-3">
                    <img src="resources/image/logo_brand.png" alt="Brand 2" style="width: 15%;" class="p-3">
                    <img src="resources/image/10a8568 2.png" alt="Brand 1" style="width: 15%;" class="p-3">
                    <img src="resources/image/logo_brand.png" alt="Brand 2" style="width: 15%;" class="p-3">
                    <img src="resources/image/10a8568 2.png" alt="Brand 1" style="width: 15%;" class="p-3">
                    <img src="resources/image/logo_brand.png" alt="Brand 2" style="width: 15%;"class="p-3">
                </div>
                <div class="image-pair">
                    <img src="resources/image/logo_brand.png" alt="Brand 3" style="width: 15%;" class="p-3">
                    <img src="resources/image/10a8568 2.png" alt="Brand 4" style="width: 15%;" class="p-3">
                    <img src="resources/image/logo_brand.png" alt="Brand 1" style="width: 15%;" class="p-3">
                    <img src="resources/image/10a8568 2.png" alt="Brand 2" style="width: 15%;" class="p-3">
                    <img src="resources/image/logo_brand.png" alt="Brand 1" style="width: 15%;" class="p-3">
                    <img src="resources/image/10a8568 2.png" alt="Brand 2" style="width: 15%;" class="p-3">
                </div>
                <div class="image-pair">
                    <img src="resources/image/10a8568 2.png" alt="Brand 3" style="width: 15%;" class="p-3">
                    <img src="resources/image/10a8568 2.png" alt="Brand 4" style="width: 15%;" class="p-3">
                    <img src="resources/image/logo_brand.png" alt="Brand 1" style="width: 15%;" class="p-3">
                    <img src="resources/image/10a8568 2.png" alt="Brand 2" style="width: 15%;" class="p-3">
                    <img src="resources/image/logo_brand.png" alt="Brand 1" style="width: 15%;" class="p-3">
                    <img src="resources/image/10a8568 2.png" alt="Brand 2" style="width: 15%;" class="p-3">
                    
                </div>
                <!-- Add more image-pair divs as needed -->
            </div>
            <div class="dots"></div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="js/bootstrap.bundle.js"></script>
    <script>
        const sliderFrame = document.querySelector(".slider-frame");
        const imagePairs = sliderFrame.querySelectorAll(".image-pair");
        const dotsContainer = document.querySelector(".dots");
        let currentFrameIndex = 0;

        function showImagePair(index) {
            for (let i = 0; i < imagePairs.length; i++) {
                imagePairs[i].style.display = "none";
            }
            imagePairs[index].style.display = "block";

            // Update active dot
            const dots = dotsContainer.querySelectorAll(".dot");
            dots.forEach((dot, i) => {
                dot.classList.remove("active");
                if (i === index) {
                    dot.classList.add("active");
                }
            });
        }

        function nextImagePair() {
            currentFrameIndex = (currentFrameIndex + 1) % imagePairs.length;
            showImagePair(currentFrameIndex);
        }

        // Create dots based on the number of image pairs
        for (let i = 0; i < imagePairs.length; i++) {
            const dot = document.createElement("div");
            dot.classList.add("dot");
            dot.addEventListener("click", () => showImagePair(i));
            dotsContainer.appendChild(dot);
        }

        // Auto slide every 3 seconds
        setInterval(nextImagePair, 3000);

        // Initial setup
        showImagePair(currentFrameIndex);
    </script>
</body>
</html>