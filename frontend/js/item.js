// SERVER_URL = "http://localhost:9001/";

// document.addEventListener("DOMContentLoaded", () => {
//      const item_id = document.body.dataset.item_id;
//      loadItem(item_id)
// });


// // load items
// function loadItem(item_id) {
//      console.log(item_id);
//      // alert(category_id);

//      // fetch request
//      fetch(SERVER_URL + "../../backend/api/categoryItemLoad.php?category_id=" + category_id, {
//           method: "GET",
//           headers: {
//                "Content-Type": "application/json",
//           },
//      })
//           .then((response) => {
//                if (!response.ok) {
//                     throw new Error(`HTTP error! Status: ${response.status}`);
//                }
//                return response.json();
//           })
//           .then((data) => {
//                const categoryItemContainer = document.getElementById("categoryItemContainer");

//                if (data.status === "success") {
//                     // window.location = "category.php";
//                     console.log(data.results);


//                     categoryItemContainer.innerHTML = "";
//                     data.results.forEach(element => {
//                          const categoryDiv = document.createElement("div");
//                          categoryDiv.className = "col-6 col-md-4 col-lg-2 alg-bg-categor alg-shadow mb-1 rounded mt-3 mx-4 px-3 alg-card-hover";
//                          categoryDiv.innerHTML += `
//                         <a href="categoryItem.php?item_id=${element.category_Item_id}" class="text-decoration-none">
//                         <div class="d-flex flex-column align-items-center" id="categoryItem${element.category_Item_id}">
//                         <img src="${element.category_image}" alt="" class="alg-category-img mt-4 mb-4 img-fluid">
//                         <span class="mt-1 p-3 fw-bold text-whit pb-5 alg-text-h3">${element.category_Item_type}</span>
//                     </div>
//                         </a>`;


//                          // Attach a click event listener


//                          categoryItemContainer.appendChild(categoryDiv);
//                     });



//                } else if (data.status === "failed") {
//                     console.log(data.error);
//                } else {
//                     console.log(data);
//                }
//           })
//           .catch((error) => {
//                console.error("Fetch error:", error);
//           });
// }

