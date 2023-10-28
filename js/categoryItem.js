
document.addEventListener("DOMContentLoaded", () => {
     const category_id = document.body.dataset.category_id;
     loadCategoryItem(category_id)
});

let count = 0;
document.getElementById("next").addEventListener("click", () => {
     count += 1;
     load(count);
})

document.getElementById("previous").addEventListener("click", () => {
     count -= 1;
     load(count);
})

function load(x) {
     count = x;
     const category_id = document.body.dataset.category_id;
     loadCategoryItem(category_id);
}

// load items
function loadCategoryItem(category_id) {
     console.log(category_id);

     // fetch request
     fetch(SERVER_URL + "backend/api/categoryItemLoad.php?category_id=" + category_id + "&count=" + count, {
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

               if (data.status === "success") {
                    console.log(data.results);

                    let paginationContainer = document.getElementById('paginationContainer');
                    paginationContainer.innerHTML = "";


                    for (let x = 0; x <= data.countPage - 1; x++) {
                         paginationContainer.innerHTML += `
                                <li class="page-item ${x == count ? 'active' : ''}" onclick="load('${x}');">
                                    <a class="page-link" href="#">${x + 1}</a>
                                </li>`;
                    }

                    categoryItemContainer.innerHTML = "";
                    data.results.forEach(element => {
                         const categoryDiv = document.createElement("div");
                         categoryDiv.className = "col-6 col-md-4 col-lg-2 alg-bg-categor alg-shadow mb-1 rounded mt-3 mx-4 px-3 alg-card-hover";
                         categoryDiv.innerHTML += `
                        <a href="productCatelog.php?category_item_id=${element.category_Item_id}" class="text-decoration-none">
                        <div class="d-flex flex-column align-items-center">
                        <img src="${element.category_image}" alt="" class="alg-category-img mt-4 mb-4 img-fluid">
                        <span class="mt-1 p-3 fw-bold text-whit pb-5 alg-text-h3">${element.category_Item_type}</span>
                    </div>
                        </a>`;

                         // Attach a click event listener

                         categoryItemContainer.appendChild(categoryDiv);
                    });

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


