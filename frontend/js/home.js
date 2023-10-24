





















document.addEventListener("DOMContentLoaded", () => {
    loadCategory();
});






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
                    const categoryDiv = document.createElement("div");
                    categoryDiv.className = "col-6 col-md-4 col-lg-2 alg-bg-categor alg-shadow mb-1 rounded mt-3 mx-4 px-3 alg-card-hover";
                    categoryDiv.innerHTML = `
                        <div class="d-flex flex-column align-items-center" id="categoryItem${element.category_id}">
                            <img src="resources/image/car.jpg" alt="" class="alg-category-img mt-4 mb-4 img-fluid">
                            <span class="mt-1 p-3 fw-bold text-whit pb-5 alg-text-h3">${element.category_type}</span>
                        </div>`;
                    
                    // Attach a click event listener
                    categoryDiv.onclick = function() {
                        loadCategoryItem(element.category_id);
                    };
            
                    categoryContainer.appendChild(categoryDiv);
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


function loadCategoryItem(category_id) {
    // alert(id);
    // window.location = "category.php"

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
            const categoryContainer = document.getElementById("categoryContainer");

            if (data.status == "success") {
                categoryContainer.innerHTML = "";
                data.results.forEach(element => {
                    
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
