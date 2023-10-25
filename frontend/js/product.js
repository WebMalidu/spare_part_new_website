SERVER_URL = 'http://localhost:9001/';

document.addEventListener('DOMContentLoaded', async () => {
     vehicleMakers();
     loadGarageData();
});

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
     return data
}

//my garage section
//set vehicle makers inside the model
function vehicleMakers() {
     const makersSelector = document.getElementById('vehicleMakerSelector');

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
const makersSelector = document.getElementById('vehicleMakerSelector');
//get vehicle model names
const vehicleModelNameSelector = document.getElementById('vehicleModelNameSelector');

makersSelector.addEventListener('change', () => {

     //get maker id
     const makerId = makersSelector.value;

     vehicleDataFetch().then((data) => {
          const vhNames = data.vehicleNamesData;

          vehicleModelNameSelector.innerHTML = "";

          if (vhNames.status === 'success') {
               //get a variable
               const result = vhNames.results;

               // vehicleModelNameSelector.innerHTML +=
               //      `<option selected>Select Model Line</option>`;
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

//vehicle year container
const vehicleYearsContainer = document.getElementById('vehicleYearsContainer');

//select related date in a car model
vehicleModelNameSelector.addEventListener('change', async () => {

     const vehicleNameId = vehicleModelNameSelector.value;

     const data = await vehicleDataFetch();

     if (data && data.vehicleModelData) {
          //vehicleModelData exists and is not undefined

          const vehicleModelData = data.vehicleModelData;

          if (vehicleModelData.status === 'success') {
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

//select vehicle modification line
const modificationContainer = document.getElementById('modificationLineContainer');

vehicleYearsContainer.addEventListener('change', async () => {

     const vehicleYearId = vehicleYearsContainer.value;
     // const makerId = makersSelector.value;
     const nameId = vehicleModelNameSelector.value;

     const data = await vehicleDataFetch();

     if (data && data.vehicleModelData) {

          const vehicleModelData = data.vehicleModelData;

          if (vehicleModelData.status === 'success') {
               const result = vehicleModelData.results;

               const relatedModelId = result.filter((res) => res.model_year_id === vehicleYearId && res.vehicle_names_id === nameId).map((res2) => res2.model_id);


               vehicleModelId = relatedModelId[0];

               const vehicleModelModificationData = data.vehicleModelModificationData;

               if (vehicleModelModificationData.status === 'success') {
                    const resultModification = vehicleModelModificationData.results;

                    const vhModificationId = resultModification.filter((resModification) => resModification.vh_model_id === relatedModelId[0]).map((resModification2) => resModification2.vh_modification_id);

                    const vehicleModificationModificationData = data.vehicleModificationLineData;

                    if (vehicleModificationModificationData.status === 'success') {
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
                    console.log("vehicle modification has table loading error");
               }

          } else {
               console.log("vehicle model loading error");
          }

     } else {
          console.log('array dost exist');
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
          if (vhModificationData.status === 'success') {
               const result = vhModificationData.results;

               //filter and get new array
               const relatedModelHasId = result.filter((res) => res.vh_model_id === vehicleModelId && res.vh_modification_id === modificationId).map((newRes) => newRes.vh_mdu_id);

               //call save function
               dataAddingForGarage(relatedModelHasId[0]);


          } else {
               console.log(vhModificationData.error);
          }

     } else {
          console.log('vehicleModelModificationData does not exist or is undefined');
     }
}

//data add to garage
async function dataAddingForGarage(modelHasId) {
     try {
          const form = new FormData();
          form.append('modelHasId', modelHasId);

          const garageResponse = await fetch(SERVER_URL + 'backend/api/garageAPI.php', {
               method: 'POST',
               body: form
          });
          garageData = await garageResponse.json();
          //then get now response manege
          garageData.status === 'success' ? window.location.reload() : console.log(garageData.error);

     } catch (error) {
          console.log(error);
     }
}

const loadGarageData = async () => {

     let garage = '';

     try {
          const garageDataResponse = await fetch(SERVER_URL + 'backend/api/garageAPI.php');
          const garageResult = await garageDataResponse.json();

          if (garageResult.status === 'success') {
               const result = garageResult.result;

               result.map((element) => {

                    garage += `<div class="alg-shadow py-2 garage-card">
                           <div class="d-flex flex-column">
                                <div class="d-flex justify-content-end gap-2 px-2">
                                     <span><i class="bi bi-pencil-square"></i></span>
                                     <span><i class="bi bi-trash3-fill"></i></span>
                            </div>
                      <div class="d-flex justify-content-center"><img src="resources/image/vehicleModelImages/car.jpg" alt=""></div>
                           <div class="d-flex flex-column py-3 px-4 pt-4">
                                <span class="alg-text-h3 fw-bold">${element.vh_name}</span>
                                <span class="alg-text-h3">${element.vehicale}</span>
                                <span class="alg-text-h3">${element.mod}</span>
                                <span class="alg-text-h3">${element.generation}</span>
                                <span class="alg-text-h3">Model Year: ${element.year}</span>
                           </div>
                      </div>
                    </div>`

               });



          } else {
               console.log(garageResult.error);
          }
     } catch (error) {
          console.log(error);
     }

     garage += `<div class="alg-shadow py-2 garage-card" onclick="openGarageModel();">
               <div class="d-flex flex-column">
                   <div class="d-flex justify-content-center"><img src="resources/image/car.jpg" alt=""></div>
                   <div class="d-flex flex-column align-items-center py-3 px-4 pt-4">
                       <span class="alg-text-h3 fw-bold">Add your car</span>
                       <span class="alg-text-h1 alg-text-blue"><i class="bi bi-plus-lg fw-bold"></i></span>
                   </div>
                  </div>
               </div>`;

     document.getElementById('garage').innerHTML = garage;
     garageModel.hide();
}




