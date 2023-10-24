document.addEventListener("DOMContentLoaded", () => {
    loadCategory();
});



// load category
function loadCategory() {

    // fetch request
    fetch(SERVER_URL + "../../backend/api/categoriesLoad.php", {
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
                    categoryContainer.innerHTML += ` <div class="col-6 col-md-4 col-lg-2 alg-bg-categor alg-shadow mb-1 rounded mt-3 mx-4 px-3 alg-card-hover">
                    <a href="category.php" class="text-decoration-none">
                        <div class="d-flex flex-column align-items-center">
                            <img src="resources/image/car.jpg" alt="" class="alg-category-img mt-4 mb-4 img-fluid">
                            <span class="mt-1 p-3 fw-bold text-whit pb-5 alg-text-h3">${element.category_type}</span>
                        </div>
                </div></a>`
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


function promotionLoder(){
    
        
  

  // Send the data to the server using Fetch
  fetch("../../backend/api//productPromation.php", {
    method: "POST",
  })
    .then(response => response.json())
    .then(data => {
      // Handle the response data
      if (data.status === "success") {
        alert(data.status);
      } else {
        console.log(data.error);
      }
      console.log(data);
    })
    .catch(error => {
      console.error("Error:", error);
    });
    

}
promotionLoder()
