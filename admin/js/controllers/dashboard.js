class DashboardComponents {
  constructor() {
    // properties
    this.activeDropdown = null;
    this.mainNavigationBtns;
    // model
    this.model = new bootstrap.Modal("#dashBoardModel");

    // toast
    this.toastBootstrap = bootstrap.Toast.getOrCreateInstance(
      document.getElementById("dashBoardToast")
    );
  }

  // image compressor
  async compressImageFromDataUrl(dataURL, quality = 0.3) {
    return await new Promise((resolve, reject) => {
      const img = new Image();
      img.src = dataURL;

      img.onload = function () {
        const canvas = document.createElement("canvas");
        const ctx = canvas.getContext("2d");

        canvas.width = img.width;
        canvas.height = img.height;

        // Draw the original image on the canvas
        ctx.drawImage(img, 0, 0, img.width, img.height);

        // Convert the canvas to a Blob with the specified quality
        canvas.toBlob(
          function (blob) {
            fileToDataURL(blob, (compressedDataURL) => {
              resolve(compressedDataURL);
            });
          },
          "image/jpeg",
          quality
        );
      };

      function fileToDataURL(file, callback) {
        const reader = new FileReader();

        reader.onload = function (event) {
          const dataURL = event.target.result;
          callback(dataURL);
        };

        reader.readAsDataURL(file);
      }
    });
  }

  // dispose opened effect
  disposeOpnedPanel() {
    this.activeDropdown.dispose();
  }

  // dropdown controller
  openDropdown(event, content) {
    const dropdownElement = document.getElementById("dropdown");
    const dropdownVisibleContent = dropdownElement.childNodes[1];
    dropdownVisibleContent.style.translate = "-45% 0";
    dropdownVisibleContent.innerHTML = "";

    content instanceof Element
      ? dropdownVisibleContent.appendChild(content)
      : (dropdownVisibleContent.innerHTML = content);

    event.target.appendChild(dropdownElement);

    const dropdown = new bootstrap.Dropdown(dropdownElement);
    this.activeDropdown = dropdown;
    dropdown.show();
  }

  // main navigation panel content arranger
  async mainNavigationController(
    navigationPanelId,
    mainContainerId,
    callback = async () => {},
    passdownCallback = () => {}
  ) {
    this.mainNavigationBtns = document
      .getElementById(navigationPanelId)
      .querySelectorAll(".main-navigation-panel-btn");

    this.mainNavigationBtns.forEach((element) => {
      element.addEventListener("click", async () => {
        const requestedPanel = element.dataset.algmainnavigationpanel;
        const requestedPaneltitle = element.dataset.algmainnavigationpaneltitle;

        await this.loadMainPanel(
          requestedPanel,
          mainContainerId,
          requestedPaneltitle,
          passdownCallback(requestedPanel)
        );
      });
    });
    // callback
    await callback();
  }

  async loadMainPanel(
    requestedPanel,
    mainContainerId,
    title,
    callback = () => {}
  ) {
    const mainContainer = document.getElementById(mainContainerId);
    const mainContainerTitle = document.getElementById(
      "mainContentContainerTitle"
    );
    await fetch("components/mainNavigationPanels/" + requestedPanel + ".php", {
      method: "GET",
    })
      .then((response) => response.text())
      .then((data) => {
        mainContainerTitle.innerText = title;

        mainContainer.innerHTML = "";
        mainContainer.innerHTML = data;
        // callback
        callback();
      });
  }

  // listners
  addTooltipDitectors(elementType) {
    const elements = document.querySelectorAll("[data-" + elementType + "]");
    elements.forEach((element) => {
      element.addEventListener("mouseover", (event) => {
        const contentText = element.getAttribute("data-" + elementType);
        ALG.openTooltip(event, contentText);
      });
    });
  }

  // tooltipcreator

  openTooltip(event, innerContent) {
    if (!innerContent) {
      return;
    }

    const tooltip = document.querySelector("#tooltip");
    const element = event.target;

    // set popper content
    tooltip.childNodes[1].innerHTML = innerContent;

    const popperInstance = Popper.createPopper(element, tooltip, {
      placement: "bottom",
    });

    function show() {
      tooltip.setAttribute("data-show", "");
      popperInstance.update();
    }

    function hide() {
      tooltip.removeAttribute("data-show");
    }

    const showEvents = ["mouseenter", "focus"];
    const hideEvents = ["mouseleave", "blur"];

    showEvents.forEach((event) => {
      element.addEventListener(event, show);
    });

    hideEvents.forEach((event) => {
      element.addEventListener(event, hide);
    });
  }

  // modal creator
  openModel(modelTitle = null, modelBody = null, modelFooter = null) {
    this.model.show();
    modelTitle
      ? (document.getElementById("modelTitle").innerText = modelTitle)
      : null;

    modelBody
      ? modelBody instanceof Element
        ? document.getElementById("modelBody").appendChild(modelBody)
        : (document.getElementById("modelBody").innerHTML = modelBody)
      : null;

    modelFooter
      ? modelBody instanceof Element
        ? document.getElementById("modelFooter").appendChild(modelFooter)
        : (document.getElementById("modelFooter").innerHTML = modelFooter)
      : null;
  }

  closeModel() {
    this.model.hide();
  }

  // toast creator
  openToast(
    toastTitle = null,
    toastBody = null,
    toastTime = "00:00:00",
    toastIcon = "bi-heart",
    type = "Info"
  ) {
    // set type
    switch (type) {
      case "Success":
        document.getElementById("toastTitle").style.color = "green";
        break;
      case "Info":
        document.getElementById("toastTitle").style.color = "blue";
        break;
      case "Error":
        document.getElementById("toastTitle").style.color = "red";
        break;
      case "Alert":
        document.getElementById("toastTitle").style.color = "yellow";
        break;

      default:
        break;
    }

    toastTitle
      ? (document.getElementById("toastTitle").innerText = toastTitle)
      : null;

    if (toastBody) {
      document.getElementById("toastBody").innerHTML = "";
      if (typeof toastBody === "object" && toastBody !== null) {
        let textToType = "";
        for (let key in toastBody) {
          if (toastBody.hasOwnProperty(key)) {
            textToType += key + ": " + toastBody[key] + "<br>";
          }
        }
        document.getElementById("toastBody").innerHTML = textToType;
      } else {
        document.getElementById("toastBody").innerHTML = toastBody;
      }
    } else {
      null;
    }

    toastTime
      ? (document.getElementById("toastTime").innerHTML = toastTime)
      : null;

    toastIcon
      ? (document.getElementById("toastIcon").classList = [
          "bi",
          toastIcon,
          "text-dark",
          "mx-1",
        ])
      : null;

    this.toastBootstrap.show();
  }

  // create a table
  createTable(dataSet, collumnLengths = null) {
    let tableHeader = [];
    let tableRows = [];

    dataSet.forEach((element) => {
      tableHeader = [];

      let row = [];
      for (const key in element) {
        if (element.hasOwnProperty(key)) {
          tableHeader.push(key);
          row.push(element[key]);
        }
      }
      tableRows.push(row);
    });

    dataSet.forEach((element) => {
      tableHeader = [];
      for (const key in element) {
        if (element.hasOwnProperty(key)) {
          tableHeader.push(key);
        }
      }
    });

    // create header
    let headerDesign = document.createElement("div");
    headerDesign.classList.add("alg-table-header-container");
    let headerCount = 0;
    tableHeader.forEach((element) => {
      const headerBlock = document.createElement("div");
      headerBlock.classList.add("alg-table-header-cell");
      if (collumnLengths) {
        headerBlock.style.width = collumnLengths[headerCount] + "px";
        headerCount++;
      } else {
        headerBlock.style.flexGrow = "1";
        headerBlock.style.width = "150px";
      }
      headerBlock.innerText = element;
      headerDesign.appendChild(headerBlock);
    });

    // create body
    let bodyDesign = document.createElement("div");
    bodyDesign.classList.add("alg-table-body-container");
    tableRows.forEach((element) => {
      let bodyRow = document.createElement("div");
      bodyRow.classList.add("alg-table-body-row");
      let bodyCount = 0;
      element.forEach((element) => {
        const bodyCell = document.createElement("div");
        bodyCell.classList.add("alg-table-body-cell");
        if (collumnLengths) {
          bodyCell.style.width = collumnLengths[bodyCount] + "px";
          bodyCount++;
        } else {
          bodyCell.style.flexGrow = "1";
          bodyCell.style.width = "150px";
        }
        bodyCell.innerHTML = element;
        bodyRow.appendChild(bodyCell);
      });
      bodyDesign.appendChild(bodyRow);
    });

    // combine table
    const table = document.createElement("div");
    table.classList.add("alg-table");

    table.appendChild(headerDesign);
    table.appendChild(bodyDesign);

    return table;
  }

  // create a list
  createList(dataSet, collumnLengths = null) {
    let listHeader = [];
    let listRows = [];

    if (dataSet === null) {
      this.openToast(
        "no data to show",
        "Invalid data row count",
        this.getCurrentTime(),
        "",
        "Alert"
      );
      const filler = document.createElement("p");
      filler.innerText = "no row data to show";
      return filler;
    }

    dataSet.forEach((element) => {
      listHeader = [];

      let row = [];
      for (const key in element) {
        if (element.hasOwnProperty(key)) {
          listHeader.push(key);
          row.push(element[key]);
        }
      }
      listRows.push(row);
    });

    dataSet.forEach((element) => {
      listHeader = [];
      for (const key in element) {
        if (element.hasOwnProperty(key)) {
          listHeader.push(key);
        }
      }
    });

    // create header
    let headerDesign = document.createElement("div");
    headerDesign.classList.add("alg-list-header-container");
    let headerCount = 0;
    listHeader.forEach((element) => {
      const headerBlock = document.createElement("div");
      headerBlock.classList.add("alg-list-header-block");
      if (collumnLengths) {
        headerBlock.style.width = collumnLengths[headerCount] + "px";
        headerCount++;
      } else {
        headerBlock.style.flexGrow = "1";
        headerBlock.style.width = "150px";
      }

      headerBlock.innerText = element;
      headerDesign.appendChild(headerBlock);
    });

    // create body
    let bodyDesign = document.createElement("div");
    bodyDesign.classList.add("alg-list-body-container");
    listRows.forEach((element) => {
      let bodyRow = document.createElement("div");
      bodyRow.classList.add("alg-list-body-row");
      let bodyCount = 0;
      element.forEach((element) => {
        const bodyBlock = document.createElement("div");
        bodyBlock.classList.add("alg-list-body-block");
        if (collumnLengths) {
          bodyBlock.style.width = collumnLengths[bodyCount] + "px";
          bodyCount++;
        } else {
          bodyBlock.style.flexGrow = "1";
          bodyBlock.style.width = "150px";
        }

        bodyBlock.innerHTML = element;
        bodyRow.appendChild(bodyBlock);
      });
      bodyDesign.appendChild(bodyRow);
    });

    // combine list
    const list = document.createElement("div");
    list.classList.add("alg-list");

    list.appendChild(headerDesign);
    list.appendChild(bodyDesign);

    return list;
  }

  // render an element to the document
  clearElementInnerHtml(parentElementId) {
    document.getElementById(parentElementId).innerHTML = "";
  }

  renderComponent(parentElementId, component, replace = false) {
    if (replace) {
      this.clearElementInnerHtml(parentElementId);
    }
    document.getElementById(parentElementId).appendChild(component);
  }

  async addListToContainer(
    id,
    callback = async () => {},
    collumnLengths = null
  ) {
    const listData = await callback();
    const list = ALG.createList(listData, collumnLengths);
    ALG.renderComponent(id, list, true);
  }

  async addTableToContainer(
    id,
    callback = async () => {},
    collumnLengths = null
  ) {
    const tableData = await callback();
    const table = ALG.createTable(tableData, collumnLengths);
    ALG.renderComponent(id, table, true);
  }

  // utility

  async requestHandler(
    requestUrl,
    method = "GET",
    dataSet,
    callback = () => {},
    preventDefault = false,
    test = false
  ) {
    const url = new URL(requestUrl);

    const options = {
      method: method,
    };

    // data setter
    if (method === "GET") {
      if (dataSet.parameters) {
        dataSet.parameters.forEach((element) => {
          url.searchParams.append(element.key, element.value);
        });
      }
    } else if (method === "POST") {
      if (options.body) {
        options.body = dataSet.body;
      }
    }

    let headerContentType = "";
    switch (dataSet.reqType) {
      case "json":
        headerContentType = "application/json";
        break;

      case "html":
        headerContentType = "text/html; charset=utf-8";
        break;

      case "form":
        headerContentType = "multipart/form-data";
        break;

      case "text":
        headerContentType = "text/plain";
        break;

      default:
        headerContentType = "text/plain";
        break;
    }
    options.headers = {
      "Content-Type": headerContentType,
    };

    return await fetch(url.toString(), options)
      .then((response) => {
        if (response.ok) {
          if (test) {
            return response.text();
          }else {
            return response.json();
          }
        } else {
          throw new Error(`Request failed with status ${response.status}`);
        }
      })
      .then((data) => {
        if (data.status === "success") {
          if (!preventDefault) {
            alert(data.status);
          }

          return callback(data.results);
        } else if (data.status === "failed") {
          console.log(data.error);
          return null;
        } else {
          console.log(data);
          return null;
        }
      })
      .catch((error) => console.error(error));
  }

  async imageFileToDataURL(file, callback) {
    const reader = new FileReader();

    reader.onload = function (event) {
      const dataURL = event.target.result;
      callback(dataURL);
    };

    reader.readAsDataURL(file);
  }

  getCurrentTime() {
    const now = new Date();
    let hours = now.getHours();
    let minutes = now.getMinutes();
    let ampm = hours >= 12 ? "PM" : "AM";

    // Convert to 12-hour time format
    hours = hours % 12;
    hours = hours ? hours : 12; // Handle midnight (0)

    const timeString = `${hours}:${String(minutes).padStart(2, "0")} ${ampm}`;

    return timeString;
  }
}


