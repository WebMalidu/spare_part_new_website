let imgpromo;;
function promotionLoder() {
  console.log("hi");

  // Send the data to the server using Fetch
  fetch("../../backend/api//productPromation.php", {
    method: "POST",
  })
    .then((response) => response.json())
    .then((data) => {
      // Handle the response data
      if (data.status === "success") {
        alert(data.status);

        const imageUrls = data.imageUrls;
        const promotionData = document.getElementById("promotion_list");
        
// 
        for (let i = 0; i < imageUrls.length; i++) {
          const li = document.createElement("li");
          li.className = "splide__slide";

          imgpromo = document.createElement("img");
          imgpromo.src = imageUrls[i]; // Use the image URL from the array
          
          
          imgpromo.alt = ""; // Set alt text if needed

          // Add any additional attributes or styles here
          imgpromo.style.width = "100%"; // For example, set the image width to 100%

          li.appendChild(imgpromo);
          promotionData.appendChild(li);
           // Use an IIFE to capture the current value of imgpromo
           (function (src) {
            imgpromo.addEventListener("click", () => {
              promotionsingle(src);
            });
          })(imgpromo.src);
         
          
        }
       
        promotionSliderLoader();
      } else {
        console.log(data.error);
      }
      console.log(data);
    })
    .catch((error) => {
      console.error("Error:", error);
    });
}

document.addEventListener("DOMContentLoaded", () => {
  promotionLoder();
});







function promotionsingle(promovalue) {
  console.log(promovalue);
  // Regular expression pattern to match a number
// Split the URL by '/' and get the last part
const parts = promovalue.split('/');
const lastPart = parts[parts.length - 1];

// Remove the ".jpeg" extension, if present
const number = lastPart.replace('.jpeg', '');

// Convert the number to an integer
const parsedNumber = parseInt(number, 10);

const requestDataObject = {
  "promotionId": parsedNumber,
  

 
  
}



// store data in a form
let form = new FormData();
form.append("singlePromotionLoad", JSON.stringify(requestDataObject));

// send the data to server
let request = new XMLHttpRequest();
request.onreadystatechange = function () {
  if (request.readyState == 4) {
    // preform an action on response
    let response = JSON.parse(request.responseText);
    if (response.status == "success") {
      alert(response.status);
     
    } else {
      console.log(response.error);
    }
    console.log(request.responseText);
  }
};
request.open("POST", "../../backend/api//promotionSingleLoad.php", true);
request.send(form);



  
}









//document.addEventListener("DOMContentLoaded", () => {
//    loadCategory();
//});
//
//
//
//
//
//
//// load category
//let categoryCount = 4;
//document.getElementById('loadButton').addEventListener('click', () => {
//    categoryCount += 4;
//    loadCategory();
//})
//
//function loadCategory() {
//
//    // fetch request
//    fetch(SERVER_URL + "../../backend/api/categoriesLoad.php?categoryCount=" + categoryCount, {
//        method: "GET",
//        headers: {
//            "Content-Type": "application/json",
//        },
//    })
//        .then((response) => {
//            if (!response.ok) {
//                throw new Error(`HTTP error! Status: ${response.status}`);
//            }
//            return response.json();
//        })
//        .then((data) => {
//            const categoryContainer = document.getElementById("categoryContainer");
//
//            if (data.status == "success") {
//                categoryContainer.innerHTML = "";
//                data.results.forEach(element => {
//                    categoryContainer.innerHTML += ` <div class="col-6 col-md-4 col-lg-2 alg-bg-categor alg-shadow mb-1 rounded mt-3 mx-4 px-3 alg-card-hover">
//
//                        <div class="d-flex flex-column align-items-center" id="categoryItem${element.category_id}">
//                            <img src="resources/image/car.jpg" alt="" class="alg-category-img mt-4 mb-4 img-fluid">
//                            <span class="mt-1 p-3 fw-bold text-whit pb-5 alg-text-h3">${element.category_type}</span>
//                        </div>
//                </div>`
//                    document.getElementById('categoryItem' + element.category_id).addEventListener('click', () => {
//                        alert("erfe")
//                        // loadCategoryItem(element.category_id)
//                    });
//                });
//
//            } else if (data.status == "failed") {
//                console.log(data.error);
//            } else {
//                console.log(data);
//            }
//        })
//        .catch((error) => {
//            console.error("Fetch error:", error);
//        });
//}
