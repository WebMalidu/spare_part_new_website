SERVER_URL = "";
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
    const productResponse = await fetch(
      SERVER_URL + "backend/api/productManupulateAPI.php?product_id=" + parts_id
    );
    const productResponseData = await productResponse.json();

    //pre defined variables for UI
    const reSimboles = 'Rs.';
    const qtySimble = 'QTY : ';
    const sellerNameDefined = 'Seller Name :';
    const brandNameDefined = 'Brand Name :';
    const carMaker = 'Car Market :';
    const year = 'Year :';
    const partsName = 'Part Number :';
    const className = 'Class : ';
    const modelLine = 'Model Line : ';
    const Modification = 'Modification : ';
    const origin = 'Origin : ';

    if (productResponseData.status === "success") {
      const data = productResponseData.result[0];

      // image slide handle
      const mainContainer = document.getElementById(
        "singleProductSliderMainContainer"
      );
      const secondaryContainer = document.getElementById(
        "singleProductSliderSecondaryContainer"
      );

    

      const descriptionContainer = document.getElementById('descriptionContainer');

      mainContainer.innerHTML = "";
      secondaryContainer.innerHTML = "";
      descriptionContainer.innerHTML = "";
      

      //get single product span
      const modelMaker = document.getElementById('modelMaker');
      const productTitle = document.getElementById('productTitle');
      const price = document.getElementById('price');
      const qtyContainer = document.getElementById('qtyContainer');
      const sellerName = document.getElementById('sellerName');
      const carYear = document.getElementById('carYear');
      const ProductId = document.getElementById('ProductId');
      const categotyItemName = document.getElementById('categotyItemName');
      const carModel = document.getElementById('carModel');
      const carModelLine = document.getElementById('carModelLine');
      const carOrigin = document.getElementById('carOrigin');
      


      //get result object
      const dataResultObject = data.result;

      //set real data
      modelMaker.textContent = dataResultObject.name;
      productTitle.textContent = dataResultObject.title;
      price.textContent = `${reSimboles}${dataResultObject.price}`;

      //qty available  set
      dataResultObject.qty > 0 ? qtyContainer.textContent = `${qtySimble}${dataResultObject.qty}` : qtyContainer.textContent = 'Currently Unavailable';
      sellerName.textContent = `${sellerNameDefined} ${dataResultObject.full_name}`;
      brandName.textContent = `${brandNameDefined} ${dataResultObject.brand_name}`;
      carMaker.textContent = `${carMaker} ${dataResultObject.name}`;
      carYear.textContent = `${year} ${dataResultObject.year}`;
      ProductId.textContent = `${partsName} ${dataResultObject.parts_id}`;
      categotyItemName.textContent = `${className} ${dataResultObject.category_item_name}`;
      carModel.textContent = `${modelLine} ${dataResultObject.vh_name}`;
      carModelLine.textContent = `${Modification} ${dataResultObject.mod}`;
      carOrigin.textContent = `${origin} ${dataResultObject.brand_name}`;

      //set a description
      descriptionContainer.innerHTML += `<p>${dataResultObject.description}</p>`;

      

      
      let index = 1;
      data.images.forEach((element) => {
        const imageUrl = `resources/image/partsImages/${element}`;

        // main slider
        const mainSliderSlideDesign = `<div class="swiper-slide">
                                            <img src="${imageUrl}" />.
                                        </div>`;
        mainContainer.innerHTML += mainSliderSlideDesign;

        // secondary slider
        const secondarySlideDesign = `<div class="swiper-slide">
                                             <img src="${imageUrl}" />
                                        </div>`;
        secondaryContainer.innerHTML += secondarySlideDesign;

        singleProductSliderCreated();
        index++;
      });
    } else {
      console.log(productResponseData.error);
    }
  } catch (error) {
    console.log(error);
  }
};

//related product load
const loadProductCatalog = async (modelHasId, categoryItemId) => {
  try {
    console.log(modelHasId);
    console.log(categoryItemId);
    const productResponse = await fetch(
      SERVER_URL +
      "backend/api/productManupulateAPI.php?vh_model_has_id=" +
      modelHasId +
      "&vh_category_item_id=" +
      categoryItemId
    );
    const productResponseData = await productResponse.json();

    const productSliders = document.getElementById('productSliders');

    if (productResponseData.status === "success") {
      const result = productResponseData.result;

      result.map((element) => {
        let miniDescription =
        First15Words.getFirst15Words(element.description) + "...";
        
        productSliders.innerHTML += `


     

                 
        <div class="swiper-slide">

        <div class="alg-shadow mb-1 alg-bg-category-item rounded mt-3 mx-4 px alg-card-hover watchlist-hover" onclick="garageModel();">
            <a href="singlePageView.php?parts_id=${element.parts_id}&vh_category_item_id=${element.category_item_category_item_id}&vh_model_id=${element.vehicle_models_has_modification_line_mdu_id}" class="text-decoration-none">
                <div class="d-flex flex-column align-items-center justify-content-center">
                    <span class="align-self-end"><i class="bi bi-heart-fill  watchlist-hovr "></i></span>
                    <img src="resources/image/partsImages/partsId=pp_305615_categoryItemId=CTI_259049_image=3.jpg" alt="category" class="alg-category-im mt-4 mb-4 img-fluid d-flex" style="width:100px;height:60px;">
                    <div class="d-flex flex-column profile-bg-gradient p-3 rounded categ-itm-sec text-start">
                        <div class="d-flex gap-2 gap-lg-3">
                            <span class="fw-bold text-white alg-text-p">${element.title}</span>
                            <span class="fw-bold text-white alg-text-h3">LKR ${element.price}.00</span>
                        </div>
                        <span class="alg-text-p text-white-50">${miniDescription}</span>
                    </div>
                </div>
            </a>
        </div>

    </div>


                     
        `;
      });

      console.log(result);

    } else {
      console.log(productResponseData.error);
    }
  } catch (error) {
    console.log(error);
  }
};





//add to cart

