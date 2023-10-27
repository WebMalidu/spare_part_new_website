SERVER_URL = "http://localhost:9001/";

//main dom loader
document.addEventListener("DOMContentLoaded", () => {
     const categoryItemId = document.body.dataset.category_item_id;
     loadRelatedModelForUser(categoryItemId);
});

const loadRelatedModelForUser = async (categoryItemId) => {

     try {
          const garageResponse = await fetch(SERVER_URL + 'backend/api/garageAPI.php');
          const responseData = await garageResponse.json();

          if (responseData.status === 'success') {
               const result = responseData.result;

               const resultArr = result.map((res) => res.model_id);
               const modelHasId = resultArr[0];
               loadProductCatalog(modelHasId, categoryItemId);
               // console.log(resultArr);
               // console.log(categoryItemId);

          } else {
               console.log(responseData.error);
          }

     } catch (error) {

          console.log(error);
     }


}

const loadProductCatalog = async (modelHasId, categoryItemId) => {

     try {
          console.log(modelHasId);
          console.log(categoryItemId);
          const productResponse = await fetch(SERVER_URL + 'backend/api/productManupulateAPI.php?vh_model_has_id=' + modelHasId + "&vh_category_item_id=" + categoryItemId);
          const productResponseData = await productResponse.json();


          const productCatalogContainer = document.getElementById('productCatalogContainer');
          productCatalogContainer.innerHTML = "";

          if (productResponseData.status === 'success') {
               const result = productResponseData.result;

               result.map((element) => {
                    let miniDescription =
                         getFirst15Words(element.description) + "...";

                    productCatalogContainer.innerHTML += `
                    <div class="col-6 col-md-4 col-lg-2 alg-bg-categor alg-shadow mb-1 rounded mt-3 mx-4 px alg-card-hover watchlist-hover">
                            <a href="singlePageView.php?parts_id=${element.parts_id}&vh_category_item_id=${element.category_item_category_item_id}&vh_model_id=${element.vehicle_models_has_modification_line_mdu_id}" class="text-decoration-none">
                                <div class="d-flex flex-column align-items-center justify-content-center">
                                    <span class="align-self-end"><i class="bi bi-heart-fill  watchlist-hovr"></i></span>
                                    <img src="resources/image/partsImages/partsId=${element.parts_id}_categoryItemId=${element.category_item_category_item_id}_image=1.jpg" alt="" class="alg-category-img mt-4 mb-4 img-fluid">
                                    <div class="d-flex flex-column profile-bg-gradient p-3 rounded">
                                        <div class="d-flex gap-2 gap-lg-5">
                                            <span class="fw-bold text-white alg-text-h3">${element.title}</span>
                                            <span class="fw-bold text-white alg-text-h3">LKR ${element.price}.00</span>
                                        </div>
                                        <span class="alg-text-p text-white-50">${miniDescription}</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    `
               });



          } else {
               console.log(productResponseData.error);
          }

     } catch (error) {

          console.log(error);
     }
}


function getFirst15Words(inputString) {
     // Split the input string into an array of words using whitespace as the delimiter
     const wordsArray = inputString.split(/\s+/);
     // Take the first 20 elements from the array using the slice method
     const first20WordsArray = wordsArray.slice(0, 8);
     // Join the first 20 words back together into a new string using whitespace as a separator
     const resultString = first20WordsArray.join(" ");
     return resultString;
}


