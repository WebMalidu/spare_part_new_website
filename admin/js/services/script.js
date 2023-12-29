//get sender
const dataSend = new Sender();

document.addEventListener("DOMContentLoaded", async () => { });



// product adding setup 
let productImages = [];


function clearAllInput() {
       document.getElementById('productTitleInputField').value = "";
       document.getElementById('sectionOrigin').value = 0;
       document.getElementById('productQty').value = "";
       document.getElementById('productDescriptionInputField').value = "";
       document.getElementById('productPrice').value = "";
       document.getElementById('productBrand').value = 0;
       document.getElementById('productCategoryItem').value = 0;
       document.getElementById('productModelLine').value = 0;
       document.getElementById('productShippingPrice').value = "";
       document.getElementById('productItemImagePreviewContainer').innerHTML = "";
}

function clearCatalogInput() {
       document.getElementById('categorySelector').value = 0;
       document.getElementById('categoryItemName').value = "";
       document.getElementById('categoryItemImageInput').innerHTML = "";
}


async function addProduct(event) {

       event.target.disabled = true;

       //get all request data
       let productTitle = document.getElementById('productTitleInputField').value;
       let sectionOrigin = document.getElementById('sectionOrigin').value;
       let productQty = document.getElementById('productQty').value;
       let productDescriptionInputField = document.getElementById('productDescriptionInputField').value;
       let productPrice = document.getElementById('productPrice').value;
       let productBrand = document.getElementById('productBrand').value;
       let productCategoryItem = document.getElementById('productCategoryItem').value;
       let productModelLine = document.getElementById('productModelLine').value;
       let productShippingPrice = document.getElementById('productShippingPrice').value;

       // image handle
       let tempDataUrlArray = [];

       for (let index = 0; index < productImages.length; index++) {
              try {
                     const element = productImages[index];

                     const imageDataUrl = await ALG.compressImageFromDataUrl(element);
                     tempDataUrlArray.push(imageDataUrl);
              } catch (error) {
                     console.error("error : " + error);
              }
       }
       productImages = tempDataUrlArray;

       const insertData = {
              "ad_title": productTitle,
              "ad_origin_id": sectionOrigin,
              "ad_qty": productQty,
              "ad_description": productDescriptionInputField,
              "ad_price": productPrice,
              "ad_brand_id": productBrand,
              "ad_model_id": productModelLine,
              "ad_category_id": productCategoryItem,
              "shipping_price": productShippingPrice,
              "ad_parts_img": productImages,
       }

       const sendData = JSON.stringify(insertData);

       const formData = new FormData();
       formData.append("insertData", sendData);

       const addProductResponse = await dataSend.dataIUD(formData, 'backend/api/productManupulateAPI.php');
       console.log(addProductResponse);

       if (addProductResponse.status === "success") {
              ALG.openToast("Success", "Product Adding Success", ALG.getCurrentTime(), "bi-heart", "Success");

              //clear all inputs
              clearAllInput();

       } else {
              ALG.openToast("Error", addProductResponse.error, ALG.getCurrentTime(), "bi-heart", "Error");
       }

       event.target.disabled = false;
}

//upload vehicle models 
async function addModel(event) {
       event.target.disabled = true;

       //get all request data
       let vhNamesSelector = document.getElementById('vhNamesSelector').value;
       let vhTypeSelector = document.getElementById('vhTypeSelector').value;
       let vhYearSelector = document.getElementById('vhYearSelector').value;
       let vhGenerationSelector = document.getElementById('vhGenerationSelector').value;
       let vehicleModelImage = document.getElementById('vehicleImagesInput').files[0];



       const formData = new FormData();
       formData.append('ad_vehicle_name_id', vhNamesSelector);
       formData.append('ad_vehicle_type_id', vhTypeSelector);
       formData.append('ad_vehicle_year_Id', vhYearSelector);
       formData.append('ad_generation_id', vhGenerationSelector);
       formData.append('ad_model_img', vehicleModelImage);

       const vehicleModelResponse = await dataSend.dataIUD(formData, 'backend/api/vehicleModelAPI.php');

       if (vehicleModelResponse.status === 'success') {
              ALG.openToast("Success", "Vehicle model adding success", ALG.getCurrentTime(), "bi-heart", "Success");
              setTimeout(() => {
                     window.location.reload();
              }, 1000);

       } else {
              ALG.openToast("Error", vehicleModelResponse.error, ALG.getCurrentTime(), "bi-heart", "Error");
       }

       event.target.disabled = false;

}

//open vehicle model delete model
function openModelDeleteModel(model_id) {
       ALG.openModel("Vehicle Model Delete", "Do you want to delete this vehicle model ?", `<button  class="alg-btn-pill" data-bs-dismiss="modal" aria-label="Close" onclick="removeModel('${model_id}')">Yes</button>`);
}

//delete vehicle model
const removeModel = async (model_id) => {
       const formData = new FormData();
       formData.append("del_model_id", model_id);

       const modelResponse = await dataSend.dataIUD(formData, 'backend/api/vehicleModelAPI.php');

       if (modelResponse.status === 'success') {

              ALG.openToast("Success", "Vehicle model delete success", ALG.getCurrentTime(), "bi-heart", "Success");
              setTimeout(() => {
                     window.location.reload();
              }, 1000);

       } else {
              ALG.openToast("Error", modelResponse.error, ALG.getCurrentTime(), "bi-heart", "Error");
       }

};


//product images preview 
function previewProductListImages(event) {
       const imgPreview = document.getElementById('productItemImagePreviewContainer');
       imgPreview.innerHTML = "";

       const files = event.target.files;

       for (const key in files) {

              if (Object.hasOwnProperty.call(files, key)) {
                     let read = new FileReader();

                     read.onload = (e) => {
                            let img = document.createElement('img');
                            const dataURL = e.target.result;
                            img.classList.add('preview-thumb', 'w-25', 'h-25', 'rounded', 'p-3');
                            img.src = dataURL;
                            // productImagesURL = dataURL;
                            productImages.push(dataURL);
                            imgPreview.appendChild(img);
                     }

                     read.readAsDataURL(files[key]);
              }


       }
}

//vehicle model images preview load
function vhModelImagePreview(event) {

       const imgPreview = document.getElementById('modeImagePreviewContainer');
       imgPreview.innerHTML = "";

       const files = event.target.files;

       for (const key in files) {

              if (Object.hasOwnProperty.call(files, key)) {
                     let read = new FileReader();

                     read.onload = (e) => {
                            let img = document.createElement('img');
                            const dataURL = e.target.result;
                            img.classList.add('preview-thumb', 'w-25', 'h-25', 'rounded', 'p-3');
                            img.src = dataURL;
                            imgPreview.appendChild(img);
                     }

                     read.readAsDataURL(files[key]);
              }


       }

}

//product catalog adding
async function addCatalog(e) {

       e.target.disabled = true;

       const categorySelector = document.getElementById('categorySelector').value;
       const categoryItemName = document.getElementById('categoryItemName').value;
       const categoryItemImageInput = document.getElementById('categoryItemImageInput').files[0];

       if (document.getElementById('categorySelector').value === "undefined") {
              ALG.openToast("Warning", "Please select the category", ALG.getCurrentTime(), "bi-heart", "Error");
              e.target.disabled = false;
              return
       }

       if (document.getElementById('categoryItemName').value === "") {
              ALG.openToast("Warning", "Please enter the catalog name", ALG.getCurrentTime(), "bi-heart", "Error");
              e.target.disabled = false;
              return
       }

       if (categoryItemImageInput === undefined || categoryItemImageInput === null) {
              ALG.openToast("Warning", "Please enter the catalog image", ALG.getCurrentTime(), "bi-heart", "Error");
              e.target.disabled = false;
              return
       }

       const formData = new FormData();
       formData.append('category_id', categorySelector);
       formData.append('category_item_name', categoryItemName);
       formData.append('category_item_image', categoryItemImageInput);

       const categoryItemResponse = await dataSend.dataIUD(formData, 'backend/api/categoryItemAdding.php');

       if (categoryItemResponse.status === 'success') {
              ALG.openToast("Success", "Vehicle category item adding success", ALG.getCurrentTime(), "bi-heart", "Success");
              clearCatalogInput();
              setTimeout(() => {
                     window.location.reload();
              }, 1000);
       } else {
              ALG.openToast("Error", categoryItemResponse.error, ALG.getCurrentTime(), "bi-heart", "Error");
       }

       e.target.disabled = false;
}

//catalog image preview
function categoryItemImageChange(event) {

       const imgPreview = document.getElementById('categoryItemImagePreviewContainer');
       imgPreview.innerHTML = "";

       const files = event.target.files;

       for (const key in files) {

              if (Object.hasOwnProperty.call(files, key)) {
                     let read = new FileReader();

                     read.onload = (e) => {
                            let img = document.createElement('img');
                            const dataURL = e.target.result;
                            img.classList.add('preview-thumb', 'w-50', 'h-50', 'rounded', 'p-3');
                            img.src = dataURL;
                            imgPreview.appendChild(img);
                     }

                     read.readAsDataURL(files[key]);
              }


       }

}

//delete product catalog
async function openVhCategoryItemsDeleteModel(category_item_id) {
       ALG.openModel("Product Catalog Remove Model", "Do you want to delete this product catalog ?", `<button  class="alg-btn-pill" data-bs-dismiss="modal" aria-label="Close" onclick="removeCategoryItem('${category_item_id}')">Yes</button>`);
}

const removeCategoryItem = async (category_item_id) => {
       const formData = new FormData();
       formData.append("category_item_id", category_item_id);

       const categoryItemRes = await dataSend.dataIUD(formData, 'backend/api/categoryItemDelete.php');

       if (categoryItemRes.status === 'success') {
              ALG.openToast("Success", "Product catalog delete success", ALG.getCurrentTime(), "bi-heart", "Success");
              setTimeout(() => {
                     window.location.reload();
              }, 1000);
       } else {
              ALG.openToast("Error", categoryItemRes.error, ALG.getCurrentTime(), "bi-heart", "Error");
       }

};


//category image preview
function categoryImageChange(event) {

       const imgPreview = document.getElementById('categoryImagePreviewContainer');
       imgPreview.innerHTML = "";

       const files = event.target.files;

       for (const key in files) {

              if (Object.hasOwnProperty.call(files, key)) {
                     let read = new FileReader();

                     read.onload = (e) => {
                            let img = document.createElement('img');
                            const dataURL = e.target.result;
                            img.classList.add('preview-thumb', 'w-50', 'h-50', 'rounded', 'p-3');
                            img.src = dataURL;
                            imgPreview.appendChild(img);
                     }

                     read.readAsDataURL(files[key]);
              }


       }

}

//category Adding
async function addCategory(e) {

       e.target.disabled = true;

       const categoryName = document.getElementById('categoryName').value;
       const categoryImageInput = document.getElementById('categoryImageInput').files[0];

       if (document.getElementById('categoryName').value === "") {
              ALG.openToast("Warning", "Please enter the category name", ALG.getCurrentTime(), "bi-heart", "Error");
              e.target.disabled = false;
              return
       }

       if (categoryImageInput === undefined || categoryImageInput === null) {
              ALG.openToast("Warning", "Please enter the category image", ALG.getCurrentTime(), "bi-heart", "Error");
              e.target.disabled = false;
              return
       }

       const formData = new FormData();
       formData.append('category', categoryName);
       formData.append('category_image', categoryImageInput);

       const categoryResponse = await dataSend.dataIUD(formData, 'backend/api/categoriesAdding.php');

       if (categoryResponse.status === 'success') {
              ALG.openToast("Success", "Vehicle category  adding success", ALG.getCurrentTime(), "bi-heart", "Success");
              // clearCatalogInput();
              setTimeout(() => {
                     window.location.reload();
              }, 1000);
       } else {
              ALG.openToast("Error", categoryResponse.error, ALG.getCurrentTime(), "bi-heart", "Error");
       }

       e.target.disabled = false;
}

//category delete
async function openVhCategoryDeleteModel(category_id) {
       ALG.openModel("Product Category Remove Model", "Do you want to delete this product catalog ?", `<button  class="alg-btn-pill" data-bs-dismiss="modal" aria-label="Close" onclick="removeCategory('${category_id}')">Yes</button>`);
}

const removeCategory = async (category_id) => {
       const formData = new FormData();
       formData.append("category_id", category_id);

       const categoryRes = await dataSend.dataIUD(formData, 'backend/api/categoryDelete.php');

       if (categoryRes.status === 'success') {
              ALG.openToast("Success", "Product category delete success", ALG.getCurrentTime(), "bi-heart", "Success");
              setTimeout(() => {
                     window.location.reload();
              }, 1000);
       } else {
              ALG.openToast("Error", categoryRes.error, ALG.getCurrentTime(), "bi-heart", "Error");
       }

};



//delete product
async function openVhPartDeleteModel(parts_id) {
       ALG.openModel("Product Remove Model", "Do you want to delete this product ?", `<button  class="alg-btn-pill" data-bs-dismiss="modal" aria-label="Close" onclick="removeProduct('${parts_id}')">Yes</button>`);

}

//delete product process
const removeProduct = async (parts_id) => {


       const formData = new FormData();
       formData.append("del_parts_id", parts_id);

       const productRemoveResponse = await dataSend.dataIUD(formData, 'backend/api/productManupulateAPI.php');

       if (productRemoveResponse.status === 'success') {
              ALG.openToast("Success", "Product delete success", ALG.getCurrentTime(), "bi-heart", "Success");
              setTimeout(() => {
                     window.location.reload();
              }, 1000);


       } else {
              ALG.openToast("Error", productRemoveResponse.error, ALG.getCurrentTime(), "bi-heart", "Error");
       }
};

//vehicle makers adding
const addMakers = async (event) => {
       const vehicleMaker = document.getElementById("addMakersInput").value;

       if (vehicleMaker === 'undefined' || vehicleMaker === null || vehicleMaker.trim().length === 0) {
              ALG.openToast("Error", "Empty maker name", ALG.getCurrentTime(), "bi-heart", "Error");
              return;
       }

       event.target.disabled = true;

       const formData = new FormData();
       formData.append("ad_makers_name", vehicleMaker);

       const dataResponse = await dataSend.dataIUD(formData, "backend/api/vehicleMakersAPI.php");
       if (dataResponse.status === 'success') {
              ALG.openToast("Success", "Maker adding success", ALG.getCurrentTime(), "bi-heart", "Success");
              setTimeout(() => {
                     loadMakers;
              }, 1000);
       } else {
              ALG.openToast("Error", dataResponse.error, ALG.getCurrentTime(), "bi-heart", "Error");
       }

       event.target.disabled = false;

};
//remove makers

const openMakerDeleteModel = async (makers_id) => {
       ALG.openModel("Vehicle Remove Model", "Do you want to delete this Vehicle Maker ?", `<button  class="alg-btn-pill" data-bs-dismiss="modal" aria-label="Close" onclick="removeMakers('${makers_id}')">Yes</button>`);
};

const removeMakers = async (makers_id) => {
       const formData = new FormData();
       formData.append('del_maker_id', makers_id);

       const responseMakers = await dataSend.dataIUD(formData, 'backend/api/vehicleMakersAPI.php');
       if (responseMakers.status === 'success') {
              ALG.openToast("Success", "Maker remove success", ALG.getCurrentTime(), "bi-heart", "Success");
              setTimeout(() => {
                     loadMakers;
              }, 1000);
       } else {
              ALG.openToast("Error", responseMakers.error, ALG.getCurrentTime(), "bi-heart", "Error");
       }
};


//vehicles names adding
const addNames = async (e) => {
       const vhName = document.getElementById("addNamesInput").value;
       const vhMakerId = document.getElementById('vhMakersSelector').value;

       e.target.disabled = true;

       const formData = new FormData();
       formData.append('ad_vhName', vhName);
       formData.append('ad_vh_maker_id', vhMakerId);

       const responseNames = await dataSend.dataIUD(formData, 'backend/api/vehicleNames.php');
       if (responseNames.status === 'success') {
              ALG.openToast("Success", "vehicle names adding success", ALG.getCurrentTime(), "bi-heart", "Success");

              //clear input fields
              document.getElementById("addNamesInput").value = "";
              document.getElementById('vhMakersSelector').value = 0;
       } else {
              ALG.openToast("Error", responseNames.error, ALG.getCurrentTime(), "bi-heart", "Error");
       }

       e.target.disabled = false;
}


//vehicle names remove
const openNamesDeleteModel = async (name_id) => {
       ALG.openModel("Vehicle names remove", "Do you want to delete this vehicle name?", `<button  class="alg-btn-pill" data-bs-dismiss="modal" aria-label="Close" onclick="removeNames('${name_id}')">Yes</button>`);
}

const removeNames = async (name_id) => {
       const formData = new FormData();
       formData.append('del_name_id', name_id);

       const responseNames = await dataSend.dataIUD(formData, 'backend/api/vehicleNames.php');
       if (responseNames.status === 'success') {
              ALG.openToast("Success", "Vehicle name remove success", ALG.getCurrentTime(), "bi-heart", "Success");

       } else {
              ALG.openToast("Error", responseNames.error, ALG.getCurrentTime(), "bi-heart", "Error");
       }
};

//add vehicle modification lines
const addVhModelLine = async (e) => {

       e.target.disabled = true;

       const modelSelector = document.getElementById('vhModelSelector').value;
       const vhModelLineSelector = document.getElementById('vhModelLineSelector').value;


       if (document.getElementById('vhModelSelector').value === "undefined") {
              ALG.openToast("Warning", "Select Vehicle Model", ALG.getCurrentTime(), "bi-heart", "Error");
              e.target.disabled = false;
              return
       }


       if (document.getElementById('vhModelLineSelector').value === "undefined") {
              ALG.openToast("Warning", "Select Modification Line", ALG.getCurrentTime(), "bi-heart", "Error");
              e.target.disabled = false;
              return
       }



       const formData = new FormData();
       formData.append("ad_model_id", modelSelector);
       formData.append("ad_model_line_id", vhModelLineSelector);

       const modelLineResponse = await dataSend.dataIUD(formData, 'backend/api/vehicleModelModification.php');

       if (modelLineResponse.status === 'success') {
              ALG.openToast("Success", "Vehicle model line added success", ALG.getCurrentTime(), "bi-heart", "Success");
              // loadModelLine();

              window.location.reload();


       } else {
              ALG.openToast("Error", modelLineResponse.error, ALG.getCurrentTime(), "bi-heart", "Error");
       }
       e.target.disabled = false;
};

//remove model line
const openModelLineRemoveModel = async (mdu_id) => {
       ALG.openModel("Vehicle modification line remove",
              "Do you want to delete this vehicle modification line?",
              `<button  class="alg-btn-pill" data-bs-dismiss="modal" aria-label="Close" onclick="removeModificationLine('${mdu_id}')">Yes</button>`);
};

const removeModificationLine = async (mdu_id) => {

       const formData = new FormData();
       formData.append("del_model_line_id", mdu_id);

       const modelLineResponse = await dataSend.dataIUD(formData, 'backend/api/vehicleModelModification.php');
       console.log(modelLineResponse);
       if (modelLineResponse.status === 'success') {
              ALG.openToast("Success", "Vehicle model line delete success", ALG.getCurrentTime(), "bi-heart", "Success");

       } else {
              ALG.openToast("Error", modelLineResponse.error, ALG.getCurrentTime(), "bi-heart", "Error");
       }
};







