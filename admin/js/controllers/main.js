// framework initiate
const ALG = new DashboardComponents();

// //DB data loader
const dataLoader = new Loader();

document.addEventListener("DOMContentLoaded", async () => {
  const mainPanelContentLoad = async (panel) => {
    switch (panel) {
      case "homePanel":
        // toggleHomeSection('home');
        console.log(panel);
        break;

      case "userPannel":
        toggleUserSection('user');
        console.log(panel);
        break;

      case "vehiclePanel":
        toggleVehicleSection("vehicles");
        console.log(panel);
        break;

      case "productPanel":
        toggleProductSection("product");
        console.log(panel);
        break;

      case "promotionPanel":
        togglePromotionSection("promotion");
        console.log(panel);
        break;

      case "orderPanel":
        toggleOrderSection("order");
        console.log(panel);
        break

      default:
        console.log(panel);
        break;
    }
  };
  ALG.mainNavigationController(
    "navigationSection",
    "mainContentContainer",
    () => {
      mainPanelContentLoad("homePanel");
    },
    mainPanelContentLoad
  );
});

// navigation
let isNavigationPanelOpned = false;
function toggleNavigation() {
  const icon = document.getElementById("navigationIcon");
  const navigationSection = document.getElementById("navigationSection");
  const contentSection = document.getElementById("contentSection");

  if (isNavigationPanelOpned) {
    //   handle the icons
    icon.classList.remove("bi-list");
    icon.classList.add("bi-x");

    // handle the sidebar
    navigationSection.classList.add("d-flex");
    navigationSection.classList.remove("d-none");

    // handle the contnet section
    contentSection.classList.add("col-md-8");
    contentSection.classList.add("col-lg-9");
    contentSection.classList.add("col-xl-10");
  } else {
    //   handle the icons
    icon.classList.remove("bi-x");
    icon.classList.add("bi-list");

    // handle the sidebar
    navigationSection.classList.add("d-none");
    navigationSection.classList.remove("d-flex");

    // handle the contnet section
    contentSection.classList.remove("col-md-8");
    contentSection.classList.remove("col-lg-9");
    contentSection.classList.remove("col-xl-10");
  }
  isNavigationPanelOpned = !isNavigationPanelOpned;
}

//load makers
const loadMakers = async () => {
  const makers = await dataLoader.LoadVehicleMakers();
  const makersList = [];

  if (makers.status === "success") {
    makers.results.map((res) => {
      const editButton = `<button class="fw-bolder btn alg-btn-pill" onclick="openMakerEditModel('${res.makers_id}')">Edit</button>`;
      const removeButton = `<button class="fw-bolder ms-1 btn alg-btn-pill" onclick="openMakerDeleteModel('${res.makers_id}')">Remove</button>`;
      makersList.push({
        "Maker Id": res.makers_id,
        "Maker Name": res.name,
        Edit: [editButton, removeButton]
      });
    });
    return makersList;
  }
  return makers.error;
};

//maker for vehicle adding
const addMakersForVehicleNamesPanel = async () => {

  const selector = document.getElementById('vhMakersSelector');

  const makers = await dataLoader.LoadVehicleMakers();
  selector.innerHTML = "";


  if (makers.status === "success") {

    selector.innerHTML += `<option value="0" >select maker</option>`;

    makers.results.map((result) => {

      const option = document.createElement('option');
      option.value = result.makers_id;
      option.textContent = result.name;
      selector.appendChild(option);
    });

  } else {
    console.log(makers.error);
  }

}


//load vehicles names
const loadNames = async () => {
  const names = await dataLoader.LoadVehicleName();
  const nameList = [];

  if (names.status === "success") {
    names.results.map((res) => {
      const editButton = `<button class="fw-bolder btn alg-btn-pill" onclick="openMakerEditModel(${res.vh_name_id})">Edit</button>`;
      const removeButton = `<button class="fw-bolder btn ms-1 alg-btn-pill" onclick="openNamesDeleteModel('${res.vh_name_id}')">Remove</button>`;
      nameList.push({
        Id: res.vh_name_id,
        Maker: res.makers_name,
        Name: res.vh_name,
        Edit: [editButton, removeButton],
      });
    });
    return nameList;
  }
  return names.error;
};

//load vehicles model
const loadModel = async () => {
  const models = await dataLoader.LoadVehicleModels();
  console.log(models);
  const modelsList = [];

  if (models.status === "success") {
    models.results.map((res) => {
      const editButton = `<button class="fw-bolder btn alg-btn-pill" onclick="openModelEditModel('${res.model_id}')">Edit</button>`;
      const deleteButton = `<button class="ms-1 fw-bolder btn alg-btn-pill" onclick="openModelDeleteModel('${res.model_id}')">Remove</button>`;
      modelsList.push({
        Id: res.model_id,
        Name: res.vehicle_names,
        Type: res.model_type,
        Year: res.model_year,
        Generation: res.model_generation,
        Image: res.model_image ? `<img src="${res.model_image}" class="alg-list-cell-image"  />`
          : "Empty",
        Edit: [editButton, deleteButton],
      });
    });
    return modelsList;
  }
  return models.error;
};

//load vehicles model lines
const loadModelLine = async () => {
  const modificationLine = await dataLoader.LoadVehicleModelsModificationLine();
  const modificationLineList = [];

  if (modificationLine.status === "success") {

    console.log(modificationLine);

    modificationLine.results.map((res) => {
      const editButton = `<button class="fw-bolder btn alg-btn-pill" onclick="openModelLineEditModel('${res.mdu_id}')">Edit</button>`;
      const removeButton = `<button class="ms-1 fw-bolder btn alg-btn-pill" onclick="openModelLineRemoveModel('${res.mdu_id}')">Remove</button>`;
      modificationLineList.push({
        "Modification Line Id": res.mdu_id,
        "Model Id": res.model_id,
        "Vehicle Name": res.vh_name,
        "Vehicle Year": res.year,
        "Vehicle Generation": res.generation,
        "Modification Line": res.mod,
        Edit: [editButton, removeButton]
      });
    });
    return modificationLineList;
  }
  return modificationLine.error;
};

//load all vehicle parts
const vehicleView = async () => {
  const resVhParts = await dataLoader.LoadVehiclePartsLoad();
  console.log(resVhParts);

  const vehiclePartsArr = [];

  if (resVhParts.status === "success") {
    resVhParts.result.map((res) => {
      const editButton = `<button class="fw-bolder btn alg-btn-pill" onclick="openVhPartEditModel('${res.result.parts_id}')">Edit</button>`;
      const deleteButton = `<button class="fw-bolder btn alg-btn-pill ms-2" onclick="openVhPartDeleteModel('${res.result.parts_id}')">Remove</button>`;

      vehiclePartsArr.push({
        "Parts Id": res.result.parts_id,
        Title: res.result.title,
        "Added Date": res.result.addedd_date,
        "Seller Name": res.result.full_name,
        Price: res.result.price,
        "Shipping Price": res.result.shipping_price,
        "Brand Name": res.result.brand_name,
        Category: res.result.category,
        "Category Item": res.result.category_item_name,
        "Product Description": res.result.description,
        Quantity: res.result.qty,
        "Vehicle Name": res.result.vh_name,
        "Vehicle Type": res.result.vehicale,
        "Vehicle Year": res.result.year,
        Generation: res.result.generation,
        "Modification Line": res.result.mod,
        Status: res.result.status,
        Image: res.images[0]
          ? `<img src="../../resources/image/partsImages/${res.images[0]}" class="alg-list-cell-image"  />`
          : "Empty",
        Edit: [editButton, deleteButton]

      });
    });

    return vehiclePartsArr;
  }
};

//load vehicle origin
const loadVehicleOrigin = async () => {
  let productOrgin = document.getElementById("sectionOrigin");

  const vhOriginRes = await dataLoader.LoadVehiclePartsOrin();

  productOrgin.innerHTML = "";
  productOrgin.innerHTML += `<option value="0">Select Origin</option>`;

  if (vhOriginRes.status === "success") {
    vhOriginRes.result.map((res) => {
      let option = document.createElement("option");
      option.value = res.origin_id;
      option.textContent = res.origin;
      productOrgin.appendChild(option);
    });
  } else {
    console.log(vhOriginRes.error);
  }
};

//load vehicle brand
const loadVehicleBrand = async () => {
  let productBrand = document.getElementById("productBrand");

  const vhBrandRes = await dataLoader.LoadVehicleBrand();

  productBrand.innerHTML = "";
  productBrand.innerHTML += `<option value="0">Select Brand</option>`;

  if (vhBrandRes.status === "success") {
    vhBrandRes.result.map((res) => {
      let option = document.createElement("option");
      option.value = res.brand_id;
      option.textContent = res.brand_name;
      productBrand.appendChild(option);
    });
  } else {
    console.log(vhBrandRes.error);
  }
};

//load vehicle category items
const loadVehicleCategoryItem = async () => {
  let productCategoryItem = document.getElementById("productCategoryItem");

  const productCategoryItemRes = await dataLoader.LoadVehicleCategoryItem();
  console.log(productCategoryItemRes);

  productCategoryItem.innerHTML = "";
  productCategoryItem.innerHTML += `<option value="0">Select Category Item</option>`;

  if (productCategoryItemRes.status === "success") {
    productCategoryItemRes.result.map((res) => {
      let option = document.createElement("option");
      option.value = res.category_item_id;
      option.textContent = res.category_item_name;
      productCategoryItem.appendChild(option);
    });
  } else {
    console.log(productCategoryItemRes.error);
  }
};

//load modification line
const loadModificationLine = async () => {
  let productModelLine = document.getElementById("productModelLine");

  const productModificationLineRes =
    await dataLoader.LoadVehicleModelsModificationLine();
  console.log(productModificationLineRes);

  productModelLine.innerHTML = "";
  productModelLine.innerHTML += `<option value="undefined">Select Modification Line</option>`;

  if (productModificationLineRes.status === "success") {
    productModificationLineRes.results.map((res) => {
      let option = document.createElement("option");
      option.value = res.mdu_id;
      option.textContent = [
        res.vh_name,
        res.mod,
        res.vehicale,
        res.generation,
        res.year,
      ];
      // option.textContent = res.mod;
      productModelLine.appendChild(option);
    });
  } else {
    console.log(productModificationLineRes.error);
  }
};

//load vehicle model section data form selectors
const loadVehicleNamesFormModeSection = async () => {

  const vhNameSelector = document.getElementById('vhNamesSelector');

  const vhNamesResponse = await dataLoader.LoadVehicleName();


  vhNameSelector.innerHTML = "";

  if (vhNamesResponse.status === 'success') {

    vhNameSelector.innerHTML += ` <option value="0" >Select Vehicle Names</option>`;

    vhNamesResponse.results.map((res) => {

      const option = document.createElement('option');
      option.value = res.vh_name_id;
      option.textContent = res.vh_name;

      vhNameSelector.appendChild(option);
    });

  }

};
//load vehicle type section data form selectors
const loadVehicleTypeFormModeSection = async () => {

  const vhTypeSelector = document.getElementById('vhTypeSelector');

  const vhTypeResponse = await dataLoader.LoadVehicleType();

  vhTypeSelector.innerHTML = "";

  if (vhTypeResponse.status === 'success') {

    vhTypeSelector.innerHTML += ` <option value="0" >Select Vehicle Type</option>`;

    vhTypeResponse.result.map((res) => {

      const option = document.createElement('option');
      option.value = res.vehicle_type_id;
      option.textContent = res.vehicale;

      vhTypeSelector.appendChild(option);
    });

  }

};
//load vehicle Year section data form selectors
const loadVehicleYearFormModeSection = async () => {

  const vhYearSelector = document.getElementById('vhYearSelector');

  const vhYearResponse = await dataLoader.LoadVehicleYears();

  vhYearSelector.innerHTML = "";

  if (vhYearResponse.status === 'success') {

    vhYearSelector.innerHTML += ` <option value="0" >Select Vehicle Year</option>`;

    vhYearResponse.result.map((res) => {

      const option = document.createElement('option');
      option.value = res.vehicle_year_Id;
      option.textContent = res.year;

      vhYearSelector.appendChild(option);
    });

  }

};
//load vehicle Year section data form selectors
const loadVehicleGenerationFormModeSection = async () => {

  const vhGenerationSelector = document.getElementById('vhGenerationSelector');

  const vhGenerationResponse = await dataLoader.LoadVehicleGeneration();


  vhGenerationSelector.innerHTML = "";

  if (vhGenerationResponse.status === 'success') {

    vhGenerationSelector.innerHTML += ` <option value="0">Select Vehicle Generation</option>`;

    vhGenerationResponse.result.map((res) => {

      const option = document.createElement('option');
      option.value = res.generation_id;
      option.textContent = res.generation;

      vhGenerationSelector.appendChild(option);
    });

  }

};

//load vehicle model for selector
const vhModelLoader = async () => {
  const vhModelsResponse = await dataLoader.LoadVehicleModels();
  const vhModelSelector = document.getElementById('vhModelSelector');
  vhModelSelector.innerHTML = "";

  if (vhModelsResponse.status === 'success') {

    vhModelSelector.innerHTML += `<option value="undefined">Select Vehicle Model</option>`;

    vhModelsResponse.results.map((res) => {
      const option = document.createElement('option');
      option.value = res.model_id
      option.textContent = [res.vehicle_names, res.model_type, res.model_year, res.model_generation,];
      vhModelSelector.appendChild(option);
    });
  }

};

//load vehicle modification for selector
const vhModification = async () => {
  const vhModificationResponse = await dataLoader.LoadModificationLine();
  const vhModelLineSelector = document.getElementById('vhModelLineSelector');
  vhModelLineSelector.innerHTML = "";

  if (vhModificationResponse.status === 'success') {
    vhModelLineSelector.innerHTML += `<option value="undefined">Select Vehicle Modification Line</option>`;

    vhModificationResponse.result.map((res) => {
      const option = document.createElement('option');
      option.value = res.mod_id
      option.textContent = res.mod;
      vhModelLineSelector.appendChild(option);
    });
  }

};

//load vehicle category for product selection
const loadCategory = async () => {

  const selector = document.getElementById('categorySelector');

  const categoryRes = await dataLoader.LoadVehicleCategory();
  console.log(categoryRes);

  if (categoryRes.status === 'success') {
    categoryRes.results.map((res) => {
      const option = document.createElement('option');
      option.value = res.category_id
      option.textContent = res.category_type
      selector.appendChild(option);
    });
  } else {
    console.log(categoryRes.error);
  }
};

//load vehicle category items (catalogs)
const loadCategoryItems = async () => {
  const categoryItemRes = await dataLoader.LoadVehicleCategoryItem();
  const categoryItems = [];
  console.log(categoryItemRes);

  if (categoryItemRes.status === 'success') {
    categoryItemRes.result.map((res) => {
      const editButton = `<button class="fw-bolder btn alg-btn-pill" onclick="openVhCategoryItemsEditModel('${res.category_item_id}')">Edit</button>`;
      const deleteButton = `<button class="fw-bolder btn alg-btn-pill ms-2" onclick="openVhCategoryItemsDeleteModel('${res.category_item_id}')">Remove</button>`;
      const img = `<img src="../../resources/image/categoryItemImages/${res.category_item_id}.jpg" class="alg-list-cell-image"  />`;

      categoryItems.push({
        "Catalog Id": res.category_item_id,
        "Category Name": res.category,
        "Catalog Name(category item)": res.category_item_name,
        "image": img,
        "Edit": [editButton, deleteButton]
      });

    });

    return categoryItems;
  }

};




//Malindu *********************************
//vehicle promotion section toggle
const togglePromotionSection = async (promotionSections) => {
  const sections = document.getElementById(
    "productPromotionContainer"
  ).childNodes;

  for (var i = 0; i < sections.length; i++) {
    if (sections[i].nodeType === Node.ELEMENT_NODE) {
      sections[i].classList.remove("d-block");
      sections[i].classList.add("d-none");
    }
  }

  const selectedSection = document.getElementById(
    promotionSections + "Section"
  );
  selectedSection.classList.add("d-block");
  selectedSection.classList.remove("d-none");

  promotionSections === "promotionView"
    ? ALG.addTableToContainer(
      "promotionViewSection",
      loadPromo,
      [300, 300, 150, 150, 100, 150]
    )
    : null;

  promotionSections === "promotionViewSeller"
    ? ALG.addTableToContainer(
      "promotionViewSellerSection",
      loadPromoSeller,
      [300, 300, 150, 150, 100, 150]
    )
    : null;

  if (promotionSections === "promotionAdd") {
    loadPromotionParts();
  }
  if (promotionSections === "promotionAddSeller") {
    loadPromotionPartsSeller();
  }
};
//orderSection

const toggleOrderSection = async (orderSections) => {
  const sections = document.getElementById(
    "orderContainer"
  ).childNodes;

  for (var i = 0; i < sections.length; i++) {
    if (sections[i].nodeType === Node.ELEMENT_NODE) {
      sections[i].classList.remove("d-block");
      sections[i].classList.add("d-none");
    }
  }

  const selectedSection = document.getElementById(
    orderSections + "Section"
  );
  selectedSection.classList.add("d-block");
  selectedSection.classList.remove("d-none");

  orderSections === "orderView"
    ? ALG.addTableToContainer(
      "orderViewSection",
      orderLoad,
      [300, 300, 150, 150, 300, 300, 300, 150, 150, 150, 150, 150]
    )
    : null;

};



const toggleUserSection = async (userSections) => {
  const sections = document.getElementById(
    "userSectionsContainer"
  ).childNodes;

  for (var i = 0; i < sections.length; i++) {
    if (sections[i].nodeType === Node.ELEMENT_NODE) {
      sections[i].classList.remove("d-block");
      sections[i].classList.add("d-none");
    }
  }

  const selectedSection = document.getElementById(
    userSections + "Section"
  );
  selectedSection.classList.add("d-block");
  selectedSection.classList.remove("d-none");


  userSections === "userView"
    ? ALG.addTableToContainer(
      "userViewSection",
      loadApprovedUser,
      [300, 300, 300, 300, 300, 300, 300, 300, 150]
    )
    : null;

  userSections === "userApprove"
    ? ALG.addTableToContainer(
      "userApproveSection",
      SellerApprove,
      [300, 300, 300, 300, 300, 300, 300, 300, 150]
    )
    : null;
};
//vehicle section toggle
const toggleVehicleSection = async (sec) => {
  const sections = document.getElementById(
    "vhMakerSectionsContainer"
  ).childNodes;

  for (var i = 0; i < sections.length; i++) {
    if (sections[i].nodeType === Node.ELEMENT_NODE) {
      sections[i].classList.remove("d-block");
      sections[i].classList.add("d-none");
    }
  }

  const selectedSection = document.getElementById(sec + "ViewSection");
  selectedSection.classList.add("d-block");
  selectedSection.classList.remove("d-none");

  sec === "makers"
    ? ALG.addTableToContainer("makersTable", loadMakers, [360, 350, 220])
    : null;
  if (sec === "names") {
    ALG.addTableToContainer(
      "namesTable",
      loadNames,
      [200, 200, 200, 220]
    );

    addMakersForVehicleNamesPanel();
  }

  if (sec === "models") {
    ALG.addTableToContainer(
      "modelTable",
      loadModel,
      [200, 200, 200, 200, 200, 300, 220]
    );
    loadVehicleNamesFormModeSection();
    loadVehicleTypeFormModeSection();
    loadVehicleYearFormModeSection();
    loadVehicleGenerationFormModeSection();
  }


  if (sec === "modelLines") {
    ALG.addTableToContainer(
      "modelLinesTableContainer",
      loadModelLine,
      [200, 200, 200, 200, 200, 200, 220]
    );
    vhModelLoader();
    vhModification();
  }

};

//product section toggle
const toggleProductSection = async (productSection) => {

  const sections = document.getElementById(
    "productSectionsContainer"
  ).childNodes;

  for (var i = 0; i < sections.length; i++) {
    if (sections[i].nodeType === Node.ELEMENT_NODE) {
      sections[i].classList.remove("d-block");
      sections[i].classList.add("d-none");
    }
  }

  const selectedSection = document.getElementById(productSection + "Section");
  selectedSection.classList.add("d-block");
  selectedSection.classList.remove("d-none");

  if (productSection === "catalogView") {
    loadCategory();
    ALG.addTableToContainer("productCatalogTable", loadCategoryItems, [200, 230, 230, 230, 220]);
  }


  productSection === "productView"
    ? ALG.addTableToContainer(
      "productViewSection",
      vehicleView,
      [
        200, 200, 200, 200, 200, 200, 200, 200, 200, 200, 200, 200, 200, 200,
        200, 200, 200, 300, 225
      ]
    )
    : null;

  if (productSection === "productAdd") {
    loadVehicleOrigin();
    loadVehicleBrand();
    loadVehicleCategoryItem();
    loadModificationLine();
  }


};


//load vehicle origin
async function loadPromotionParts() {
  let promotionTitle = document.getElementById("promotionTitle");

  const vhOriginRes = await dataLoader.LoadVehiclePartsLoad();

  promotionTitle.innerHTML = "";
  promotionTitle.innerHTML += `<option value="0">Select part</option>`;

  if (vhOriginRes.status === "success") {
    vhOriginRes.result.map((res) => {
      let option = document.createElement("option");
      option.value = res.result.parts_id;
      option.textContent = res.result.title;
      promotionTitle.appendChild(option);
    });
  } else {
    console.log(vhOriginRes.error);
  }
}

async function loadPromotionPartsSeller() {
  console.log("promo seller load")
  let promotionTitle = document.getElementById("promotionTitle");

  // send the data to server
  let request = new XMLHttpRequest();
  request.onreadystatechange = function () {



    if (request.readyState == 4) {
      // perform an action on response
      let response = JSON.parse(request.responseText);
      console.log(response);

      let vhOriginRes = response.data;
      if (response.status == "success") { // Check if vhOriginRes.result is an array
        vhOriginRes.forEach((res) => { // Use forEach instead of map
          let option = document.createElement("option");
          option.value = res.parts_id;
          option.textContent = res.title;
          promotionTitle.appendChild(option);
        });
      } else {
        ALG.openToast("error", "User Approved Failed", ALG.getCurrentTime(), "bi-heart", "Failed");
      }
      console.log(request.responseText);
    }
  };
  request.open("POST", "../backend/api/partsSellerLoad.php", true);
  request.send();
}




function promoAdd() {
  var title = document.getElementById('promotionTitle').value;
  var start = document.getElementById('promoStartDate').value;
  var end = document.getElementById('promoEndDate').value;
  var percentage = document.getElementById('promoPrecentage').value;
  var image = document.getElementById('promotionImage').files[0];





  const requestDataObject = {
    parts_id: String(title),
    start_date: String(start),
    end_date: String(end),
    discount: String(percentage),
  };

  // store data in a form
  let form = new FormData();
  form.append("productData", JSON.stringify(requestDataObject));
  form.append("category_image", image);


  // send the data to server
  let request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      // preform an action on response
      let response = JSON.parse(request.responseText);
      if (response.status == "success") {
        ALG.openToast("Success", "promotion Adding Success", ALG.getCurrentTime(), "bi-heart", "Success");
        document.getElementById('promotionTitle').value = '';
        document.getElementById('promoStartDate').value = '';
        document.getElementById('promoEndDate').value = '';
        document.getElementById('promoPrecentage').value = '';
        document.getElementById('promotionImage').value = ''; // Clear input type file
        document.getElementById('productItemImagePreviewContainer').innerHTML = ''; // Clear input type file


      } else {
        ALG.openToast("error", "promotion Adding Failed", ALG.getCurrentTime(), "bi-heart", "Failed");
      }
      console.log(request.responseText);
    }
  };
  request.open("POST", "../backend/api/promationAdding.php", true);
  request.send(form);

}



// Function to load promotions asynchronously
const loadPromo = () => {
  return new Promise((resolve, reject) => {
    const promoList = [];

    console.log("promo loaded");

    let request = new XMLHttpRequest();
    request.onreadystatechange = function () {
      if (request.readyState === 4) {
        let response = JSON.parse(request.responseText);
        console.log(response)
        if (response.status === "success") {
          if (Array.isArray(response.data)) {
            response.data.forEach((res) => {
              const editButton = `<button class="fw-bolder btn alg-btn-pill" onclick="deletePromo(${res.promotion_id})">Delete</button>`;
              promoList.push({
                "Part Name": res.title,
                "Brand Name": res.brand_name,
                "Start Date": res.addedd_date,
                "End Date": res.end_date,
                "Disscount": res.discount + '%',

                Edit: editButton,
              });
            });

            resolve(promoList); // Resolve the Promise with promoList
          } else {
            ALG.openToast("error", "Invalid data format", ALG.getCurrentTime(), "bi-heart", "Failed");
            console.error("Invalid data format. Expected an array in 'data' property:", response);
            reject(new Error("Invalid data format"));
          }
        } else {
          ALG.openToast("error", "Promotion load failed", ALG.getCurrentTime(), "bi-heart", "Failed");
          reject(new Error("Promotion load failed"));
        }
      }
    };

    request.open("POST", "../backend/api/PromotionLoad.php", true);
    request.send();
  });
};

// Function to load promotions asynchronously
const loadPromoSeller = () => {
  return new Promise((resolve, reject) => {
    const promoList = [];

    console.log("promo loaded");

    let request = new XMLHttpRequest();
    request.onreadystatechange = function () {
      if (request.readyState === 4) {
        let response = JSON.parse(request.responseText);
        console.log(response)
        if (response.status === "success") {
          if (Array.isArray(response.data)) {
            response.data.forEach((res) => {
              const editButton = `<button class="fw-bolder btn alg-btn-pill" onclick="deletePromo(${res.promotion_id})">Delete</button>`;
              promoList.push({
                "Part Name": res.title,
                "Brand Name": res.brand_name,
                "Start Date": res.addedd_date,
                "End Date": res.end_date,
                "Disscount": res.discount + '%',

                Edit: editButton,
              });
            });

            resolve(promoList); // Resolve the Promise with promoList
          } else {
            ALG.openToast("error", "Invalid data format", ALG.getCurrentTime(), "bi-heart", "Failed");
            console.error("Invalid data format. Expected an array in 'data' property:", response);
            reject(new Error("Invalid data format"));
          }
        } else {
          ALG.openToast("error", "Promotion load failed", ALG.getCurrentTime(), "bi-heart", "Failed");
          reject(new Error("Promotion load failed"));
        }
      }
    };

    request.open("POST", "../backend/api/promotionLoadSeller.php", true);
    request.send();
  });
};


function deletePromo(promotion_id) {
  console.log(promotion_id)

  const requestDataObject = {
    promotion_id: promotion_id,

  };

  // store data in a form
  let form = new FormData();
  form.append("promoData", JSON.stringify(requestDataObject));


  // send the data to server
  let request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      // preform an action on response
      let response = JSON.parse(request.responseText);
      if (response.status == "success") {
        ALG.openToast("Success", "promotion Deleted Success", ALG.getCurrentTime(), "bi-heart", "Success");
        ALG.addTableToContainer(
          "promotionViewSection",
          loadPromo,
          [300, 300, 150, 150, 100, 150]
        )

      } else {
        ALG.openToast("error", "promotion Delete Failed", ALG.getCurrentTime(), "bi-heart", "Failed");
      }
      console.log(request.responseText);
    }
  };
  request.open("POST", "../backend/api/promotionDelete.php", true);
  request.send(form);

}


//user sections api


const loadApprovedUser = () => {
  return new Promise((resolve, reject) => {
    const userList = [];

    console.log("user loaded");

    let request = new XMLHttpRequest();
    request.onreadystatechange = function () {
      if (request.readyState === 4) {
        let response = JSON.parse(request.responseText);
        console.log(response)
        if (response.status === "success") {
          if (Array.isArray(response.data)) {
            response.data.forEach((res) => {
              const editButton = `<button class="fw-bolder btn alg-btn-pill" onclick="deleteSeller(${res.user_id})">Delete</button>`;
              userList.push({
                "Full Name": res.full_name,
                "Email": res.email,
                "BR Number": res.br_number,
                "Contact Number": res.private_contact,
                "Business Cotact": res.busineess_conatact,
                "Business Adress": res.busineess_conatact,
                "Business Name": res.buisness_name,
                "Adress": res.adresss,


                Edit: editButton,
              });
            });

            resolve(userList); // Resolve the Promise with promoList
          } else {
            ALG.openToast("error", "Invalid data format", ALG.getCurrentTime(), "bi-heart", "Failed");
            console.error("Invalid data format. Expected an array in 'data' property:", response);
            reject(new Error("Invalid data format"));
          }
        } else {
          ALG.openToast("error", "Promotion load failed", ALG.getCurrentTime(), "bi-heart", "Failed");
          reject(new Error("Promotion load failed"));
        }
      }
    };

    request.open("POST", "../backend/api/ApprovedSellerLoad.php", true);
    request.send();
  });
};




const SellerApprove = () => {
  return new Promise((resolve, reject) => {
    const userList = [];

    console.log("user loaded");

    let request = new XMLHttpRequest();
    request.onreadystatechange = function () {
      if (request.readyState === 4) {
        let response = JSON.parse(request.responseText);
        console.log(response)
        if (response.status === "success") {
          if (Array.isArray(response.data)) {
            response.data.forEach((res) => {
              const editButton = `<button class="fw-bolder btn alg-btn-pill" onclick="approveSellerProcess(${res.user_id})">Approve</button>`;
              userList.push({
                "Full Name": res.full_name,
                "Email": res.email,
                "BR Number": res.br_number,
                "Contact Number": res.private_contact,
                "Business Cotact": res.busineess_conatact,
                "Business Adress": res.busineess_conatact,
                "Business Name": res.buisness_name,
                "Adress": res.adresss,


                Edit: editButton,
              });
            });

            resolve(userList); // Resolve the Promise with promoList
          } else {
            ALG.openToast("error", "Invalid data format", ALG.getCurrentTime(), "bi-heart", "Failed");
            console.error("Invalid data format. Expected an array in 'data' property:", response);
            reject(new Error("Invalid data format"));
          }
        } else {
          ALG.openToast("error", "Promotion load failed", ALG.getCurrentTime(), "bi-heart", "Failed");
          reject(new Error("Promotion load failed"));
        }
      }
    };

    request.open("POST", "../backend/api/adminSellerAproveLoad.php", true);
    request.send();
  });
};

//delete Seller

function deleteSeller(userId) {
  const requestDataObject = {
    userId: userId,

  };

  // store data in a form
  let form = new FormData();
  form.append("adminData", JSON.stringify(requestDataObject));


  // send the data to server
  let request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      // preform an action on response
      let response = JSON.parse(request.responseText);
      if (response.status == "success") {
        ALG.openToast("Success", "user Blocked Success", ALG.getCurrentTime(), "bi-heart", "Success");
        ALG.addTableToContainer(
          "userViewSection",
          SellerApprove,
          [300, 300, 150, 150, 100, 150]
        )

      } else {
        ALG.openToast("error", "User Blocked Failed", ALG.getCurrentTime(), "bi-heart", "Failed");
      }
      console.log(request.responseText);
    }
  };
  request.open("POST", "../backend/api/adminSellerBlock.php", true);
  request.send(form);

}



function approveSellerProcess(userId) {
  const requestDataObject = {
    userId: userId,

  };

  console.log("seller approved")

  // store data in a form
  let form = new FormData();
  form.append("adminData", JSON.stringify(requestDataObject));


  // send the data to server
  let request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      // preform an action on response
      let response = JSON.parse(request.responseText);
      if (response.status == "success") {
        ALG.openToast("Success", "user Approved Success", ALG.getCurrentTime(), "bi-heart", "Success");
        ALG.addTableToContainer(
          "userApproveSection",
          SellerApprove,
          [300, 300, 150, 150, 100, 150]
        )

      } else {
        ALG.openToast("error", "User Approved Failed", ALG.getCurrentTime(), "bi-heart", "Failed");
      }
      console.log(request.responseText);
    }
  };
  request.open("POST", "../backend/api/adminSellerApprove.php", true);
  request.send(form);
}

//order section request
function order() {
  console.log("order loaded")
}

const orderLoad = () => {
  return new Promise((resolve, reject) => {
    const orderList = [];

    console.log("order loaded");

    let request = new XMLHttpRequest();
    request.onreadystatechange = function () {
      if (request.readyState === 4) {
        let response = JSON.parse(request.responseText);
        console.log(response)
        if (response.status === "success") {
          console.log(response.data)
          if (Array.isArray(response.data)) {
            response.data.forEach((res) => {
              const editButton = `<button class="fw-bolder btn alg-btn-pill" onclick="clearOrder(${res.invoice_id})">Approve</button>`;
              orderList.push({
                "Part Name": res.vh_parts_name,
                "Seller Name": res.full_name,
                "Price": res.price,
                "Order Id": res.order_id,
                "Total Price For User Order": res.pay_total_amout,
                "Adress Line 1": res.address_line_1,
                "Adress Line 2": res.address_line_2,
                "Mobile": res.mobile,
                "USer Name": res.user_name,
                "Postal Code": res.postal_code,
                "City": res.city,



                Edit: editButton,
              });
            });

            resolve(orderList); // Resolve the Promise with promoList
          } else {
            ALG.openToast("error", "Invalid data format", ALG.getCurrentTime(), "bi-heart", "Failed");
            console.error("Invalid data format. Expected an array in 'data' property:", response);
            reject(new Error("Invalid data format"));
          }
        } else {
          ALG.openToast("error", "Promotion load failed", ALG.getCurrentTime(), "bi-heart", "Failed");
          reject(new Error("Promotion load failed"));
        }
      }
    };

    request.open("POST", "../backend/api/adminOrderLoad.php", true);
    request.send();
  });
};


function clearOrder(id) {
  const requestDataObject = {
    invoiceId: id,

  };

  console.log("order cleared")

  // store data in a form
  let form = new FormData();
  form.append("adminData", JSON.stringify(requestDataObject));


  // send the data to server
  let request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      // preform an action on response
      let response = JSON.parse(request.responseText);
      if (response.status == "success") {
        ALG.openToast("Success", "user Approved Success", ALG.getCurrentTime(), "bi-heart", "Success");
        ALG.addTableToContainer(
          "orderViewSection",
          orderLoad,
          [300, 300, 150, 150, 300, 300, 300, 150, 150, 150, 150, 150]
        )

      } else {
        ALG.openToast("error", "User Approved Failed", ALG.getCurrentTime(), "bi-heart", "Failed");
      }
      console.log(request.responseText);
    }
  };
  request.open("POST", "../backend/api/adminOrderClear.php", true);
  request.send(form);
}