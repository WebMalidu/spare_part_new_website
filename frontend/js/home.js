SERVER_URL = "http://localhost:9001/"

document.addEventListener("DOMContentLoaded", () => {
    loadCategory();
});




function promotionLoder() {
    console.log("hi")


    // Send the data to the server using Fetch
    fetch("../../backend/api//productPromation.php", {
        method: "POST",
    })
        .then(response => response.json())
        .then(data => {
            // Handle the response data
            if (data.status === "success") {
                alert(data.status);

                const imageUrls = data.imageUrls;
                const swiperWrapper = document.getElementById("swiper-wrapper");

                // Clear existing slides
                swiperWrapper.innerHTML = '';


                // Check the screen size (viewport width)
                const screenWidth = window.innerWidth;

                if (screenWidth <= 768) {
                    // Code for small screens
                    for (let i = 0; i < imageUrls.length; i++) {
                        const slide = document.createElement("div");
                        slide.className = "swiper-slide d-flex gap-5 p-3";

                        const img = document.createElement("img");
                        img.src = imageUrls[i];
                        img.className = "alg-slider-img alg-shadow";
                        img.alt = "";
                        slide.appendChild(img);

                        swiperWrapper.appendChild(slide);
                    }
                } else {
                    // Code for big screens
                    const swiperContainer = document.getElementById("swiper-container");
                    const mySwiper = new Swiper(swiperContainer, {
                        // Swiper parameters for big screens
                        slidesPerView: 2,
                        spaceBetween: 20,
                        // Add other settings as needed
                    });

                    for (let i = 0; i < imageUrls.length; i += 2) {
                        const slide = document.createElement("div");
                        slide.className = "swiper-slide d-flex gap-5 p-3";

                        const img1 = document.createElement("img");
                        img1.src = imageUrls[i];
                        img1.className = "alg-slider-img alg-shadow";
                        img1.alt = "";
                        slide.appendChild(img1);

                        if (imageUrls[i + 1]) {
                            const img2 = document.createElement("img");
                            img2.src = imageUrls[i + 1];
                            img2.className = "alg-slider-img alg-shadow";
                            img2.alt = "";
                            slide.appendChild(img2);
                        }

                        swiperWrapper.appendChild(slide);
                    }
                }
            } else {
                console.log(data.error);
            }
            console.log(data);
        })
        .catch(error => {
            console.error("Error:", error);
        });


}
// promotionLoder()



// load category
let categoryCount = 4;
document.getElementById('loadButton').addEventListener('click', () => {
    categoryCount += 4;
    loadCategory();
})

function loadCategory() {

    // fetch request
    fetch(SERVER_URL + "../../backend/api/categoriesLoad.php?categoryCount=" + categoryCount, {
        method: "GET",
        headers: {
            "Content-Type": "application/json",
        },
    })
        .then((response) => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .then((data) => {
            const categoryContainer = document.getElementById("categoryContainer");

            if (data.status == "success") {
                categoryContainer.innerHTML = "";
                data.results.forEach(element => {
                    categoryContainer.innerHTML += `
                 <div class="col-6 col-md-4 col-lg-2 alg-bg-categor alg-shadow mb-1 rounded mt-3 mx-4 px-3 alg-card-hover"> 
                 <a href="category.php?category_id=${element.category_id}" class="text-decoration-none"> 
                 <div class="d-flex flex-column align-items-center">
                     <img src="resources/image/car.jpg" alt="" class="alg-category-img mt-4 mb-4 img-fluid">
                     <span class="mt-1 p-3 fw-bold text-whit pb-5 alg-text-h3">${element.category_type}</span>
                 </div>
                 </a>
                 </div>`
                    //  let categoryId = document.body.dataset.category;


                    // // Attach a click event listener
                    // categoryDiv.onclick = function() {
                    //     loadCategoryItem(element.category_id);
                    // };


                    // categoryContainer.appendChild(categoryDiv);
                });



            } else if (data.status == "failed") {
                console.log(data.error);
            } else {
                console.log(data);
            }
        })
        .catch((error) => {
            console.error("Fetch error:", error);
        });
}

// load items

function loadCategoryItem(category_id) {
    console.log(category_id)
    // alert(category_id);

    // fetch request
    fetch(SERVER_URL + "../../backend/api/categoryItemLoad.php?category_id=" + category_id, {
        method: "GET",
        headers: {
            "Content-Type": "application/json",
        },
    })
        .then((response) => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .then((data) => {
            const categoryItemContainer = document.getElementById("categoryItemContainer");

            if (data.status == "success") {
                // window.location = "category.php";
                console.log(data.results);


                // categoryItemContainer.innerHTML = "";
                // data.results.forEach(element => {
                //     const categoryDiv = document.createElement("div");
                //     categoryDiv.className = "col-6 col-md-4 col-lg-2 alg-bg-categor alg-shadow mb-1 rounded mt-3 mx-4 px-3 alg-card-hover";
                //     categoryDiv.innerHTML += `
                //     <div class="d-flex flex-column align-items-center" id="categoryItem${element.category_Item_id}">
                //     <img src="resources/image/car.jpg" alt="" class="alg-category-img mt-4 mb-4 img-fluid">
                //     <span class="mt-1 p-3 fw-bold text-whit pb-5 alg-text-h3">${element.category_Item_type}</span>
                // </div>`;


                //     // Attach a click event listener


                //     categoryItemContainer.appendChild(categoryDiv);
                // });



            } else if (data.status === "failed") {
                console.log(data.error);
            } else {
                console.log(data);
            }
        })
        .catch((error) => {
            console.error("Fetch error:", error);
        });
}
