SERVER_URL = "";
//main dom loader
document.addEventListener("DOMContentLoaded", () => {
  const categoryItemId = document.body.dataset.category_item_id;
  id = categoryItemId;
  loadRelatedModelForUser(categoryItemId);
  loadCategory();
});
let modelHasId;
let id;

const loadRelatedModelForUser = async (categoryItemId) => {
  try {
    const garageResponse = await fetch(
      SERVER_URL + "backend/api/garageAPI.php"
    );
    const responseData = await garageResponse.json();

    if (responseData.status === "success") {
      const result = responseData.result;

      const resultArr = result.map((res) => res.model_id);

      //check length for result array
      const length = resultArr.length;

      //if length more than 1 then open vh select model
      if (length > 1) {
        loadGarageData(categoryItemId);
      } else {
        modelHasId = resultArr[0];
        loadProductCatalog(modelHasId, categoryItemId);
      }
    } else {
      console.log(responseData.error);
      openGarageModel();
      vehicleDataFetch();
      vehicleMakers();
    }
  } catch (error) {
    console.log(error);
  }
};

let count = 0;
document.getElementById("next").addEventListener("click", () => {
  count += 1;
  load(count);
});

document.getElementById("previous").addEventListener("click", () => {
  count -= 1;
  load(count);
});

function load(x) {
  count = x;
  console.log(count);
  loadProductCatalog(modelHasId, id);
}

//load all product catalog
const loadProductCatalog = async (
  modelHasId,
  categoryItemId,
  stockId = "1",
  originId = "1"
) => {
  try {
    const productResponse = await fetch(
      SERVER_URL +
      "backend/api/productManupulateAPI.php?vh_model_has_id=" +
      modelHasId +
      "&vh_category_item_id=" +
      categoryItemId +
      "&vh_status_id=" +
      stockId +
      "&vh_origin_id=" +
      originId
    );
    const productResponseData = await productResponse.json();

    const productCatalogContainer = document.getElementById(
      "productCatalogContainer"
    );
    const brandCheckBoxContainer = document.getElementById(
      "brandCheckBoxContainer"
    );
    const brandCheckBoxNameContainer = document.getElementById(
      "brandCheckBoxNameContainer"
    );

    productCatalogContainer.innerHTML = "";
    brandCheckBoxContainer.innerHTML = "";
    brandCheckBoxNameContainer.innerHTML = "";

    if (productResponseData.status === "success") {
      const result = productResponseData.result;

      const perPageCount = 12;
      const startIndex = count * perPageCount;
      const endIndex = startIndex + perPageCount;
      const paginatedResults = result.slice(startIndex, endIndex);

      let lenght = result.length;
      let divide = lenght / perPageCount;
      let number = Math.ceil(divide);

      let paginationContainer = document.getElementById("paginationContainer");
      paginationContainer.innerHTML = "";
      page = 0;

      for (let x = 0; x <= number - 1; x++) {
        paginationContainer.innerHTML += `
                        <li class="page-item ${x == count ? "active" : ""
          }" onclick="load(${x});">
                            <a class="page-link" href="#">${x + 1}</a>
                        </li>`;
      }

      let brandId = [];
      let brandName = [];

      paginatedResults.map((element) => {
        let miniDescription =
          First15Words.getFirst15Words(element.description) + "...";

        productCatalogContainer.innerHTML += `
                    <div class="col-6 col-md-4 col-lg-2 alg-shadow mb-1 alg-bg-category-item rounded mt-3 mx-4 px alg-card-hover watchlist-hover" onclick="garageModel();">
                            <a href="singlePageView.php?parts_id=${element.parts_id}&vh_category_item_id=${element.category_item_category_item_id}&vh_model_id=${element.vehicle_models_has_modification_line_mdu_id}" class="text-decoration-none">
                                <div class="d-flex flex-column align-items-center justify-content-center">
                                    <span class="align-self-end"><i class="bi bi-heart-fill  watchlist-hovr" onclick="addWatchlist('${element.parts_id}')"></i></span>
                                    <img src="resources/image/partsImages/partsId=${element.parts_id}_categoryItemId=${element.category_item_category_item_id}_image=1.jpg" alt="" class="alg-category-img mt-4 mb-4 img-fluid">
                                    <div class="d-flex flex-column profile-bg-gradient p-3 rounded categ-itm-sec">
                                        <div class="d-flex gap-2 gap-lg-3">
                                            <span class="fw-bold text-white alg-text-p">${element.title}</span>
                                            <span class="fw-bold text-white alg-text-h3">LKR ${element.price}.00</span>
                                        </div>
                                        <span class="alg-text-p text-white-50">${miniDescription}</span>
                                    </div>
                                </div>
                              
                            </a>
                        </div>
                    `;
        brandName.push(element.brand_name);
        brandId.push(element.brand_id);
      });

      //brand filtering
      let setId = new Set(brandId);
      const brandIdSet = Array.from(setId);

      brandIdSet.map((item) => {
        brandCheckBoxContainer.innerHTML += `
                    <input class="form-check-input"  for="brand" value="${item}" type="checkbox" name="brandCheck">
                    `;
      });

      let setNames = new Set(brandName);
      const brandNameSet = Array.from(setNames);

      brandNameSet.map((item) => {
        brandCheckBoxNameContainer.innerHTML += `
                    <span class="alg-text-h3  alg-text-light">${item}</span>
                    `;
      });
    } else {
      console.log(productResponseData.error);
    }
  } catch (error) {
    console.log(error);
  }
};

let hasRunBrandChecked = false;
let hasRunBrandUnChecked = false;

function clearInnerHTMl() {
  if (!hasRunBrandChecked) {
    console.log("run once");
    productCatalogContainer.innerHTML = "";
    hasRunBrandChecked = true;
  } else {
    console.log("already run");
  }
}
function clearInnerHTMlBrandUnChecked() {
  if (!hasRunBrandUnChecked) {
    console.log("run once uncked");
    productCatalogContainer.innerHTML = "";
    hasRunBrandUnChecked = true;
  } else {
    console.log("already run");
  }
}

const relatedBrandSearch = (brandId) => {
  resultSet
    .filter((res) => res.brand_id === brandId)
    .map((element) => {
      let miniDescription = getFirst15Words(element.description) + "...";

      // productCatalogContainer.innerHTML = "";
      productCatalogContainer.innerHTML += `
          <div class="col-6 col-md-4 col-lg-2 alg-shadow mb-1 alg-bg-category-item rounded mt-3 mx-4 px alg-card-hover watchlist-hover" onclick="garageModel();">
             <a href="singlePageView.php?parts_id=${element.parts_id}&vh_category_item_id=${element.category_item_category_item_id}&vh_model_id=${element.vehicle_models_has_modification_line_mdu_id}" class="text-decoration-none">
                 <div class="d-flex flex-column align-items-center justify-content-center">
                     <span class="align-self-end"><i class="bi bi-heart-fill  watchlist-hovr"></i></span>
                     <img src="resources/image/partsImages/partsId=${element.parts_id}_categoryItemId=${element.category_item_category_item_id}_image=1.jpg" alt="" class="alg-category-img mt-4 mb-4 img-fluid">
                     <div class="d-flex flex-column profile-bg-gradient p-3 rounded categ-itm-sec">
                         <div class="d-flex gap-2 gap-lg-3">
                             <span class="fw-bold text-white alg-text-p">${element.title}</span>
                             <span class="fw-bold text-white alg-text-h3">LKR ${element.price}.00</span>
                         </div>
                         <span class="alg-text-p text-white-50">${miniDescription}</span>
                     </div>
                 </div>
             </a>
          </div>
     `;
    });
};

const uncheckedBrandSearch = (brandId) => {
  resultSet
    .filter((res) => res.brand_id != brandId)
    .map((element) => {
      let miniDescription = getFirst15Words(element.description) + "...";

      // productCatalogContainer.innerHTML = "";
      productCatalogContainer.innerHTML += `
          <div class="col-6 col-md-4 col-lg-2 alg-shadow mb-1 alg-bg-category-item rounded mt-3 mx-4 px alg-card-hover watchlist-hover" onclick="garageModel();">
             <a href="singlePageView.php?parts_id=${element.parts_id}&vh_category_item_id=${element.category_item_category_item_id}&vh_model_id=${element.vehicle_models_has_modification_line_mdu_id}" class="text-decoration-none">
                 <div class="d-flex flex-column align-items-center justify-content-center" style="z-index: -10;">
                     <span class="align-self-end"><i class="bi bi-heart-fill  watchlist-hovr" onmouseover="addWatchlist('${element.parts_id}')"></i></span>
                     <img src="resources/image/partsImages/partsId=${element.parts_id}_categoryItemId=${element.category_item_category_item_id}_image=1.jpg" alt="" class="alg-category-img mt-4 mb-4 img-fluid">
                     <div class="d-flex flex-column profile-bg-gradient p-3 rounded categ-itm-sec">
                         <div class="d-flex gap-2 gap-lg-3">
                             <span class="fw-bold text-white alg-text-p">${element.title}</span>
                         <span class="fw-bold text-white alg-text-h3">LKR ${element.price}.00 </span>
                         </div>
                         <span class="alg-text-p text-white-50">${miniDescription}</span>
                     </div>
                 </div>
             </a>
          </div>
     `;
    });
};

//keyword minimized
function getFirst15Words(inputString) {
  // Split the input string into an array of words using whitespace as the delimiter
  const wordsArray = inputString.split(/\s+/);
  // Take the first 20 elements from the array using the slice method
  const first20WordsArray = wordsArray.slice(0, 8);
  // Join the first 20 words back together into a new string using whitespace as a separator
  const resultString = first20WordsArray.join(" ");
  return resultString;
}

// open garage model
let vhSelectModel;
function openGarageVhSelect() {
  vhSelectModel = new bootstrap.Modal("#vhSelectModel");
  vhSelectModel.show();
}
//close mode
function closeGarageVhSelect() {
  if (vhSelectModel) {
    vhSelectModel.hide();
  }
}

// load garage data
const loadGarageData = async (categoryItemId) => {
  const mainContainer = document.getElementById("selectVhMainContainer");

  try {
    const garageDataResponse = await fetch(
      SERVER_URL + "backend/api/garageAPI.php"
    );
    const garageResult = await garageDataResponse.json();

    if (garageResult.status === "success") {
      mainContainer.innerHTML = "";

      const result = garageResult.result;

      result.map((element) => {
        mainContainer.innerHTML += `
                    
               <div class="alg-shadow py-2 garage-card">
                    <div class="d-flex flex-column">
                        <div class="d-flex justify-content-end gap-2 px-2">
                            <span><i class="bi bi-trash3-fill"></i></span>
                        </div>
                        <div class="d-flex justify-content-center"><img src="${element.model_image}"class="alg-category-img" alt="car_img"></div>
                        <div class="d-flex flex-column py-3 px-4 pt-4">
                            <span class="alg-text-h3 fw-bold">${element.vh_name}</span>
                            <span class="alg-text-h3">${element.vehicale}</span>
                            <span class="alg-text-h3">${element.mod}</span>
                            <span class="alg-text-h3">${element.generation}</span>
                            <span class="alg-text-h3">Model Year: ${element.year}</span>
                            <button class="btn btn-primary" onclick="selectModelHandle(${element.model_id},'${categoryItemId}');">Select</button>
                        </div>
                    </div>
                </div>


                    
                    `;
      });

      openGarageVhSelect();
    } else {
      console.log(garageResult.error);
    }
  } catch (error) {
    console.log(error);
  }
};

//model handle
const selectModelHandle = (mduId, categoryItemId) => {
  //load product catalog
  loadProductCatalog(mduId, categoryItemId);

  //close select mode
  closeGarageVhSelect();
};

//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>****Product filtering section****<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<//

let statusId;
let originId;

//get a radio in a stock value
document
  .getElementById("productStatusCheckbox1")
  .addEventListener("change", () => {
    const categoryItemId = document.body.dataset.category_item_id;
    const radio = document.getElementById("productStatusCheckbox1");
    statusId = radio.value;
    radio.checked = true
      ? loadProductCatalog(modelHasId, categoryItemId, radio.value, originId)
      : loadProductCatalog(modelHasId, categoryItemId);
  });

//get a radio out of stock
document
  .getElementById("productStatusCheckbox2")
  .addEventListener("change", () => {
    const radio2 = document.getElementById("productStatusCheckbox2");
    statusId = radio2.value;
    const categoryItemId = document.body.dataset.category_item_id;
    radio2.checked = true
      ? loadProductCatalog(modelHasId, categoryItemId, radio2.value, originId)
      : loadProductCatalog(modelHasId, categoryItemId);
  });
//get a radio in a stock value
document.getElementById("originCheckbox1").addEventListener("change", () => {
  const categoryItemId = document.body.dataset.category_item_id;
  const radio = document.getElementById("originCheckbox1");
  originId = radio.value;
  radio.checked = true
    ? loadProductCatalog(modelHasId, categoryItemId, statusId, radio.value)
    : loadProductCatalog(modelHasId, categoryItemId);
});

//get a radio out of stock
document.getElementById("originCheckbox2").addEventListener("change", () => {
  const radio2 = document.getElementById("originCheckbox2");
  originId = radio2.value;
  const categoryItemId = document.body.dataset.category_item_id;
  radio2.checked = true
    ? loadProductCatalog(modelHasId, categoryItemId, statusId, radio2.value)
    : loadProductCatalog(modelHasId, categoryItemId);
});

const checkboxContainer = document.getElementById("brandCheckBoxContainer");
checkboxContainer.addEventListener("change", (e) => {
  if (e.target.type === "checkbox" && e.target.name === "brandCheck") {
    if (e.target.checked) {
      clearInnerHTMl();
      const brand_Id = e.target.value;
      relatedBrandSearch(brand_Id);
    } else {
      clearInnerHTMlBrandUnChecked();
      const brand_Id = e.target.value;
      uncheckedBrandSearch(brand_Id);
    }
  }
});

//load all categories
const loadCategory = async () => {
  try {
    const responseData = await fetch(
      SERVER_URL + "backend/api/categoriesLoad.php"
    );
    const responseResult = await responseData.json();
    const categoryContainer = document.getElementById("categoryContainer");
    if (responseResult.status === "success") {
      const result = responseResult.results;
      result.map((item) => {
        const option = document.createElement("option");
        option.textContent = item.category_type;
        option.value = item.category_id;
        categoryContainer.appendChild(option);
      });
    } else {
      console.log(responseResult.error);
    }
  } catch (error) {
    console.log(error);
  }
};

//load selected category item
document.getElementById("categoryContainer").addEventListener("change", () => {
  const categoryItem = document.getElementById("categoryContainer").value;
  window.location.href = "category.php?category_id=" + categoryItem;
});

//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> **then your garage product=== 0 <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<//
// garage model
let garageModel;
function openGarageModel() {
  garageModel = new bootstrap.Modal("#garageModel");
  garageModel.show();
}

//this is the promise
//call class and
async function vehicleDataFetch() {
  const obj = new vehicleDataFetcher();
  const data = await obj.fetchVehicleData();
  return data;
}

//my garage section
//set vehicle makers inside the model
function vehicleMakers() {
  const makersSelector = document.getElementById("vehicleMakerSelector");

  //get data and set
  vehicleDataFetch()
    .then((data) => {
      const vhm = data.vehicleMakersData;

      if (vhm.status === "success") {
        vhm.results.forEach((element) => {
          const makerOption = document.createElement("option");
          makerOption.value = element.makers_id;
          makerOption.textContent = element.name;
          makersSelector.appendChild(makerOption);
        });
      } else {
        console.log(vhm.error);
      }
    })
    .catch((error) => console.log(error));
}

//get a maker id and set model line
const makersSelector = document.getElementById("vehicleMakerSelector");

//vehicle year container
const vehicleYearsContainer = document.getElementById("vehicleYearsContainer");

//get vehicle model names
const vehicleModelNameSelector = document.getElementById(
  "vehicleModelNameSelector"
);

//select vehicle modification line
const modificationContainer = document.getElementById(
  "modificationLineContainer"
);

makersSelector.addEventListener("change", () => {
  //get maker id
  const makerId = makersSelector.value;

  vehicleDataFetch().then((data) => {
    const vhNames = data.vehicleNamesData;

    vehicleModelNameSelector.innerHTML = "";
    vehicleYearsContainer.innerHTML = "";
    modificationContainer.innerHTML = "";

    if (vhNames.status === "success") {
      //get a variable
      const result = vhNames.results;

      vehicleModelNameSelector.innerHTML += `<option selected>Select Model</option>`;

      vehicleYearsContainer.innerHTML += `<option selected>Select Year</option>`;

      modificationContainer.innerHTML += `<option selected>Select Modification</option>`;
      //result filter and map
      result
        .filter((res) => res.makers_makers_id === makerId)
        .map((rs2) => {
          //create a new model selection
          const makerNameOption = document.createElement("option");
          makerNameOption.textContent = rs2.vh_name;
          makerNameOption.value = rs2.vh_name_id;
          vehicleModelNameSelector.appendChild(makerNameOption);
        });
    } else {
      console.log(vhModel.error);
    }
  });
});

//select related date in a car model
vehicleModelNameSelector.addEventListener("change", async () => {
  const vehicleNameId = vehicleModelNameSelector.value;

  const data = await vehicleDataFetch();

  vehicleYearsContainer.innerHTML = "";
  modificationContainer.innerHTML = "";

  if (data && data.vehicleModelData) {
    //vehicleModelData exists and is not undefined

    const vehicleModelData = data.vehicleModelData;

    if (vehicleModelData.status === "success") {
      vehicleYearsContainer.innerHTML += `<option selected>Select Year</option>`;

      modificationContainer.innerHTML += `<option selected>Select Modification</option>`;

      //get a variable
      const result = vehicleModelData.results;

      // filtering and mapping
      const yearId = result
        .filter((res) => res.vehicle_names_id === vehicleNameId)
        .map((rs2) => rs2.model_year_id);

      //vehicale years table data
      const resultDate = data.vehicleYearsData;

      if (resultDate.status === "success") {
        const results = resultDate.result;

        yearId.forEach((element) => {
          // console.log(element);
          results
            .filter((res) => res.vehicle_year_Id === element)
            .map((res2) => {
              const makerYearsOption = document.createElement("option");
              makerYearsOption.textContent = res2.year;
              makerYearsOption.value = res2.vehicle_year_Id;
              vehicleYearsContainer.appendChild(makerYearsOption);
            });
        });
      }
    } else {
      console.log(vhModel.error);
    }
  } else {
    //vehicleModelData does not exist or is undefined

    console.log("vehicleModelData does not exist or is undefined");
  }
});

//set model id in this global variable
let vehicleModelId;

vehicleYearsContainer.addEventListener("change", async () => {
  const vehicleYearId = vehicleYearsContainer.value;
  // const makerId = makersSelector.value;
  const nameId = vehicleModelNameSelector.value;

  const data = await vehicleDataFetch();

  modificationContainer.innerHTML = "";

  if (data && data.vehicleModelData) {
    const vehicleModelData = data.vehicleModelData;

    if (vehicleModelData.status === "success") {
      modificationContainer.innerHTML = "";

      const result = vehicleModelData.results;

      const relatedModelId = result
        .filter(
          (res) =>
            res.model_year_id === vehicleYearId &&
            res.vehicle_names_id === nameId
        )
        .map((res2) => res2.model_id);

      vehicleModelId = relatedModelId[0];

      const vehicleModelModificationData = data.vehicleModelModificationData;

      if (vehicleModelModificationData.status === "success") {
        modificationContainer.innerHTML = "";

        const resultModification = vehicleModelModificationData.results;

        const vhModificationId = resultModification.filter((resModification) => resModification.vehicle_models_model_id === relatedModelId[0]).map((resModification2) => resModification2.modification_line_mod_id);

        const vehicleModificationModificationData =
          data.vehicleModificationLineData;

        if (vehicleModificationModificationData.status === "success") {
          modificationContainer.innerHTML += `<option selected>Select Modification</option>`;

          const resultModLineData = vehicleModificationModificationData.result;

          vhModificationId.forEach((element) => {
            resultModLineData
              .filter((resModFilter) => resModFilter.mod_id === element)
              .map((resModFilterNew) => {
                const makerModLineOption = document.createElement("option");
                makerModLineOption.textContent = resModFilterNew.mod;
                makerModLineOption.value = resModFilterNew.mod_id;
                modificationContainer.appendChild(makerModLineOption);
              });
          });
        }
      } else {
        modificationContainer.innerHTML = "";
        modificationContainer.innerHTML += `<option selected>Select Modification</option>`;

        console.log("vehicle modification has table loading error");
      }
    } else {
      console.log("vehicle model loading error");
    }
  } else {
    console.log("array dost exist");
  }
});

//onclick and save vehicle model
//insert my garage for this data
async function addCarGarage() {
  const modificationId = modificationContainer.value;

  const data = await vehicleDataFetch();

  if (data && data.vehicleModelModificationData) {
    const vhModificationData = data.vehicleModelModificationData;

    //check condition and modification
    if (vhModificationData.status === "success") {
      const result = vhModificationData.results;

      //filter and get new array
      const relatedModelHasId = result.filter((res) => res.vehicle_models_model_id === vehicleModelId && res.modification_line_mod_id === modificationId).map((newRes) => newRes.mdu_id);

      //call save function
      dataAddingForGarage(relatedModelHasId[0]);
    } else {
      console.log(vhModificationData.error);
    }
  } else {
    console.log("vehicleModelModificationData does not exist or is undefined");
  }
}

//data add to garage
async function dataAddingForGarage(modelHasId) {
  try {
    const form = new FormData();
    form.append("modelHasId", modelHasId);

    const garageResponse = await fetch(
      SERVER_URL + "backend/api/garageAPI.php",
      {
        method: "POST",
        body: form,
      }
    );
    garageData = await garageResponse.json();
    //then get now response manege
    if (garageData.status === "success") {
      window.location.reload();
      loadRelatedModelForUser();
    } else {
      console.log(garageData.error);
    }
  } catch (error) {
    console.log(error);
  }
}



