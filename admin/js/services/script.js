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


async function addProduct(event) {

       // event.target.disabled = true;

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

       if (addProductResponse.status === "success") {
              ALG.openToast("Success", "Product Adding Success", ALG.getCurrentTime(), "bi-heart", "Success");

              //clear all inputs
              clearAllInput();

       } else {
              ALG.openToast("Error", addProductResponse.error, ALG.getCurrentTime(), "bi-heart", "Error");
       }

       // event.target.disabled = false;
}



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






