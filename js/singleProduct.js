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
    const productResponse = await fetch(
      SERVER_URL + "backend/api/productManupulateAPI.php?product_id=" + parts_id
    );
    const productResponseData = await productResponse.json();

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
      mainContainer.innerHTML = "";
      secondaryContainer.innerHTML = "";

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

    const relatedProductContainer = document.getElementById('relatedProductContainer');

    if (productResponseData.status === "success") {
      const result = productResponseData.result;

      // result.map((element) => {
      //   relatedProductContainer.innerHTML += `



      //   `;
      // });

      console.log(result);

    } else {
      console.log(productResponseData.error);
    }
  } catch (error) {
    console.log(error);
  }
};
