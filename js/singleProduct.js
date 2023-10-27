SERVER_URL = "http://localhost:9001/";

//main dom loader
document.addEventListener("DOMContentLoaded", () => {
     const parts_id = document.body.dataset.parts_id;
     const vh_category_item_id = document.body.dataset.vh_category_item_id;
     const vh_model_id = document.body.dataset.vh_model_id;

     loadSingleProduct(parts_id);
     loadProductCatalog(vh_model_id, vh_category_item_id);
});

//load single product
const loadSingleProduct = async (parts_id) => {
     
     try {

          const productResponse = await fetch(SERVER_URL + 'backend/api/productManupulateAPI.php?product_id=' + parts_id);
          const productResponseData = await productResponse.json();

          if (productResponseData.status === 'success') {
               const result = productResponseData.result;

               console.log(result);

          } else {
               console.log(productResponseData.error);
          }

     } catch (error) {

          console.log(error);
     }
}

//related product load
const loadProductCatalog = async (modelHasId, categoryItemId) => {

     try {
          console.log(modelHasId);
          console.log(categoryItemId);
          const productResponse = await fetch(SERVER_URL + 'backend/api/productManupulateAPI.php?vh_model_has_id=' + modelHasId + "&vh_category_item_id=" + categoryItemId);
          const productResponseData = await productResponse.json();


          // const productCatalogContainer = document.getElementById('productCatalogContainer');
          // productCatalogContainer.innerHTML = "";

          if (productResponseData.status === 'success') {
               const result = productResponseData.result;

               console.log(result);

          } else {
               console.log(productResponseData.error);
          }

     } catch (error) {

          console.log(error);
     }
}