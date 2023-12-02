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

      case "orderPanel":
        // toggleOrderSection('orders');
        console.log(panel);
        break;

      case "vehiclePanel":
        toggleVehicleSection('vehicles');
        console.log(panel);
        break;

      case "productPanel":
        toggleProductSection('product');
        console.log(panel);
        break;

      default:
        console.log(panel);
        break;
    }
  };
  ALG.mainNavigationController("navigationSection", "mainContentContainer", () => {
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

  if (makers.status === 'success') {
    makers.results.map((res) => {
      const editButton = `<button class="fw-bolder btn alg-btn-pill" onclick="openMakerEditModel(${res.maker_id})">Edit</button>`;
      makersList.push({
        "Maker Id": res.maker_id,
        "Maker Name": res.maker_name,
        "Edit": editButton
      })
    });
    return makersList
  }
  return makers.error
}

//load vehicles names
const loadNames = async () => {
  const names = await dataLoader.LoadVehicleName();
  const nameList = [];

  if (names.status === 'success') {
    names.results.map((res) => {
      const editButton = `<button class="fw-bolder btn alg-btn-pill" onclick="openMakerEditModel(${res.vh_name_id})">Edit</button>`;
      nameList.push({
        "Id": res.vh_name_id,
        "Maker": res.makers_name,
        "Name": res.vh_name,
        "Edit": editButton
      })
    });
    return nameList
  }
  return names.error
}

//load vehicles model
const loadModel = async () => {
  const models = await dataLoader.LoadVehicleModels();
  const modelsList = [];

  if (models.status === 'success') {
    models.results.map((res) => {
      const editButton = `<button class="fw-bolder btn alg-btn-pill" onclick="openMakerEditModel(${res.model_id})">Edit</button>`;
      modelsList.push({
        "Id": res.model_id,
        "Name": res.vehicle_names,
        "Type": res.model_type,
        "Year": res.model_year,
        "Generation": res.model_generation,
        "Edit": editButton,
      })
    });
    return modelsList
  }
  return models.error
}

//load vehicles model lines
const loadModelLine = async () => {
  const modificationLine = await dataLoader.LoadVehicleModelsModificationLine();
  const modificationLineList = [];

  if (modificationLine.status === 'success') {
    modificationLine.results.map((res) => {
      const editButton = `<button class="fw-bolder btn alg-btn-pill" onclick="openMakerEditModel(${res.vh_mdu_id})">Edit</button>`;
      modificationLineList.push({
        "Modification Line Id": res.vh_mdu_id,
        "Model Id": res.vh_model_id,
        "Modification Line": res.vh_modification_line,
        "Edit": editButton,
      })
    });
    return modificationLineList
  }
  return modificationLine.error
}

//load all vehicle parts
const vehicleView = async () => {
  const resVhParts = await dataLoader.LoadVehiclePartsLoad();
  console.log(resVhParts);


  const vehiclePartsArr = [];

  if (resVhParts.status === "success") {
    resVhParts.result.map((res) => {

      const editButton = `<button class="fw-bolder btn alg-btn-pill" onclick="openMakerEditModel(${res.result.parts_id})">Edit</button>`;

      vehiclePartsArr.push({
        "Parts Id": res.result.parts_id,
        "Title": res.result.title,
        "Added Date": res.result.addedd_date,
        "Seller Name": res.result.full_name,
        "Price": res.result.price,
        "Shipping Price": res.result.shipping_price,
        "Brand Name": res.result.brand_name,
        "Category": res.result.category,
        "Category Item": res.result.category_item_name,
        "Product Description": res.result.description,
        "Quantity": res.result.qty,
        "Vehicle Name": res.result.vh_name,
        "Vehicle Type": res.result.vehicale,
        "Vehicle Year": res.result.year,
        "Generation": res.result.generation,
        "Modification Line": res.result.mod,
        "Status": res.result.status,
        "Image": res.images[0]
          ? `<img src="../../resources/image/partsImages/${res.images[0]}" class="alg-list-cell-image"  />`
          : "Empty",
        "Edit": editButton,
      });


    })

    return vehiclePartsArr
  }


}

//vehicle section toggle
const toggleVehicleSection = async (sec) => {
  const sections = document.getElementById("vhMakerSectionsContainer").childNodes;

  for (var i = 0; i < sections.length; i++) {
    if (sections[i].nodeType === Node.ELEMENT_NODE) {
      sections[i].classList.remove("d-block");
      sections[i].classList.add("d-none");
    }
  }

  const selectedSection = document.getElementById(sec + "ViewSection");
  selectedSection.classList.add("d-block");
  selectedSection.classList.remove("d-none");

  sec === "makers" ? ALG.addTableToContainer("makersViewSection", loadMakers, [360, 350, 150]) : null;
  sec === "names" ? ALG.addTableToContainer("namesViewSection", loadNames, [200, 200, 200, 150]) : null;
  sec === "models" ? ALG.addTableToContainer("modelsViewSection", loadModel, [200, 200, 200, 200, 200, 150]) : null;
  sec === "modelLines" ? ALG.addTableToContainer("modelLinesViewSection", loadModelLine, [200, 200, 200, 150]) : null;


}

//product section toggle
const toggleProductSection = async (productSection) => {
  const sections = document.getElementById('productSectionsContainer').childNodes;

  for (var i = 0; i < sections.length; i++) {
    if (sections[i].nodeType === Node.ELEMENT_NODE) {
      sections[i].classList.remove("d-block");
      sections[i].classList.add("d-none");
    }
  }

  const selectedSection = document.getElementById(productSection + "Section");
  selectedSection.classList.add("d-block");
  selectedSection.classList.remove("d-none");

  productSection === 'productView' ? ALG.addTableToContainer("productViewSection", vehicleView, [200, 200, 200, 200, 200, 200, 200, 200, 200, 200, 200, 200, 200, 200, 200, 200, 200, 300, 200]) : null;
  // productSection === 'productAdd' ? ALG.addTableToContainer("productViewSection",vehicleView) : null;

};