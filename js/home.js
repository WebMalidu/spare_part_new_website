SERVER_URL = "";

document.addEventListener("DOMContentLoaded", () => {
    promotionLoder();
    loadCategory();
    vehicleMakers();
});




let imgpromo;
function promotionLoder() {
    console.log("hi");

    // Send the data to the server using Fetch
    fetch("../../backend/api//productPromation.php", {
        method: "POST",
    })
        .then((response) => response.json())
        .then((data) => {
            // Handle the response data
            if (data.status === "success") {

                const imageUrls = data.imageUrls;
                const promotionData = document.getElementById("promotion_list");
                console.log(imageUrls)

                for (let i = 0; i < imageUrls.length; i++) {
                    const li = document.createElement("li");
                    li.className = "splide__slide";

                    imgpromo = document.createElement("img");
                    imgpromo.src = imageUrls[i]; // Use the image URL from the array

                    imgpromo.alt = ""; // Set alt text if needed

                    // Add any additional attributes or styles here
                    imgpromo.style.width = "100%"; // For example, set the image width to 100%

                    li.appendChild(imgpromo);
                    promotionData.appendChild(li);
                    // Use an IIFE to capture the current value of imgpromo
                    (function (src) {
                        imgpromo.addEventListener("click", () => {
                            promotionsingle(src);
                        });
                    })(imgpromo.src);
                }

                promotionSliderLoader();
            } else {
                console.log(data.error);
            }
            console.log(data);
        })
        .catch((error) => {
            console.error("Error:", error);
        });
}

function promotionsingle(promovalue) {
    console.log(promovalue);
    // Regular expression pattern to match a number
    // Split the URL by '/' and get the last part
    const parts = promovalue.split("/");
    const lastPart = parts[parts.length - 1];
    document.getElementById('')

    // Remove the ".jpeg" extension, if present
    const number = lastPart.replace(".jpeg", "");

    // Convert the number to an integer
    const parsedNumber = parseInt(number, 10);
    console.log(parsedNumber)
    const requestDataObject = {
        promotionId: parsedNumber,
    };

    // store data in a form
    let form = new FormData();
    form.append("singlePromotionLoad", JSON.stringify(requestDataObject));

    // send the data to server
    let request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            // preform an action on response
            let response = JSON.parse(request.responseText);
            if (response.status == "success") {
                // window.location.href = 'http://localhost:9001/frontend/singlePageView.php'; // Replace 'another_page.html' with the URL you want to navigate to
            } else {
                console.log(response.error);
            }
            console.log(request.responseText);
        }
    };
    request.open("POST", "../../backend/api/promotionSingleLoad.php", true);
    request.send(form);
}

// load category
let categoryCount = 4;
document.getElementById("loadButton").addEventListener("click", () => {
    categoryCount += 4;
    loadCategory();
});

let categoryDataSet;

function loadCategory() {
    // fetch request
    fetch(
        SERVER_URL +
        "../../backend/api/categoriesLoad.php?categoryCount=" +
        categoryCount,
        {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
            },
        }
    )
        .then((response) => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .then((data) => {
            const categoryContainer = document.getElementById("categoryContainer");
            categoryDataSet = data;

            if (data.status == "success") {
                categoryContainer.innerHTML = "";
                data.results.forEach((element) => {
                    categoryContainer.innerHTML += `
                 <div class="col-6 col-md-4 col-lg-2 alg-bg-categor alg-shadow mb-1 rounded mt-3 mx-4 px-3 alg-card-hover"> 
                 <a href="category.php?category_id=${element.category_id}" class="text-decoration-none"> 
                 <div class="d-flex flex-column align-items-center">
                     <img src="${element.category_image}" alt="" class="alg-category-img mt-4 mb-4 img-fluid">
                     <span class="mt-1 p-3 fw-bold text-whit pb-5 alg-text-h3">${element.category_type}</span>
                 </div>
                 </a>
                 </div>`
                    //  let categoryId = document.body.dataset.category;


                    // // Attach a click event listener
                    // categoryDiv.onclick = function() {
                    //     loadCategoryItem(element.category_id);
                    // };


                    // categoryContainer.appendChild(categoryDiv);
                });



            } // categoryContainer.appendChild(categoryDiv);


        });
}


//search product for search panel home
//this is the promise
//call class and 
async function vehicleDataFetch() {
    const obj = new vehicleDataFetcher();
    const data = await obj.fetchVehicleData();
    return data
}

//my garage section
//set vehicle makers inside the model
function vehicleMakers() {
    const makersSelector = document.getElementById('vhMakerContainer');

    //get data and set
    vehicleDataFetch().then((data) => {
        const vhm = data.vehicleMakersData;

        if (vhm.status === 'success') {
            vhm.results.forEach((element) => {
                const makerOption = document.createElement('option');
                makerOption.value = element.maker_id;
                makerOption.textContent = element.maker_name;
                makersSelector.appendChild(makerOption);
            });
        } else {
            console.log(vhm.error);
        }
    }).catch((error) => console.log(error));

}

//get a maker id and set model line 
const makersSelector = document.getElementById('vhMakerContainer');

//vehicle year container
const vehicleYearsContainer = document.getElementById('vhYearContainer');

//get vehicle model names
const vehicleModelNameSelector = document.getElementById('vhModelNameContainer');

//select vehicle modification line
const modificationContainer = document.getElementById('vhModelLineContainer');

makersSelector.addEventListener('change', () => {

    //get maker id
    const makerId = makersSelector.value;

    vehicleDataFetch().then((data) => {
        const vhNames = data.vehicleNamesData;

        vehicleModelNameSelector.innerHTML = "";
        vehicleYearsContainer.innerHTML = "";
        modificationContainer.innerHTML = "";

        if (vhNames.status === 'success') {
            //get a variable
            const result = vhNames.results;

            vehicleModelNameSelector.innerHTML +=
                `<option selected>Select Model</option>`;

            vehicleYearsContainer.innerHTML +=
                `<option selected>Select Year</option>`;

            modificationContainer.innerHTML +=
                `<option selected>Select Modification</option>`;
            //result filter and map 
            result.filter((res) => res.makers_makers_id === makerId).map((rs2) => {
                //create a new model selection
                const makerNameOption = document.createElement('option');
                makerNameOption.textContent = rs2.vh_name;
                makerNameOption.value = rs2.vh_name_id;
                vehicleModelNameSelector.appendChild(makerNameOption);
            });

        } else {
            console.log(vhModel.error);
        }



    })

});



//select related date in a car model
vehicleModelNameSelector.addEventListener('change', async () => {

    const vehicleNameId = vehicleModelNameSelector.value;

    const data = await vehicleDataFetch();

    vehicleYearsContainer.innerHTML = "";
    modificationContainer.innerHTML = "";

    if (data && data.vehicleModelData) {
        //vehicleModelData exists and is not undefined

        const vehicleModelData = data.vehicleModelData;

        if (vehicleModelData.status === 'success') {

            vehicleYearsContainer.innerHTML +=
                `<option selected>Select Year</option>`;

            modificationContainer.innerHTML +=
                `<option selected>Select Modification</option>`;

            //get a variable
            const result = vehicleModelData.results;

            // filtering and mapping 
            const yearId = result.filter((res) => res.vehicle_names_id === vehicleNameId).map((rs2) => rs2.model_year_id);


            //vehicale years table data
            const resultDate = data.vehicleYearsData;

            if (resultDate.status === 'success') {
                const results = resultDate.result;

                yearId.forEach((element) => {
                    // console.log(element);
                    results.filter((res) => res.vehicle_year_Id === element).map((res2) => {
                        const makerYearsOption = document.createElement('option');
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

        console.log('vehicleModelData does not exist or is undefined');
    }
});


//set model id in this global variable 
let vehicleModelId;



vehicleYearsContainer.addEventListener('change', async () => {

    const vehicleYearId = vehicleYearsContainer.value;
    // const makerId = makersSelector.value;
    const nameId = vehicleModelNameSelector.value;

    const data = await vehicleDataFetch();

    modificationContainer.innerHTML = "";

    if (data && data.vehicleModelData) {

        const vehicleModelData = data.vehicleModelData;

        if (vehicleModelData.status === 'success') {

            modificationContainer.innerHTML = "";

            const result = vehicleModelData.results;

            const relatedModelId = result.filter((res) => res.model_year_id === vehicleYearId && res.vehicle_names_id === nameId).map((res2) => res2.model_id);


            vehicleModelId = relatedModelId[0];

            const vehicleModelModificationData = data.vehicleModelModificationData;

            if (vehicleModelModificationData.status === 'success') {

                modificationContainer.innerHTML = "";

                const resultModification = vehicleModelModificationData.results;

                const vhModificationId = resultModification.filter((resModification) => resModification.vh_model_id === relatedModelId[0]).map((resModification2) => resModification2.vh_modification_id);

                const vehicleModificationModificationData = data.vehicleModificationLineData;

                if (vehicleModificationModificationData.status === 'success') {

                    modificationContainer.innerHTML +=
                        `<option selected>Select Modification</option>`;

                    const resultModLineData = vehicleModificationModificationData.result;

                    vhModificationId.forEach((element) => {
                        resultModLineData.filter((resModFilter) => resModFilter.mod_id === element).map((resModFilterNew) => {
                            const makerModLineOption = document.createElement('option');
                            makerModLineOption.textContent = resModFilterNew.mod;
                            makerModLineOption.value = resModFilterNew.mod_id;
                            modificationContainer.appendChild(makerModLineOption);
                        });
                    });

                }


            } else {
                modificationContainer.innerHTML = "";
                modificationContainer.innerHTML +=
                    `<option selected>Select Modification</option>`;

                console.log("vehicle modification has table loading error");
            }

        } else {
            console.log("vehicle model loading error");
        }

    } else {
        console.log('array dost exist');
    }

});


// category load
let categoryLoadModel;
function categoryLoad() {
    categoryLoadModel = new bootstrap.Modal("#categoryLoad");
    categoryLoadModel.show();

    console.log(vehicleModelId);

    const categoryContainer = document.getElementById('categoryContaine');
    categoryContainer.innerHTML = "";
    if (categoryDataSet.status === 'success') {
        console.log(categoryDataSet.results);

        categoryDataSet.results.map((item) => {
            categoryContainer.innerHTML += `
                            <div class="col-6 col-md-4 col-lg-2 alg-bg-category alg-shadow mb-1 rounded mt-3 mx-4 px-3 alg-card-hover">
                                <a href="category.php?category_id=${item.category_id}" class="text-decoration-none">
                                    <div class="d-flex flex-column align-items-center">
                                        <img src="${item.category_image}" alt="" class="alg-category-img mt-4 mb-4 img-fluid">
                                        <span class="mt-1 p-3 fw-bold text-whit pb-5 alg-text-h3">${item.category_type}</span>
                                    </div>
                                </a>
                            </div>
            `;
        });

    }


}

